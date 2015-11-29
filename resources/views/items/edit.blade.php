@extends('layouts.master')

@section('head')

@stop

@section('content')

<center>
    <img align="center" src="http://localhost/{{$item->src}}">

<br><br><br>

<form action="/items/{{$item->id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    {!! Form::hidden('id', $item->id) !!}
    <input type="text" name="tag" placeholder="shirt" style="width: 100px;" />
    <input type="submit" value="Add Tag">
</form>

<div class="row">
    <p>Tags:
        @foreach($item->tags as $tag)
            <li>{{$tag->name}}
        @endforeach
</div>


<br><br>
<form action="/items/{{$item->id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    {!! Form::hidden('id', $item->id) !!}
    <input type="submit" value="Delete Item">
</form>
<br>
@if(count($errors) > 0)
    <ul class='errors'>
        @foreach ($errors->all() as $error)
            <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
        @endforeach
    </ul>
@endif
    {{-- <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
    <a class="btn btn-small btn-success" href="{{ URL::to('items/' . $item->id) }}">Show this Nerd</a>

    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
    <a class="btn btn-small btn-info" href="{{ URL::to('items/' . $item->id . '/edit') }}">Edit this Nerd</a> --}}
</center>


@stop
