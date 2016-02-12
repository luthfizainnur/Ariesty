<!DOCTYPE html>
@extends('admin')
@section('content')
<div class="jumbotron">
    <div class="container">
        <div class="row">
            {{Form::open(array('action' => 'IndexController@groupJawaban', 'files'=>true)) }}
            <legend>Hasil Survey Produk Terbaik</legend>
            <div class="form-group">
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Produk</th>
                            <th>Hasil Profile Matching</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>

                        @foreach($has as $hasil)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$hasil->nama}}</td>
                            <td>{{$hasil->hasil}}</td>
                        </tr>
                        <?php $no += 1?>
                        @endforeach

                    </tbody>
                </table>                
                {{Form::submit('Proses', array('class' => 'btn btn-primary btn-lg')) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop