@extends('layouts.master')

@section('title')
myCloset - Log In
@stop

@section('content')

<!-- resources/views/auth/login.blade.php -->

<div class="container">
    <div class="row">

        <!-- left column spacer -->
        <div class="col-lg-4"></div>

        <!-- center column -data- -->
        <div class="col-lg-4">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">

                    <form method="POST" action="/login" role="form" accept-charset="UTF-8">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type='text' name='email' id='email' value='{{ old('email') }}' class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" class="form-control">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>

                </div>
            </div>
        <br>

            @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <!-- right column spacer -->
        <div class="col-lg-4"></div>
    </div>
</div>

@stop
