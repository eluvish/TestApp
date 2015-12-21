@extends('layouts.master')

@section('title')
    myCloset - My Outfits
@stop

@section('head')

@stop

@section('content')
<!--
    *
    *
    (Outfits) index.blade.php
    *
    *
-->

<div class="container">
@if($outfits->isEmpty())
    
@endif
    @foreach($outfits as $outfit => $items)
    <div class="row">

        <div class="col-lg-3 col-md-4 col-md-offset-4 col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Outfit</h3>
                </div>
                <div class="panel-body">

                    @foreach($items as $item)
                    <img src="{{$item->src}}" class="img-responsive" alt="" width="400" height="300" />
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    @endforeach


    </div>





<!--
    *
    *
    END (Outfits) index.blade.php
    *
    *
-->
@stop
