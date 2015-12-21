<?php

namespace myCloset\Http\Controllers;

use Illuminate\Http\Request;

use myCloset\Http\Requests;
use myCloset\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use myCloset;
use Session;

class ItemsController extends Controller
{
    /**
     * Method: GET
     * Powers the image gallery. Retrieves all items belonging to the user into
     * collection. Divides by 'type' and passes to them view.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $items = Auth::user()->items()->get();

        $tops = $items->where('type', 'top');
        $bottoms = $items->where('type', "bottom");
        $shoes = $items->where('type', "shoe");

        return view('items.showAll')
          ->with(['tops' => $tops,
                  'bottoms' => $bottoms,
                  'shoes' => $shoes
                ]);
    }

    /**
     * Method: GET
     * Shows the add item view.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.add');
    }

    /**
     * Method: POST
     *
     * Process input from the add an item form (add.blade.php).
     * Can handle both file uploads and URLs (but with rough parsing).
     * Processes file and saves it to disk.
     * Makes database entry.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // start with validation
        // TODO: maybe get rid of mimes?

        $rules = array(
                    'image' => 'mimes:jpeg,bmp,png|image',
                    'url' => 'required_without:image|url',
                    'type' => 'required'
        );

        $this->validate($request,$rules);

        // set path where the image will be saved
        $filePath = 'images';

        //if a url was submitted
        if ($request->url) {

            // additional validation to make sure it has an allowed extension
            // many image links dont have extensions nowadays
            $allowed = ['jpg','jpeg','png','gif'];
            $urlFile = file_get_contents($request->url);
            $extension = pathinfo($request->url, PATHINFO_EXTENSION);

            if(!in_array($extension, $allowed)) {
                Session::flash('flash_message','The URL you entered is not an image or does not have a valid file extension. Try downloading the file and uploading it manually.');
                return Redirect::to('/upload');
            }

            // set unique file name
            $fileName = sha1(time()).'.'.$extension;

            //ready for interventionist and save file to disk
            $filePath = $filePath.'/'.$fileName;
            $save = file_put_contents($filePath, $urlFile);

            // Error handling in case php coulnd't save the file.
            if(!file_exists($filePath)) {
                Session::flash('flash_message','Error: could not save file to server.');
                return Redirect::to('/upload');
            }
        }

        // if a file image was uploaded
        if($request->image) {

            // generate file name
            $fileName = sha1(time()).'.'.$request->image->getClientOriginalExtension();

            // save file to disk
            $request->file('image')->move($filePath, $fileName);
            $filePath = $filePath.'/'.$fileName;
        }

        //using interventionist/image for resizing

        $intImg = \Image::make($filePath)->fit(400,300)->save();

        // instantiate new Item
        $item = new myCloset\Item();
        $item->src = '/'.$filePath;
        $item->type = strtolower($request->type);
        Auth::user()->items()->save($item);

        Session::flash('flash_message','Your item was uploaded successfully!');

        return Redirect::to('/items/'.$item->id)->with($item->id);
    }

    /**
     * Display a single item
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get item instance from database with associated tags. Send 404 if Item
        // doesn't exit or if user presses back button after deleting.
        $item = myCloset\Item::where('id',$id)->with('tags')->firstOrFail();

        // confirm item owner
        if(Auth::user()->id == $item->user_id) {
            return view('items.edit')->with(['item' => $item]);
        }
        else {
            Session::flash('flash_message','You are not authorized to view this item.');
            return Redirect::to('/items');
        }
    }

    /**
     * Method: PATCH
     * Updates the where worn (type). TODO: implement update image feature
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Updates where the item is worn

        $item = myCloset\Item::find($id);
        $item->type = strtolower($request->type);
        $item->save();

        Session::flash('flash_message','Updated.');
        return redirect::to('/items/'.$id);
    }

    /**
     * Method: DELETE
     *
     * Deletes an item record from the database, removes tag associations, and
     * removes the item from disk.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get the item to be deleted and confirm it exists.
        $item = myCloset\Item::find($id);

        if(is_null($item)) {
            Session::flash('flash_message', 'Item not found.');
            return redirect('/items');
        }

        // delete the pivot table assocation
        if($item->tags()) {
            $item->tags()->detach();
        }

        // Delete the item from database
        myCloset\Item::destroy($id);

        // delete the slash at the start of the $item->src
        $pathToDelete = substr($item->src, 1);

        // delete the item from disk
        if(file_exists($pathToDelete))
        {
            unlink($pathToDelete);
        }
        else
        {
            // User doesn't need to know that we couldn't delete the file but
            // we should so let's log it.
            \Log::info('Could not delete file:'.$pathToDelete);
        }

        Session::flash('flash_message','Your item was successfully deleted.');
        return Redirect::to('/items');

    }
}
