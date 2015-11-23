@extends('layouts.master')

@section('head')
    <link rel="stylesheet" href="/css/forms.css">
@stop

@section('content')



    <!-- resources/views/auth/login.blade.php -->

<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<center>
    <div class="wrapper">
        <h1>Login</h1>
        <p class="heading"></p>
            <form method="POST" action="/login" role="form" accept-charset="UTF-8">
                {!! csrf_field() !!}
                <div>
                    <label for="email"></label>
                    <input type="email" class="email" placeholder="Email" name="email" />
                </div>

                <div>
                    <label for="pwd"></label>
                    <input type="password" name="password" placeholder="Password" />
                </div>

                <div>
                <label for="remember" style="display: inline-block; text-align: left;"><input type="checkbox" name="remember" />   Remember Me</label>
                </div>

                <div>
                <input type="submit" class="submit" value="Login">
                </div>
            </form>
        </div>
        <br>
        @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </center>

<!--
<center>
        <h1>Login</h1>
    <form method="POST" action="/login" role="form" accept-charset="UTF-8">
        {!! csrf_field() !!}
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type='text' name='email' id='email' value='{{ old('email') }}' class="form-control">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</center>
-->

@stop
