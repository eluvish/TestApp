@extends('layouts.master')

@section('title')
    myCloset - Create an Outfit
@stop

@section('head')
    <link rel="stylesheet" type="text/css" href="./css/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="./css/slick/slick-theme.css"/>
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
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <div class="panel panel-primary"  style="text-align: center;">
                <div class="panel-heading">
                    <h3 class="panel-title">Create an Outfit!</h3>
                </div>
                <div class="panel-body">

                    <div class="single-item-tops" style="text-align: center;">

                        @foreach($tops as $top)
                            <div><img src="{{$top->src}}" id="{{$top->id}}" class="img-thumbnail" /></div>
                        @endforeach

                    </div>
                    <br>
                    <div class="single-item-bottoms">
                        @foreach($bottoms as $bottom)
                            <div><img src="{{$bottom->src}}" id="{{$bottom->id}}" class="img-thumbnail" /></div>
                        @endforeach
                    </div>
                    <br>
                    <div class="single-item-shoes">
                        @foreach($shoes as $shoe)
                            <div><img src="{{$shoe->src}}" id="{{$shoe->id}}" class="img-thumbnail" /></div>
                        @endforeach
                    </div>
                    <form method="POST" action="/outfits/create" class="myForm">
                        <input type="hidden" name="top" class="top" value="">
                        <input type="hidden" name="bottom" value="">
                        <input type="hidden" name="shoe" value="">
                        <button type="submit" class="btn btn-primary disabled btn-block">Save Outfit</button>
                    </form>

                </div>
            </div>


        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){
    $('.single-item-tops').slick({
        arrows: false,
        adaptiveHeight: true
    });

//     $('.single-item-tops').on('afterChange', function(event, slick, currentSlide){
//   confirm(currentSlide);
// });

  });

  $(document).ready(function(){
    $('.single-item-bottoms').slick({
        arrows: false,
        adaptiveHeight: true
    });
  });

  $(document).ready(function(){
    $('.single-item-shoes').slick({
        arrows: false,
        adaptiveHeight: true
    });
  });
</script>

<!--
    *
    *
    END (Outfits) index.blade.php
    *
    *
-->

@stop
