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
    //TODO: remove admin before publishing to web

    public function admin()
    {
      $user = Auth::user();
      $items = myCloset\Item::where('user_id','=',$user->id)->with('tags')->get();
      return view('items.admin')->with('items', $items);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = myCloset\Item::where('user_id', '=', Auth::user()->id)->get();

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

        // set path where the image will be saved
        $filePath = 'images';

        //if a url was submitted
        if ($request->url) {

            $allowed = ['jpg','jpeg','png','gif'];
            $urlFile = file_get_contents($request->url);
            $extension = pathinfo($request->url, PATHINFO_EXTENSION);
            //dd($extension);
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
                return 'Fatal error: could not save file.';
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

        //using interventionist/image for resizing
        // TODO: different resizing for different types (i.e. pants need more height than width)
        $intImg = \Image::make($filePath)->fit(400,300)->save();

        // save to database
        $item = new myCloset\Item();

        // this iteration definitely work on the server.
        $item->src = '/'.$filePath;
        $item->type = strtolower($request->type);
        $item->user_id = Auth::user()->id;
        $item->save();

        Session::flash('flash_message','Your item was uploaded successfully!');

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
        $item = myCloset\Item::where('id',$id)->with('tags')->first();

        // confirm item exists.
        if(is_null($item)) {
            Session::flash('flash_message','Item does not exist. Why not add one?');
            return Redirect::to('/upload');
        }

        // confirm item owner
        if(Auth::user()->id == $item->user_id){
            return view('items.edit')->with(['item' => $item]);
        }
        else {
            Session::flash('flash_message','You are not authorized to view this item.');
            return Redirect::to('/items');
        }
    }

    /** TODO: Delete this
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     // This is supposed to be a GET request.
    //     return "in edit";
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // TODO: implement update image

        // Updates where the item is worn

        $item = myCloset\Item::find($id);
        $item->type = strtolower($request->type);
        $item->save();

        Session::flash('flash_message','Updated to worn: '.$item->type);
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
        // get the item to be deleted and confirm it exists.
        $item = myCloset\Item::find($id);

        if(is_null($item)) {
            Session::flash('flash_message', 'Item not found.');
            return redirect('/items');
        }

        // delete the slash at the start of the $item->src
        $pathToDelete = substr($item->src, 1);

        // delete the item from disk
        if(file_exists($pathToDelete)) {
            unlink($pathToDelete);
        }
        else {
            Session::flash('flash_message','Delete failed: File does not exist.');
            return Redirect::to('/items');
        }

        // delete the pivot table assocation
        if($item->tags()) {
            $item->tags()->detach();
        }
        // Delete the item from database
        myCloset\Item::destroy($id);

        Session::flash('flash_message','Your item was successfully deleted.');

        return Redirect::to('/items');
        //
    }
}
