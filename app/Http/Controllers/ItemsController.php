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


        // get user
        $user = \Auth::user();

        $filePath = 'images/';

        if (!$request->hasFile('image') and !$request->file('image')->isValid()) {
            \Session::flash('flash_message','Image upload failed.');
            return Redirect::back();
        }

        // instantiate object image
        $img = $request->image;

        // generate file name
        $time = new \Carbon\Carbon;
        $fileName = $time->toDateString() .'-'. rand(1111,9999).'.' .$img->getClientOriginalExtension();
        $imgLoc = $filePath . $fileName;

        // save file to disk
        $request->file('image')->move($filePath, $fileName);

            //using interventionist/image for resizing
            $intImg = \Image::make($imgLoc);

            // resize the image to a height of 200 and constrain aspect ratio (auto width)
            $intImg->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            });

            $intImg->save();

        // save to database
        $item = new \myCloset\Item();
        $item->name = $imgLoc;
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
        //
        $item = \myCloset\Item::find($id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete tag association
        $tags = \DB::table('item_tag')->where('item_id', $id)->delete();

        // Delete the item
        \myCloset\Item::destroy($id);

        \Session::flash('flash_message','Your item was successfully deleted.');

        return Redirect::to('/items/');
        //
    }
}
