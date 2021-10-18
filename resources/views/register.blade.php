<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
<link rel="icon" href="{{asset('logo-retina.png')}}">

<title>Manajemen Penelitian dan Pengabdian</title>
</head>
<div class="sidenav">
         <div class="login-main-text">
              <img src="{{asset('logo-retina.png')}}" class="rounded mb-6" style="width:30%" alt="...">
             
            <h2>Sistem Informasi Penelitian dan Pengabdian<br>STMIK Pelita Nusantara</h2>
            <p>Login untuk masuk ke sistem.</p>
         </div>
      </div>
      <div class="main ms-8">
         <div class="col-md-1 col-12">
            <div class="login-form" style="width:600px;">
               <form action="createUser" method="post">
               @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <!-- <form action="createUser"> -->
                                <div class="form-group row">
                                        <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="nama" class="form-control" id="inputNama" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="nim" class="form-control" id="inputNIM" placeholder="NIM">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="TTL" class="col-sm-2 col-form-label">TTL</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="ttl" class="form-control" id="inputTTL" placeholder="TTL">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="Sekolah" class="col-sm-2 col-form-label">Sekolah</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="sekolah" class="form-control" id="inputSekolah" placeholder="Sekolah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="alamat" class="form-control" id="inputAlamat" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="Tahun" class="col-sm-2 col-form-label">Tahun</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="tahun" class="form-control" id="inputTahun" placeholder="Tahun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="Prodi" class="col-sm-2 col-form-label">Prodi</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="prodi" class="form-control" id="inputProdi" placeholder="Prodi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="Username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                                    </div>
                                </div>
                            <!-- </form> -->
                  <button type="submit" class="btn btn-black">Register</button>
                  <!-- <button type="submit" class="btn btn-secondary">Register</button> -->
               </form>
               <div class="small">Sudah punya akun? <a href="/login">Register</a></div>
            </div>
         </div>
      </div>

<style>
    body {
    font-family: "Lato", sans-serif;
}



.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #000;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}
</style>