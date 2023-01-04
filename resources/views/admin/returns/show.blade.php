@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3">
								<div class="card-header">Detail Pengembalian</div>
                <div class="card-body">
									<h2>Info Transaksi</h2>
									<div class="row">
										<div class="col-4"><p>ID Transaksi</p></div>
										<div class="col"><p>#{{ $return->id_peminjaman }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Tanggal Pinjam</p></div>
										<div class="col"><p>{{ $return->tanggal_pinjam }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Tanggal Kembali</p></div>
										<div class="col"><p>{{ $return->tanggal_kembali }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Tanggal Dikembalikan</p></div>
										<div class="col"><p>{{ $return->tanggal_dikembalikan }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Durasi Peminjaman</p></div>
										<div class="col"><p>{{ $return->durasi_peminjaman }} Hari</p> </div>
									</div>
									
									<hr>

									<h2>Info Peminjam</h2>
									<div class="row">
										<div class="col-4"><p>ID Peminjam</p></div>
										<div class="col"><p>#{{ $return->id_anggota }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Nama Anggota</p></div>
										<div class="col"><p>{{ $return->nama }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Status</p></div>
										<div class="col"><p>{{ $return->status_anggota }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Alamat</p></div>
										<div class="col"><p>{{ $return->alamat }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Nomor HP</p></div>
										<div class="col"><p>{{ $return->nomor_hp }}<p/></div>
									</div>

									<hr>

									<h2>Info Buku</h2>
									<div class="row">
										<div class="col-4"><p>ID Buku</p></div>
										<div class="col"><p>#{{ $return->id_buku }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Judul Buku</p></div>
										<div class="col"><p>{{ $return->judul_buku }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Penulis</p></div>
										<div class="col"><p>{{ $return->penulis }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Penerbit</p></div>
										<div class="col"><p>{{ $return->penerbit }}<p/></div>
									</div>
									<div class="row">
										<div class="col-4"><p>Kategori</p></div>
										<div class="col"><p>{{ $return->kategori }}<p/></div>
									</div>

									<a href="/home/returns" class="btn btn-sm btn-secondary" > Kembali </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
