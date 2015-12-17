@extends('layouts.master')

@section('title')
myCloset - All My Items
@stop

@section('head')
<style>
h2 {
    text-align: center;
}
</style>
@stop

@section('content')
<!-- image gallery code from http://startbootstrap.com/template-overviews/thumbnail-gallery/ -->

<div class="container">

    @if($tops->isEmpty() && $bottoms->isEmpty() && $shoes->isEmpty())
        <div class="row">
            <div class="col-lg-12">
                <h2>You don't have any items. Why not <a href="/upload">add</a> some?</h2>
            </div>
        </div>
    @else
        @include('_partials.gallery')
    @endif
</div>
@stop
