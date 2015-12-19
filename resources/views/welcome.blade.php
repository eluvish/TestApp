@extends('layouts.master')

@section('title')
myCloset - a Wardrobe Manager App
@stop

@section('content')

<div class="container">

<div id="myCarousel" class="carousel" data-ride="carousel">

<ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1"></li>
  <li data-target="#myCarousel" data-slide-to="2"></li>
</ol>


<div class="carousel-inner" role="listbox">
  <div class="item active">
    <img src="/slideshow/slideshow1.jpg" alt="New York" width="1200" height="700">
    <div class="carousel-caption">
      <h3>Keep Track of your Wardrobe</h3>
      <p>Add and tag your items!</p>
    </div>
  </div>

  <div class="item">
    <img src="/slideshow/slideshow3.jpg" alt="Chicago" width="1200" height="700">
    <div class="carousel-caption">
      <h3>Create Outfits</h3>
      <p>Mix and match to create outfits. Save them and share with friends!</p>
    </div>
  </div>

  <div class="item">
    <img src="/slideshow/slideshow2.jpg" alt="Los Angeles" width="1200" height="700">
    <div class="carousel-caption">
      <h3>Mobile Optimized</h3>
      <p>myCloset is easily accessible with any browser on your desktop, laptop, or mobile phone.</p>
    </div>
  </div>
</div>


<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</div>

@stop
