<!DOCTYPE html>
@extends('index')
@section('content')
<div class="jumbotron">
    <div class="container">
        <div class="col-md-5 col-md-offset-3">
            <h3>Login</h3>

            {{Form::open(array('action' => 'IndexController@authenticate')) }}
            {{Form::label('username', 'Username') }}
            {{Form::text('username', '', array('class' => 'form-control'))}}
            {{Form::label('password', 'Password') }}
            {{Form::password('password', array('class' => 'form-control'))}}
            {{Form::submit('Login', array('class' => 'btn btn-primary')) }}
            {{Form::close() }}

        </div>
    </div>
</div>
@stop