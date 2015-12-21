<!-- START gallery.blade.php -->

    @if(!$tops->isEmpty())
    <div class="row">
    <h2>Tops</h2>
    @foreach($tops as $top)
    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <a class="thumbnail" href="/items/{{$top->id}}">
            <img class="img-responsive img-thumbnail" src="{{$top->src}}" alt="" width="400" height="300" />
        </a>
    </div>
    @endforeach
</div><a name="bottoms"></a>
    @endif

@if(!$bottoms->isEmpty())
<h2>Bottoms</h2>
<div class="row">

    @foreach($bottoms as $bottom)
    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <a class="thumbnail" href="/items/{{$bottom->id}}">
            <img class="img-responsive img-thumbnail" src="{{$bottom->src}}" alt="" width="400" height="300" />
        </a>
    </div>
    @endforeach
</div>
@endif

@if(!$shoes->isEmpty())
<h2>Shoes</h2>
<a name="shoes"></a>
<div class="row">
    @foreach($shoes as $shoe)
    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <a class="thumbnail" href="/items/{{$shoe->id}}">
            <img class="img-responsive img-thumbnail"" src="{{$shoe->src}}" alt="" width="400" height="300" />
        </a>
    </div>
    @endforeach
  </div>
</div>
@endif
<!-- END gallery.blade.php -->
