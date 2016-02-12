<!DOCTYPE html>
@extends('index')
@section('content')
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <legend>Hasil Survey Produk Terbaik</legend>
            <div class="form-group">
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>

                        @foreach($has2 as $hasil2)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$hasil2->nama}}</td>
                        </tr>
                        <?php $no += 1?>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop