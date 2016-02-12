@extends('pdf')

@section('content')

<div style="text-align: center">
    <header>
        <h1>HANASAKI SDN BHD</h1>
        <p>No 178 Jalan Restu 22, Taman Seri Puteri<br>
            Fasa II Meru Off Jalan Kassim, Kapar.<br>
            Tel: +603-333666789  Fax: +603-333666790</p>
    </header>
</div>

<div>
    <h2 style="text-align: center">LAPORAN Peringkat Produk</h2>
    <hr>

    <div class="form-group">
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Produk</th>
                    <th>Hasil</th>
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
    </div>

    @else
    <div class="alert alert-info text-center">Tiada Maklumat Untuk Dipaparkan</div>
    @endif
</div>

@stop