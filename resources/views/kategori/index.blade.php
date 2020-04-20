@extends('layouts.adminmain')
@section('title', 'Index Data Kategori')
@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Kategori</h1>
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
            <a href="{{ route('kategori.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{ route('kategori.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Jenis Kategori</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($dataKategori as $key => $ktgr)
                <tr>
                  <td>{{ $dataKategori->firstItem() + $key }}</td>
                  <td>{{ $ktgr->jenis}}</td>
                  <td>
                    <a href="{{ route('kategori.edit', ['id_kategori' => $ktgr->id_kategori]) }}">
                      <button type="button" class="btn btn-sm btn-info">Edit</button>
                    </a>
                   <a href="{{ route('kategori.delete', ['id_kategori' => $ktgr->id_kategori]) }}"
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
{!! $dataKategori->links() !!}
@endsection()