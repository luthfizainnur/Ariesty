<!DOCTYPE html>
@extends('admin')
@section('content')
<div class="jumbotron">
    <div class="container">
        <div class="row">
            {{Form::open(array('action' => 'IndexController@postjawabanadmin', 'files'=>true, 'class'=>'form-horizontal', 'method' => 'get')) }}
            <fieldset>
                <!-- Form Name -->
                <legend>Questionaire</legend>
                <!-- Select Tipe Pastry -->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="Tipe">Tipe Pastry</label>
                    <div class="col-md-2">
                        {{ Form::select('nama',(['0' => 'Jenis Patiseri'] + $dropdown), null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <!-- Select Product -->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="produk">Nama Produk</label>
                    <div class="col-md-2">
                        <select id="produk" name="produk" class="form-control">

                        </select>
                    </div>
                </div>

                <!-- Multiple Checkboxes (inline) -->
                <div class="form-group">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Questionaire</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($soal as $y => $x)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$x}}</td>
                                <td> 
                                    <label class="radio-inline" for="nilai-1">
                                        <input type="radio" name="jawaban[{{$y}}]" id="nilai-1" value="1">1</label>
                                    <label class="radio-inline" for="nilai-2">
                                        <input type="radio" name="jawaban[{{$y}}]" id="nilai-2" value="2">2</label>
                                    <label class="radio-inline" for="nilai-3">
                                        <input type="radio" name="jawaban[{{$y}}]" id="nilai-3" value="3">3</label>
                                </td>
                            </tr>
                            <?php $no += 1?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <legend>Keterangan || 1 = Tidak Puas | 2 = Puas | 3 = Sangat Puas</legend>
            </fieldset>
            {{Form::submit('Submit', array('class' => 'btn btn-primary btn-lg')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop

@section('javascript')
<script type="text/javascript" >
    $(document).ready(function(){
        $("[name='nama']").change(function(){
            $.ajax({
                url: "http://localhost/tugasakhir/public/produk/" + $("[name='nama']").val()
            }).done(function(myOptions) {

                var mySelect = $("[name='produk']");
                mySelect.text("");
                $.each(myOptions, function(val, text) {
                    mySelect.append(
                        $('<option></option>').val(val).html(text)
                    );
                });
            });
        }); 
    });
</script>
@stop