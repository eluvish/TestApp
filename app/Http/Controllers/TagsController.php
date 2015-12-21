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
        * TODO: have it also delete the tag if it tag has no other associations.
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
        // validation
        $this->validate($request,['tag' => 'required|string|max:12']);

        // retrieve item for tagging
        $item = myCloset\Item::find($request->item_id);

        // Error checking for if the item already has this tag.
        $newTag = strtolower($request->tag);
        $tags = $item->tags;
        foreach ($tags as $tag) {
            if (strcmp($tag->name, $newTag) == 0) {
                \Session::flash('flash_message','This item already has this tag.');
                return redirect::to('/items/'.$request->item_id);
        }
    }

        // So as to actually reuse already created tags and save database space.
        $needle = strtolower($request->tag);
        $allTags = myCloset\Tag::lists('name')->toArray();

        if(in_array($needle, $allTags)) {
            // tag exists in the database, get it and save the relationship
            $tag = myCloset\Tag::where('name',$needle)->first();
        }
        else {
            // tag doesn't yet exist in the database.
            $tag = new myCloset\Tag();
            $tag->name = strtolower($request->tag);
            $tag->save();
        }

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

        $items = \Auth::user()->items()->whereHas('tags', function($q) use ($name) {
            $q->where('name', $name);
            })->with('tags')->get();

            // split them up by category for the view
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

    /*
        *
        * Shows all tags belonging to user
        *
    */
    public function showAllTags() {

        $items = \Auth::user()->items()->with('tags')->get();

        $merged = [];

        foreach($items as $item){
            $tags = $item->tags->pluck('name')->flatten();

            if(!$tags->isEmpty()) {
                foreach ($tags as $tag) {
                    array_push($merged, $tag);
                }

            }
        }

        // remove duplicates
        $unique = array_unique($merged);

        return view('tags.index')->with('tags', $unique);

    }
}
