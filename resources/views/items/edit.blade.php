@extends('layouts.master')

@section('head')
<style>
table, th, td {

    margin:auto;
}

th, td {
    padding: 10px;
}

input[type=text] {
    width: 80px;
    margin-top: 12px;
    font-size: 1em;
}

</style>
@stop

@section('content')

<div class="container">
    <table align="center">
        <tr>
            <td rowspan="{{count($item->tags)+2}}"><img align="center" src="http://localhost/{{$item->src}}"></td>
            @foreach($item->tags as $tag)
                <tr>

                    <td>
                        <button type="button" class="btn btn-success btn-sm btn-block">{{$tag->name}}</button>
                    </td>

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
                <tr>
                <td>
                    <div class="form-group">
                        <form action="/tags/link" method="post">
                            {{ csrf_field() }}
                            {!! Form::hidden('item_id', $item->id) !!}
                        <input class="form-control input-sm" type="text" placeholder="Tag" id="inputSmall" name="tag">
                    </div>
                </td>
                <td>
                    <button type="submit" class="btn btn-xs btn-primary">Add</button>
                </form>
                </td>
            </tr>

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


@if(count($errors) > 0)
    <ul class='errors'>
        @foreach ($errors->all() as $error)
            <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
        @endforeach
    </ul>
@endif



@stop
