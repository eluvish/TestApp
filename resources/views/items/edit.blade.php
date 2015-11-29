@extends('layouts.master')

@section('head')

@stop

@section('content')
<center>
    <img align="center" src="{{$item->name}}">

<br>
<!-- we will also add show, edit, and delete buttons -->


    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
    <!-- we will add this later since its a little more complicated than the other two buttons -->
    <form action="/items/{{$item->id}}" method="post">
        <input name="_method" type="hidden" value="DELETE">
        {!! csrf_field() !!}
        <input type="submit" name="submit" value="Delete">
    </form>
    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
    <a class="btn btn-small btn-success" href="{{ URL::to('items/' . $item->id) }}">Show this Nerd</a>

    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
    <a class="btn btn-small btn-info" href="{{ URL::to('items/' . $item->id . '/edit') }}">Edit this Nerd</a>
</center>


@stop
