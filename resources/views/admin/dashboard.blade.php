@extends('layouts.adminapp')

@section('content')
	@section('content_header')
	<h1 class="ml-2">Dashboard</h1>
	@endsection

	<div class="container">
			<div class="row">
					<div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-info">
              <span class="info-box-icon"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Buku</span>
                <span class="info-box-number"> {{ $bookcount }} </span>

								<a href="/home/books" class="small-box-footer mt-3" style="color: white;">
                	Info Lengkap <i class="fas fa-arrow-circle-right"></i>
              	</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

					<div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-info">
              <span class="info-box-icon"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Anggota</span>
                <span class="info-box-number"> {{ $membercount }} </span>

								<a href="/home/members" class="small-box-footer mt-3" style="color: white;">
                	Info Lengkap <i class="fas fa-arrow-circle-right"></i>
              	</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

					<div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-info">
              <span class="info-box-icon"><i class="fas fa-redo-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Peminjaman</span>
                <span class="info-box-number"> {{ $borrowingcount }} </span>

								<a href="/home/borrowings" class="small-box-footer mt-3" style="color: white;">
                	Info Lengkap <i class="fas fa-arrow-circle-right"></i>
              	</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

					<div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-info">
              <span class="info-box-icon"><i class="fas fa-undo-alt"></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengembalian</span>
                <span class="info-box-number"> {{ $returncount }} </span>

								<a href="/home/returns" class="small-box-footer mt-3" style="color: white;">
                	Info Lengkap <i class="fas fa-arrow-circle-right"></i>
              	</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
			</div>
	</div>
@endsection
