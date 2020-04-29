@extends('layouts.adminmain')
@section('title', 'Edit Data Pengguna')
@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      User <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('pengguna.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ route('pengguna.update', ['id_pengguna' => $pengguna->id_pengguna]) }}" method="POST" enctype="multipart/form-data">
              
              @csrf
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $pengguna->nama }}">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $pengguna->email }}">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $pengguna->alamat }}">
              </div>
              <div class="form-group">
                <label>No HP</label>
                <input type="text" name="nohp" class="form-control" value="{{ $pengguna->nohp }}">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" value="{{ $pengguna->password }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()