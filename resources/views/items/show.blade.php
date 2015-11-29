@extends('layouts.master')

@section('head')

@stop

@section('content')
<center>

<div class="container">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders to a table:</p>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>User</th>
        <th>Thumbnail</th>
        <th>imgPath</th>
        <th>Tags</th>
      </tr>
    </thead>
    <tbody>

        @foreach($items as $item)
        <tr>
            <td> {{ $item->user_id }} </td>
            <td> <a href="/items/{{$item->id}}"><img src="{{$item->name}}" width="150" height="100" class="img-thumbnail"></a>
            <td> {{ $item->name }} </td>

            @foreach($item->tags as $tag)
                <td>{{$tag->name}}</td>
            @endforeach
            <td>
                <form action="/items/{{$item->id}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button>Delete Task</button>
                </form>
            </td>
            </tr>
        @endforeach

    </tbody>
  </table>
</div>

</center>
@stop
