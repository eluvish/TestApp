<?php

namespace myCloset\Http\Controllers;

use Illuminate\Http\Request;

use myCloset\Http\Requests;
use myCloset\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TagsController extends Controller
{
    public function unlink(Request $request)
    {
        $item = \myCloset\Item::find($request->item_id);
        $item->tags()->detach($request->tag_id);
        return redirect::to('/items/'.$request->item_id);
    }

    public function link(Request $request)
    {
        $this->validate($request,['tag' => 'required']);

        $item = \myCloset\Item::find($request->item_id);

        $tag = new \myCloset\Tag();
        $tag->name = $request->tag;
        $tag->save();

        // create the pivot table relationship
        $item->tags()->attach($tag);

        return redirect::to('/items/'.$request->item_id);
    }

    public function show($name)
    {
        //TODO: display all items by tag
        $items = \myCloset\Item::where('user_id','=',\Auth::user()->id)->with('tags')->get();
        dd($items);
        return "Tag View";
    }
}
