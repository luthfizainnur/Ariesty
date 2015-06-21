<!DOCTYPE html>
@extends('index')
@section('content')
    <div class="jumbotron">
    <div class="container">
        <div class="row">
               {{Form::open(array('action' => 'IndexController@groupJawaban', 'files'=>true)) }}
                {{Form::submit('Proses', array('class' => 'btn btn-primary btn-lg')) }}
                <div class="form-group">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Hasil</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <tr>
                                <td>{{$no}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php $no += 1?>
                        </tbody>
                    </table>
                </div>
                {{ Form::close() }}
        </div>
    </div>
</div>
@stop