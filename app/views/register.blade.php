<!DOCTYPE html>
@extends('index')
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
                <h2 class="text-center">REGISTER FORM ADMIN</h2>
                {{Form::open(array('action' => 'IndexController@registerresult', 'files'=>true)) }}
                <div class="form-group">
                    <label for="username">USERNAME</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">PASSWORD</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label for="ulang">RE-TYPE PASSWORD</label>
                    <input type="password" class="form-control" name="repassword" required>
                </div>
                <div class="form-group">
                    <label for="nama">NAMA</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="alamat">ALAMAT</label>
                    <input type="text" class="form-control" name="alamat" required>
                </div>
                <div class="form-group">
                    <label for="telp">NO TELEPON</label>
                    <input type="text" class="form-control" name="no_telp" required>
                </div>
                {{Form::submit('Submit', array('class' => 'btn btn-primary btn-lg')) }}
                {{Form::reset('Reset', array('class' => 'btn btn-danger btn-lg')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop
