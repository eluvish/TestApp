@extends('layouts.master')

@section('title')
    myCloset - Create an Outfit
@stop

@section('head')
<!-- Only for outfits -> index.blade.php -->
    <link rel="stylesheet" type="text/css" href="./css/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="./css/slick/slick-theme.css"/>
    <!-- End index.blade.php -->
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
                            <div data-id="{{$top->id}}"><img src="{{$top->src}}" class="img-thumbnail" /></div>
                        @endforeach

                    </div>
                    <br>
                    <div class="single-item-bottoms">
                        @foreach($bottoms as $bottom)
                            <div data-id="{{$bottom->id}}"><img src="{{$bottom->src}}" id="{{$bottom->id}}" class="img-thumbnail" /></div>
                        @endforeach
                    </div>
                    <br>
                    <div class="single-item-shoes">
                        @foreach($shoes as $shoe)
                            <div data-id="{{$shoe->id}}"><img src="{{$shoe->src}}" id="{{$shoe->id}}" class="img-thumbnail" /></div>
                        @endforeach
                    </div>
                    <form method="POST" action="/outfits/create" class="myForm">
                        <input type="hidden" value="0" name="top" id="top">
                        <input type="hidden" name="bottom" id="bottom" value="">
                        <input type="hidden" name="shoe" id="shoe" value="">
                        <button type="submit" class="btn btn-primary disabled btn-block">Save Outfit</button>
                    </form>

                </div>
            </div>


        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<script type="text/javascript">

// Handles top image slider
  $(document).ready(function(){
    $('.single-item-tops').slick({
        arrows: false,
        adaptiveHeight: true
    });
  });

// Handles middle image slider
  $(document).ready(function(){
    $('.single-item-bottoms').slick({
        arrows: false,
        adaptiveHeight: true
    });
  });

// Handles shoe image slider
  $(document).ready(function(){
    $('.single-item-shoes').slick({
        arrows: false,
        adaptiveHeight: true
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
    END (Outfits) index.blade.php
    *
    *
-->

@stop
