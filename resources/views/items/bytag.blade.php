@extends('layouts.master')

@section('title')
myCloset - View by Tag
@stop

@section('head')
<style>
h1 {
  text-align: center;
}

.item {
  text-align: center;
}
</style>
@stop

@section('content')
<!--
    *
    *
    START bytag.blade.php
    *
    *
-->

<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <h1 style="text-align: center;">Tag: {{$name}}</h1>
    </div>
@if($items->isEmpty())

  <br>
  <h2 style="text-align: center;">No items found under this tag.</h2>

@else

    @foreach($items as $item)
    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <a class="thumbnail" href="/items/{{$item->id}}">
            <img class="img-responsive" src="{{$item->src}}" alt="" width="400" height="300" />
        </a>
    </div>
    @endforeach

@endif
  </div>
</div>


<!--
    *
    *
    END bytag.blade.php
    *
    *
-->

@stop
