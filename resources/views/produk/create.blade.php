@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Produk <small>Add Data</small></h1>
  </div>

  <div class="section-body">
  @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('produk.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Gambar</label>
                <input type="text" name="image" class="form-control">
              </div>
              <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control">
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control">
              </div>
               <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control">
              </div>
               <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control">
              </div>
              <div class="form-group">
                  <label>User</label>
                      <select class="form-control" id="pengguna_id" name="pengguna_id" class="form-control">
                          <option value="" hidden>Pilih User</option>
                                @foreach($pengguna as $p)
                          <option value="{{ $p->id_pengguna }}">{{ $p->nama }}</option>
                                @endforeach
                      </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()