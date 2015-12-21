@extends('layouts.master')

@section('title')
    myCloset - All tags
@stop

@section('head')
<style>
h2{
    text-align: center;
}
</style>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4"></div>

        <div class="col-lg-4">
            @if(empty($tags))
                <h2>You haven't tagged any items yet.</h2>
            @else
                <h2> All tags </h2>

                @foreach($tags as $tag)
                <div class="col-lg-4"><a href="/tags/{{$tag}}" class="btn btn-default btn-block" style="text-align:center;">{{$tag}}</a></div>
                @endforeach
            @endif
        </div>

        <div class="col-lg-4"></div>

@stop
