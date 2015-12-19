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

class OutfitsController extends Controller
{
    public function index() {

        $user = \Auth::user();

        // 4 queries, could probably do better

        $tops = myCloset\Item::where('type', '=', 'top')
                                ->where('user_id','=',$user->id)
                                ->get();

        $bottoms = myCloset\Item::where('type', '=', 'bottom')
                                ->where('user_id','=',$user->id)
                                ->get();

        $shoes = myCloset\Item::where('type', '=', 'shoe')
                                ->where('user_id','=',$user->id)
                                ->get();

        // let the user know that the feature is pointless without having at least 1, preferably two of each item type.
        if($tops->isEmpty() || ($bottoms->isEmpty()) || ($shoes->isEmpty()))
        {
            \Session::flash('flash_message','This feature only works when you have at least one of each type item. Add more.');
            return Redirect::to('/upload');
        }
        else
        {
            return view('outfits.index')
            ->with([
                'tops' => $tops,
                'bottoms' => $bottoms,
                'shoes' => $shoes,
            ]);
        }
    }
}
