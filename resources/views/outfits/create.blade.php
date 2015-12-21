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
    (Outfits) create.blade.php
    *
    *
-->
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-primary" style="text-align: center;">
                <div class="panel-heading">
                    <h2 class="panel-title">Create an Outfit!</h2><br>
                    <p class="panel-text">Swipe with your finger or mouse.</p>
                </div>
                <div class="panel-body">

                    <div class="single-item-tops" style="text-align: center;">

                        @foreach($tops as $top)
                            <div data-id="{{$top->id}}"><img src="{{$top->src}}" class="img-thumbnail" /></div>
                        @endforeach

                    </div>

                    <div class="single-item-bottoms">
                        @foreach($bottoms as $bottom)
                            <div data-id="{{$bottom->id}}"><img src="{{$bottom->src}}" class="img-thumbnail" /></div>
                        @endforeach
                    </div>

                    <div class="single-item-shoes">
                        @foreach($shoes as $shoe)
                            <div data-id="{{$shoe->id}}"><img src="{{$shoe->src}}" class="img-thumbnail" /></div>
                        @endforeach
                    </div>

                    <form method="POST" action="/create" class="myForm">
                        {{ csrf_field()}}
                        <input type="hidden"  name="top" id="top" value="{{ $tops->first()->id }}">
                        <input type="hidden" name="bottom" id="bottom" value="{{ $bottoms->first()->id }}">
                        <input type="hidden" name="shoe" id="shoe" value="{{ $shoes->first()->id }}">
                        <button type="submit" class="btn btn-primary btn-block">Save Outfit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
@stop

@section('body')
<script type="text/javascript" src="/js/slick/slick.min.js"></script>

<script type="text/javascript">

// Handles top image slider
  $(document).ready(function(){
    $('.single-item-tops').slick({
        adaptiveHeight: true,
        arrows: false
    });
  });

// Handles middle image slider
  $(document).ready(function(){
    $('.single-item-bottoms').slick({
        adaptiveHeight: true,
        arrows: false
    });
  });

// Handles shoe image slider
  $(document).ready(function(){
    $('.single-item-shoes').slick({
        adaptiveHeight: true,
        arrows: false
    });
  });

  // Anytime the user changes the photo (Swipes/arrow) these 3 functions change the <input> value of the 'Save Outfit' form.
    $('.single-item-tops').on('afterChange', function(event, slick, currentSlide, nextSlide)
    {
      var elSlide = $(slick.$slides[currentSlide]);
      var dbId = elSlide.data('id');
      var elem = document.getElementById("top").value = dbId;
    });

    $('.single-item-bottoms').on('afterChange', function(event, slick, currentSlide, nextSlide)
    {
      var elSlide = $(slick.$slides[currentSlide]);
      var dbId = elSlide.data('id');
      var elem = document.getElementById("bottom").value = dbId;
    });

    $('.single-item-shoes').on('afterChange', function(event, slick, currentSlide, nextSlide)
    {
      var elSlide = $(slick.$slides[currentSlide]);
      var dbId = elSlide.data('id');
      var elem = document.getElementById("shoe").value = dbId;
    });

</script>

<!--
    *
    *
    END (Outfits) create.blade.php
    *
    *
-->

@stop
