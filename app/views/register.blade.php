<!DOCTYPE html>
@extends('admin')
@section('content')
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="what-info">
                <div class="strip"></div>
                <p> 
                    <?php $messages = $errors->all('<p style="color:red">:message</p>') ?>
                    <?php foreach ($messages as $msg): ?>
                    <?= $msg ?>
                    <?php endforeach; ?>
                </p>
                <br/>
            </div>
            <div class="col-lg-4">
                <legend>REGISTER FORM ADMIN</legend>
                {{Form::open(array('action' => 'IndexController@registerresult', 'files'=>true)) }}
                <div class="form-group">
                    <label for="nama">NAMA</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="username">USERNAME</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">EMAIL</label>
                    <input type="text" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">PASSWORD</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                {{Form::submit('Submit', array('class' => 'btn btn-primary btn-lg')) }}
                {{Form::reset('Reset', array('class' => 'btn btn-danger btn-lg')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop
