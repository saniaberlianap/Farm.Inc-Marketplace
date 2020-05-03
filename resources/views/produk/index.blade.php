@extends('layouts.adminmain')

@section('content')
<section class="section">
  


  <div class="section-header">
    <h1>Produk</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
    @if($message = Session::get('success'))
          <div class="alert alert-success">
            <p> {{ $message }} </p>
          </div>
	      @endif
        <div class="card">
          <div class="card-header">
          <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{ route('produk.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{ route('produk.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Image</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Harga</th>
                  <th scope="col">User</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($dataProduk as $key => $produk)
                <tr>
                  <td>{{ $dataProduk->firstItem() + $key }}</td>
                  <td>
                        <img src="{{ URL::to('/') }}/images/{{ $produk->image }}" class="img-thumbnail" width="75"/>
                      </td>
                  <td>{{ $produk->nama_produk }}</td>
                  <td>{{ $produk->kategori }}</td>
                  <td>{{ $produk->deskripsi }}</td>
                  <td>{{ $produk->harga }}</td>
                  <td>{{ $produk->nama }}</td>
                  
                  <td>
                    <a href="{{ route('produk.edit', ['$id_produk' => $produk->id_produk]) }}">
                      <button type="button" class="btn btn-sm btn-info">Edit</button>
                    </a>
                   <a href="{{ route('produk.delete', ['id_produk' => $produk->id_produk]) }}"
                    onclick="return confirm('Delete data?');" 
                    >
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    </a>
                   </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>
{!! $dataProduk->links() !!}
@endsection()