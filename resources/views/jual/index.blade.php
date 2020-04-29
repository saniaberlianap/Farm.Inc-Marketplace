@extends('layouts.adminmain')

@section('content')
<section class="section">
  


  <div class="section-header">
    <h1>Data Jual</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
    @if($message = Session::get('success'))
          <div class="alert alert-success">
            <p> {{ $message }} </p>
          </div>
	      @endif
        <div class="card">
          
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">User</th>
                  <th scope="col">Produk</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($dataJual as $key => $jual)
                <tr>
                  <td>{{ $dataJual->firstItem() + $key }}</td>
                  <td>{{ $jual->nama }}</td>
                  <td>{{ $jual->nama_produk }}</td>
                  
                  <td>
                   <a href="{{ route('jual.delete', ['id_jual' => $jual->id_jual]) }}"
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
{!! $dataJual->links() !!}
@endsection()