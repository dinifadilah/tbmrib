@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3">
								<div class="card-header">Detail Buku</div>
                <div class="card-body">
									<div class="row">
										<div class="col-3">
											<img width="100%" src="{{ url('/data_file/'.$book->gambar_buku) }}" alt="">
										</div>
										<div class="col">
											<div class="row">
												<div class="col-4"><p>ID Buku</p></div>
												<div class="col"><b>#{{ $book->id_buku }}</b></div>
											</div>
											<div class="row">
												<div class="col-4"><p>Judul Buku</p></div>
												<div class="col"><b>{{ $book->judul_buku }}</b></div>
											</div>
											<div class="row">
												<div class="col-4"><p>Penulis</p></div>
												<div class="col"><b>{{ $book->penulis }}</b></div>
											</div>
											<div class="row">
												<div class="col-4"><p>Penerbit</p></div>
												<div class="col"><b>{{ $book->penerbit }}</b></div>
											</div>
											<div class="row">
												<div class="col-4"><p>Kategori</p></div>
												<div class="col">
													<b>
														@if ($book->kategori)
															{{ $book->kategori }}
														@else
															-
														@endif
													</b>
												</div>
											</div>
											<div class="row">
												<div class="col-4"><p>Tahun terbit</p></div>
												<div class="col"><b>{{ $book->tahun_terbit }}</b></div>
											</div>
											<div class="row">
												<div class="col-4"><p>Tanggal Masuk</p></div>
												<div class="col"><b>{{ date('d M Y', strtotime($book->tanggal_masuk)) }}</b></div>
											</div>
											<div class="row">
												<div class="col-4"><p>ISBN</p></div>
												<div class="col"><b>{{ $book->isbn }}</b></div>
											</div>
											<div class="row">
												<div class="col-4"><p>Stok Buku</p></div>
												<div class="col"><span class="badge badge-primary"><b>{{ $book->stok_buku }}</b></span></div>
											</div>
										</div>
									</div>

									<a href="/home/books" class="btn btn-sm btn-secondary" > Kembali </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
