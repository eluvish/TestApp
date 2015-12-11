@extends('layouts.master')

@section('head')

@stop

@section('content')
<!--
    *
    *
    Generated by register.blade.php
    *
    *
-->

<div class="container">
    <div class="row">

        <!-- left column spacer -->
        <div class="col-lg-4"></div>

        <!-- center column -data- -->
        <div class="col-lg-4">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Register for an account</h3>
                </div>

            <div class="panel-body">

                <form class="form" method="post" action='/register' accept-charset="UTF-8">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="email">First Name:</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password" />
                    </div>

                    <div class="form-group">
                        <label for="pwd_confirm">Confirm Password:</label>
                        <input type="password" name="password_confirmation" class="form-control" />
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>

            <br><br>
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
<!--
    *
    *
    End register.blade.php
    *
    *
-->
@stop
