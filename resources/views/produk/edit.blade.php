@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Produk <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
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
            <form method="post" action="{{ route('produk.update', $dataProduk->id_produk) }}" enctype="multipart/form-data">
                  @csrf
                
              <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" value="{{ $dataProduk->nama_produk }}">
              </div>
              <div class="form-group">
                <label>Kategori Produk</label>
                  <select class="form-control" name="kategori_id">
                          @foreach( $kategori as $k)
                              <option value="{{ $k->id_kategori }}" {{ $k->id_kategori == $dataProduk->kategori_id ? 'selected="selected"' : '' }}> {{ $k->jenis}} </option>
                          @endforeach
          </select></div>
          <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" value="{{ $dataProduk->deskripsi }}">
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="{{ $dataProduk->harga }}">
              </div>
              <div class="form-group">
                <label>Select Product Image</label>
                  <div class="col-md-8">
                    <input type="file" name="image"/>
                      <img src="{{ URL::to('/')}}/images/{{ $dataProduk->image }}" class="img-thumbnail" width="100">
                        <input type="hidden" name="hidden_image" value="{{ $dataProduk->image }}" class="form-control">
                  </div>
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