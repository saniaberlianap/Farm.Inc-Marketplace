@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
     
    <h1>Dashboard Admin</h1>
    
  </div>

  <div class="section-body">
    <p>
              <br>
     <div class="row">
           <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('produk.index') }}">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>User</h4>
                  </div>
                  <div class="card-body">
                    {{ $pengguna }}
                  </div>
                </div>
              </div>
            </div>
        </a>
           <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('pengguna.index') }}">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Produk</h4>
                  </div>
                  <div class="card-body">
                    {{ $produk }}
                  </div>
                </div>
              </div>
            </div>
        </a>
           
         
          </div>
  </div>

</section>
@endsection()