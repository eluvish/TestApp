<?php

namespace myCloset\Http\Controllers;

use Illuminate\Http\Request;

use myCloset\Http\Requests;
use myCloset\Http\Controllers\Controller;

class OutfitsController extends Controller
{
    public function index() {

        $user = \Auth::user();

        // 4 queries, could probably do better

        $tops = \DB::table('items')->where('type', '=', 'top')
                                   ->where('user_id','=',$user->id)
                                   ->get();

        $bottoms = \DB::table('items')->where('type', '=', 'bottom')
                                   ->where('user_id','=',$user->id)
                                   ->get();

        $shoes = \DB::table('items')->where('type', '=', 'shoe')
                                   ->where('user_id','=',$user->id)
                                   ->get();

        return view('outfits.index')
            ->with([
                'tops' => $tops,
                'bottoms' => $bottoms,
                'shoes' => $shoes,
            ]);
    }
}
