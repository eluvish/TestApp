<?php

namespace myCloset\Http\Controllers;

use Illuminate\Http\Request;

use myCloset\Http\Requests;
use myCloset\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        //dd($user);
        $items = \myCloset\Item::where('user_id','=',$user->id)->with('tags')->get();
        return view('items.show')->with('items', $items);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.add');
    }

    /**
     * Store a newly created resource in storage.
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

        // get user
        $user = \Auth::user();

        // set path where the image will be saved
        $filePath = 'images';

        //if a url was submitted
        if ($request->url) {

            $urlFile = file_get_contents($request->url);
            $extension = pathinfo($request->url, PATHINFO_EXTENSION);
            $fileName = sha1(time()).'.'.$extension;

            //ready for interventionist and save file to disk
            $filePath = $filePath.'/'.$fileName;

            $save = file_put_contents($filePath, $urlFile);

            // Error handling in case php coulnd't save the file.
            if(!file_exists($filePath)) {
                return 'Fatal error: could not save file';
            }
        }

        // if an image was uploaded
        if($request->image) {

            // generate file name
            $extension = $request->image->getClientOriginalExtension();
            $fileName = sha1(time()).'.'.$extension;

            // save file to disk
            $request->file('image')->move($filePath, $fileName);
            $filePath = $filePath.'/'.$fileName;
        }

/*
    *
    *
    Image manipulation and resizing
    *
    *
*/

        //using interventionist/image for resizing
        $intImg = \Image::make($filePath);

        // resize the image to a height of 280 and constrain aspect ratio (auto width)
        $intImg->resize(480, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $intImg->save();

/*
*
*
    Saving path info and where worn (type) to the database)
*
*
*/
        // save to database
        $item = new \myCloset\Item();

        // this iteration definitely work on the server.
        $item->src = '/'.$filePath;
        $item->type = $request->type;

        //create a foreign key relationship item -> user.
        $item->user_id = $user->id;
        $item->save();

        \Session::flash('flash_message','Your item was uploaded successfully!');

        return Redirect::to('/items/'.$item->id)->with($item->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get item instance from database with associated tags
        $item = \myCloset\Item::where('id',$id)->with('tags')->first();

        return view('items.edit')->with(['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // This is supposed to be a GET request.
        return "in edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Updates where the item is worn
        // TODO: update image or img url

        $item = \myCloset\Item::find($id);
        $item->type = $request->type;
        $item->save();

        return redirect::to('/items/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO: Delete file from server.

        $item = \myCloset\Item::find($id);

        if(is_null($item)) {
            \Session::flash('flash_message', 'Item not found');
            return redirect('/items');
        }

        // delete the slash at the start of the $item->src
        $pathToDelete = substr($item->src, 1);

        // delete the item from disk
        if(file_exists($pathToDelete)) {
            //echo "File Exists...";
            unlink($pathToDelete);
            //return 'File Deleted';
        }
        else {
            \Session::flash('flash_message','Delete failed: File does not exist');
            return Redirect::to('/items/');
        }

        // delete the pivot table assocation
        if($item->tags()) {
            $item->tags()->detach();
        }
        // Delete the item from database
        \myCloset\Item::destroy($id);

        \Session::flash('flash_message','Your item was successfully deleted.');

        return Redirect::to('/items/');
        //
    }
}
