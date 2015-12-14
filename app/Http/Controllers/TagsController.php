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
        //IDEA: change this to DELETE?

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

    public function show($id)
    {
        //TODO: display all items by tag
        //$items = \myCloset\Item::where('user_id', \Auth::user()->id)->with('tags')->get();
        $user_id = \Auth::user()->id;
        $items = \myCloset\Item::where('user_id','=',\Auth::user()->id)->whereHas('tags', function($q) {
            $q->where('name', 'brown');
            })->with('tags')->get();
//$items = mysql_query("SELECT items.* FROM items INNER JOIN item_tag ON items.item_id = item_tag.item_id WHERE item_tag.tag_id = $id AND items.user_id = $user_id");
dd($items);

        return "Tag View";
    }
}
