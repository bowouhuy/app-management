@extends('master')

@section('content')


<h2 class="page-header">Biodata</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Biodata    </div>

    <div class="panel-body">
                
        <form action="{{ url('/user') }}/{{$model->id}}/update" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            


            <div class="form-group">
                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="inputNama" value="{{$model->nama}}">
            </div>
        </div>
        <div class="form-group">
                <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                <input type="text" name="nim" class="form-control" id="inputNIM" value="{{$model->nim}}">
            </div>
        </div>
        <div class="form-group">
                <label for="TTL" class="col-sm-2 col-form-label">TTL</label>
                <div class="col-sm-10">
                <input type="text" name="ttl" class="form-control" id="inputTTL" value="{{$model->ttl}}">
            </div>
        </div>
        <div class="form-group">
                <label for="Sekolah" class="col-sm-2 col-form-label">Sekolah</label>
                <div class="col-sm-10">
                <input type="text" name="sekolah" class="form-control" id="inputSekolah" value="{{$model->sekolah}}">
            </div>
        </div>
        <div class="form-group">
                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" id="inputAlamat" value="{{$model->alamat}}">
            </div>
        </div>
        <div class="form-group">
                <label for="Tahun" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-10">
                <input type="text" name="tahun" class="form-control" id="inputTahun" value="{{$model->tahun}}">
            </div>
        </div>
        <div class="form-group">
                <label for="Prodi" class="col-sm-2 col-form-label">Prodi</label>
                <div class="col-sm-10">
                <input type="text" name="prodi" class="form-control" id="inputProdi" value="{{$model->prodi}}">
            </div>
        </div>
        <div class="form-group">
                <label for="Username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                <input type="text" name="username" class="form-control" id="inputUsername" value="{{$model->name}}" readonly="readonly">
            </div>
        </div>
        <div class="form-group">
                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="inputEmail" value="{{$model->email}}" readonly="readonly">
            </div>
        </div>
                                    
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/user') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection