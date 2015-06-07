<!DOCTYPE html>
@extends('index')
@section('content')
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="text-center">LOGIN</h2>                    
                <div class="contact-form">
                    {{Form::open(array('action' => 'IndexController@authenticate', 'files'=>true)) }}

                    <div class="form-group">
                        {{Form::text('username', '', array('Input::old(username)','placeholder'=>'Username','class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    {{Form::submit('Login', array('class' => 'btn btn-primary btn-lg')) }}
                    {{Form::reset('Reset', array('class' => 'btn btn-danger btn-lg')) }}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop