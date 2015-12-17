@extends('layouts.master')

@section('title')
myCloset - Tag: {{$name}}
@stop

@section('head')
<style>
h2 {
  text-align: center;
}
</style>
@stop

@section('content')
<!-- START bytag.blade.php -->


<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <h1 style="text-align: center;">Tag: {{$name}}</h1><br>
    </div>

@if($tops->isEmpty() && $bottoms->isEmpty() && $shoes->isEmpty())

  <br>
  <h2 style="text-align: center;">No items found.</h2>

@else
    @include('_partials.gallery')
@endif

</div>


<!-- END bytag.blade.php -->

@stop
