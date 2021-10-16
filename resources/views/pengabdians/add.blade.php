@extends('master')

@section('content')


<h2 class="page-header">pengabdian</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify pengabdian    </div>

    <div class="panel-body">
                
        <form action="{{ url('/pengabdians'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


                                    <div class="form-group">
                <label for="id" class="col-sm-3 control-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" name="id" id="id" class="form-control" value="{{(isset($model) ? $model->id : '') }}" readonly="readonly">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="judul" class="col-sm-3 control-label">Judul</label>
                <div class="col-sm-6">
                    <input type="text" name="judul" id="judul" class="form-control" value="{{(isset($model) ? $model->judul : '') }}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="pelaksana" class="col-sm-3 control-label">Pelaksana</label>
                <div class="col-sm-6">
                    <input type="text" name="pelaksana" id="pelaksana" class="form-control" value="{{(isset($model) ? $model->pelaksana : '') }}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="nidn_nim" class="col-sm-3 control-label">Nidn Nim</label>
                <div class="col-sm-6">
                    <input type="text" name="nidn_nim" id="nidn_nim" class="form-control" value="{{(isset($model) ? $model->nidn_nim : '') }}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="program_studi" class="col-sm-3 control-label">Program Studi</label>
                <div class="col-sm-6">
                    <input type="text" name="program_studi" id="program_studi" class="form-control" value="{{(isset($model) ? $model->program_studi : '') }}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="tahun" class="col-sm-3 control-label">Tahun</label>
                <div class="col-sm-6">
                    <input type="text" name="tahun" id="tahun" class="form-control" value="{{(isset($model) ? $model->tahun : '') }}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="jangka_waktu" class="col-sm-3 control-label">Jangka Waktu</label>
                <div class="col-sm-6">
                    <input type="text" name="jangka_waktu" id="jangka_waktu" class="form-control" value="{{(isset($model) ? $model->jangka_waktu : '') }}">
                </div>
            </div>
                                                                                                            <div class="form-group">
                <label for="biaya" class="col-sm-3 control-label">Biaya</label>
                <div class="col-sm-2">
                    <input type="number" name="biaya" id="biaya" class="form-control" value="{{(isset($model) ? $model->biaya : '') }}">
                </div>
            </div>
                                                                                    <div class="form-group">
                <label for="lokasi" class="col-sm-3 control-label">Lokasi</label>
                <div class="col-sm-6">
                    <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{(isset($model) ? $model->lokasi : '') }}">
                </div>
            <!-- </div>
                                                                                                                        <div class="form-group">
                <label for="created_at" class="col-sm-3 control-label">Created At</label>
                <div class="col-sm-3">
                    <input type="date" name="created_at" id="created_at" class="form-control" value="@if (isset($model)) $model['created_at'] @endif">
                </div> -->
            </div> 
                                    
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/pengabdians') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection