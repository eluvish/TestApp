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

    <div class="col-md-4 col-md-offset-4">
      <h1 style="text-align: center;">Tag: {{$name}}</h1>

      @foreach($items as $item)
      <div class="item">
        <a href="/items/{{$item->id}}"><img src="{{$item->src}}" class="img-thumbnail img-responsive"/></a><br><br>

        @foreach($item->tags as $tag)
        <a href="/tags/{{$tag->name}}" class="btn btn-primary btn-sm">{{$tag->name}}</a>
        @endforeach

      </div>
      <br><br>

      @endforeach

    </div>

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
