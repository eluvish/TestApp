<?php

namespace myCloset\Http\Controllers;

use Illuminate\Http\Request;

use myCloset\Http\Requests;
use myCloset\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use myCloset;

class TagsController extends Controller
{
/*
    *
    * Removes a tag association.
    *
*/
    public function unlink(Request $request)
    {
        $item = myCloset\Item::find($request->item_id);
        $item->tags()->detach($request->tag_id);
        return redirect::to('/items/'.$request->item_id);
    }

    /*
        *
        * Adds a tag association.
        *
    */

    public function link(Request $request)
    {
        $this->validate($request,['tag' => 'required']);

        $item = myCloset\Item::find($request->item_id);

        $tag = new myCloset\Tag();
        $tag->name = strtolower($request->tag);
        $tag->save();

        // create the pivot table relationship
        $item->tags()->attach($tag);

        return redirect::to('/items/'.$request->item_id);
    }

    /*
        *
        * Shows all items by tag
        *
    */

    public function show($name)
    {
        // get items that have $name tag
        $items = myCloset\Item::where('user_id','=',\Auth::user()->id)->whereHas('tags', function($q) use ($name) {
            $q->where('name', $name);
            })->with('tags')->get();

            $tops = $items->where('type', 'top');
            $bottoms = $items->where('type', "bottom");
            $shoes = $items->where('type', "shoe");

            return view('items.bytag')
              ->with(['tops' => $tops,
                      'bottoms' => $bottoms,
                      'shoes' => $shoes,
                      'name' => $name
                    ]);
    }
}
