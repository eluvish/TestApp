@extends('layouts.master')

@section('head')

@stop

@section('content')
<!-- image gallery code from http://startbootstrap.com/template-overviews/thumbnail-gallery/ -->

@if($tops->isEmpty() && $bottoms->isEmpty() && $shoes->isEmpty())
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 style="text-align: center;">You don't have any items. Why not <a href="/upload">add</a> some?</h1>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 style="text-align: center;">All My Items</h1>
        </div>

        @foreach($tops as $top)
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="/items/{{$top->id}}">
                <img class="img-responsive" src="{{$top->src}}" alt="" width="400" height="300" />
            </a>
        </div>
        @endforeach
    </div>
<hr />
    <div class="row">
        @foreach($bottoms as $bottom)
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="/items/{{$bottom->id}}">
                <img class="img-responsive" src="{{$bottom->src}}" alt="" width="400" height="300" />
            </a>
        </div>
        @endforeach
    </div>

        
    <div class="row">
        @foreach($shoes as $shoe)
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="/items/{{$shoe->id}}">
                <img class="img-responsive" src="{{$shoe->src}}" alt="" width="400" height="300" />
            </a>
        </div>
        @endforeach
      </div>


    </div>
@endif
@stop
