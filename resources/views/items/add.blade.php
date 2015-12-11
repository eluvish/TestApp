@extends('layouts.master')

@section('title')
    myCloset - Add an Item
@stop

@section('content')

<!-- resources/views/auth/add.blade.php -->
<div class="container">
    <div class="row">
        <div class="col-lg-4"></div>

        <div class="col-lg-4">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Add an Item</h3>
                </div>
                <div class="panel-body">

                    <form method="POST" action="/upload" role="form" accept-charset="UTF-8" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="image">File Upload</label>
                            <input type="file" name="image" />
                        </div>

                        <div class="form-group">
                        <label for="url">or URL</label>
                            <input type="text" name="url" class="form-control" placeholder="http://"/>
                        </div>

                        <div class="form-group">
                            <label for="sel1">Where worn?</label>
                            <select class="form-control" name="type" id="sel1">
                                <option>Top</option>
                                <option>Bottom</option>
                                <option>Shoe</option>
                                <option>Accessory</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-lg btn-block">Upload</button>
                        </div>

                    </form>
                </div>

            </div>

            @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <div class="col-lg-4"></div>
    </div>
</div>
@stop
