@extends('layouts.master')

@section('head')
<style>
table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 10px;
}
</style>
@stop

@section('content')

<div class="container">
    <table align="center">
        <tr>
            <td rowspan="{{count($item->tags)+1}}"><img align="center" src="http://localhost/{{$item->src}}"></td>
            @foreach($item->tags as $tag)
                <tr>
                    <td><button type="button" class="btn btn-success btn-sm btn-block">{{$tag->name}}</button></td>
                    <td>
                        <form action="/tags/unlink" method="post">
                            {{ csrf_field() }}
                            {!! Form::hidden('item_id', $item->id) !!}
                            {!! Form::hidden('tag_id', $tag->id) !!}
                        <button type="submit" class="btn btn-danger btn-xs" value="X">X</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tr>
        <tr>
            <td colspan="{{count($item->tags)+3}}">
                <form action="/items/{{$item->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    {!! Form::hidden('id', $item->id) !!}
                    <button type="submit" class="btn btn-danger btn-block">DELETE ITEM</button>
                </form>

            </td>
        </tr>
    </table>
</div>

<br><br><br><br><br><br><br><br><br>
<center>
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
</center>

@if(count($errors) > 0)
    <ul class='errors'>
        @foreach ($errors->all() as $error)
            <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
        @endforeach
    </ul>
@endif



@stop
