@extends('layouts.userapp')

@section('styles')
<style>
	.cover-buku {
    border-radius: 17px;
		width: 75%;
	}

	/* .btn-back {
		background-color: #0589FF;
		color: white;
	} */

	@media only screen and (max-width: 767px) {
		.cover-buku {
			width: 100%;
		}
	}
</style>
@endsection

@section('content')
	<div class="container mt-4">
			<div class="row">
				<div class="col-12">
					<a href="/" class="btn btn-light btn-back">Kembali</a>
					<div class="row mb-4">
							<div class="col-12 col-md-4 pt-3">
									<img class="cover-buku" src="{{ url('/data_file/'.$book->gambar_buku) }}" alt="">
							</div>
							<div class="col-12 col-md-8 p-3">
									<h1> {{ $book->judul_buku }} </h1>
									<p> Penulis: {{ $book->penulis }} </p>
									<p> Penerbit: {{ $book->penerbit }} </p>
									<p>
										Kategori:
										@if ($book->kategori)
											{{ $book->kategori }}
										@else
											-
										@endif
									</p>
									<p> Tahun Terbit: {{ $book->tahun_terbit }} </p>
									<p> ISBN: {{ $book->isbn }} </p>
									<p> Stok Buku: <span class="badge badge-info">{{ $book->stok_buku }}</span> </p>
							</div>
					</div>
				</div>
			</div>
	</div>
@endsection