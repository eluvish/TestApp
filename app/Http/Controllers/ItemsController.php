<?php

namespace Testbed\Http\Controllers;

use Illuminate\Http\Request;

use Testbed\Http\Requests;
use Testbed\Http\Controllers\Controller;
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
        return view('items.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        // start with validation
        $this->validate($request,['image' => 'mimes:jpeg,bmp,png',
                                    'image'=>'required']);


        // get user
        $user = \Auth::user();

        $filePath = 'images/';

        if ($request->hasFile('image') and $request->file('image')->isValid()) {
            
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
            $item = new \Testbed\Item();
            $item->name = $imgLoc;
            $item->user_id = $user->id;
            $item->save();

            return Redirect::to('/items/'.$item->id)->withInput();
        }
        else {

            return Redirect::to('/item/add')->withInput()->with('File Upload Failed');
        }

        Return 'End of create run';

    }

    public function showall()
    {
        $user = \Auth::user();
        $items = \Testbed\Item::where('user_id','=',$user->id)->with('tags')->get();
        //dd($items);
        return view('items.show')->with('items', $items);

        // foreach($items as $item) {
        //     echo '<br> <img src="http://localhost/images/'.$item->name.'">'.' is tagged with: ';
        //         foreach($item->tags as $tag) {
        //             echo $tag->name.' ';
        //         }
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = \Testbed\Item::find($id);
        return view('items.edit')->with(['item' => $item]);
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
        //
    }
}
