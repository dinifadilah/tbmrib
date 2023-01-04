@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3">
								<div class="card-header">Detail Peminjaman</div>
                <div class="card-body">
									<h2>Info peminjaman</h2>
									<div class="row">
										<div class="col-4"><p>ID Transaksi</p></div>
										<div class="col"><p>#{{ $borrowing->id_peminjaman }}</></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Tanggal Pinjam</p></div>
										<div class="col"><p>{{ $borrowing->tanggal_pinjam }}</></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Tanggal Kembali</p></div>
										<div class="col"><p>{{ $borrowing->tanggal_kembali }}</></div>
									</div>
									
									<hr>

									<h2>Info Peminjam</h2>
									<div class="row">
										<div class="col-4"><p>ID Peminjam</p></div>
										<div class="col"><p>#{{ $borrowing->id_anggota }}</></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Nama Anggota</p></div>
										<div class="col"><p>{{ $borrowing->nama }}</></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Status</p></div>
										<div class="col"><p>{{ $borrowing->status_anggota }}</></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Alamat</p></div>
										<div class="col"><p>{{ $borrowing->alamat }}</></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Nomor HP</p></div>
										<div class="col"><p>{{ $borrowing->nomor_hp }}</></div>
									</div>

									<hr>

									<h2>Info Buku</h2>
									<div class="row">
										<div class="col-4"><p>ID Buku</p></div>
										<div class="col"><p>#{{ $borrowing->id_buku }}</></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Judul Buku</p></div>
										<div class="col"><p>{{ $borrowing->judul_buku }}</></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Penulis</p></div>
										<div class="col"><p>{{ $borrowing->penulis }}</></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Penerbit</p></div>
										<div class="col"><p>{{ $borrowing->penerbit }}</></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Kategori</p></div>
										<div class="col"><p>{{ $borrowing->kategori }}</></div>
									</div>

									<a href="/home/borrowings" class="btn btn-sm btn-secondary" > Kembali </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
