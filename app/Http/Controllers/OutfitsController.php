<?php

/*
    *
    *
    * This feature is half implemented. It lets users swipe through photos but
    * does not save outfits yet.
    *
    *
    *
*/

namespace myCloset\Http\Controllers;

use Illuminate\Http\Request;

use myCloset\Http\Requests;
use myCloset\Http\Controllers\Controller;
use Redirect;
use myCloset;
use Auth;

class OutfitsController extends Controller
{

    /*
        *
        * Method: GET
        * Retrieves data for rendering the create an outfit page.
        *
        *
    */

    public function index()
    {

        // items eager load and seperate
        $items = Auth::user()->items()->get();
            $tops = $items->where('type','top');
            $bottoms = $items->where('type','bottom');
            $shoes = $items->where('type','shoe');

        // let the user know that the feature is pointless without having at least 1, preferably two of each item type.
        if($tops->isEmpty() || ($bottoms->isEmpty()) || ($shoes->isEmpty()))
        {
            \Session::flash('flash_message','Add at least one type of each item to create an outfit.');
            return Redirect::to('/upload');
        }
        else
        {
            return view('outfits.create')->with([
                'tops' => $tops,
                'bottoms' => $bottoms,
                'shoes' => $shoes,
            ]);
        }
    }

    /*
        *
        * Method: POST
        * Handles the storage of an outfit by saving the id of each type of item.
        *
        * TODO: checking for duplicates.
        *
    */
    public function store(Request $request)
    {
        // all items eager load
        $items = Auth::user()->items()->get();
            $top = $items->find($request->top);
            $bottom = $items->find($request->bottom);
            $shoe = $items->find($request->shoe);

        // save outfit to database
        $outfit = new myCloset\Outfit();
            $outfit->top = $request->top;
            $outfit->bottom = $request->bottom;
            $outfit->shoe = $request->shoe;
            Auth::user()->outfits()->save($outfit);

        \Session::flash('flash_message','Outfit added.');
        return back();
    }

    /*
        *
        * Method: GET
        * Shows all of the user's outfits
        *
    */
    public function showAllOutfits() {

        //eager load all outfits and items belonging to the user.
        $allOutfits = Auth::user()->outfits()->get();
        $items = Auth::user()->items()->with('tags')->get();

        // create a new collection which will hold collections.
        $allRelevant = collect([]);

        foreach ($allOutfits as $outfit) {
            $temp = collect([]);

            // creating a collection of 3 items
            $temp->push($items->find($outfit->top))->push($items->find($outfit->bottom))->push($items->find($outfit->shoe));

            // add collection to collection
            $allRelevant->push($temp);
        }

        if($allRelevant->isEmpty()){
            \Session::flash('flash_message','Create at least one outfit first.');
            return Redirect::to('/create');
        }
        else {
        // send to view in reverse order (most recent first)
        return view('outfits.index')->with('outfits', $allRelevant->reverse());
        }
    }
}
