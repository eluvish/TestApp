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
        $this->validate($request,['image' => 'mimes:jpeg,bmp,png',
                                    'image'=>'required']);

        if (!$request->hasFile('image') and !$request->file('image')->isValid()) {
            \Session::flash('flash_message','Image upload failed.');
            return Redirect::back();
        }

        // get user
        $user = \Auth::user();

	// set path where the image will be saved
	$filePath = 'images/';

        // instantiate object image
        $img = $request->image;

        // generate file name
        $extension = $img->getClientOriginalExtension();

        $fileName = sha1(time()).'.'.$extension;

	// save file to disk
        $request->file('image')->move($filePath, $fileName);

	$filePath = $filePath.'/'.$fileName;

            //using interventionist/image for resizing
            $intImg = \Image::make($filePath);

            // resize the image to a height of 280 and constrain aspect ratio (auto width)
            $intImg->resize(480, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $intImg->save();

        //$imgLoc = '/'.$filePath.$fileName;

        // save to database
        $item = new \myCloset\Item();
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
        // Updates where the item is worn TODO: update image.

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
        //TODO: add code to detach tags

        $item = \myCloset\Item::find($id);

        if(is_null($item)) {
            \Session::flash('flash_message', 'Item not found');
            return redirect('/items');
        }

        if($item->tags()) {
            $item->tags()->detach();
        }

        // Delete tag association
        // $tags = \DB::table('item_tag')->where('item_id', $id)->delete();

        // Delete the item
        \myCloset\Item::destroy($id);

        \Session::flash('flash_message','Your item was successfully deleted.');

        return Redirect::to('/items/');
        //
    }
}
