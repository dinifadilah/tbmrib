@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3">
								<div class="card-header">Perpanjang Peminjaman</div>
                <div class="card-body">
									<form method="post" action="{{ url("/home/borrowing", $borrowing->id_peminjaman) }}">
									{{ method_field('PUT') }}	
									{{ csrf_field() }}
										<div class="form-group row">
											<label for="idAnggota" class="col-sm-2 col-form-label">Peminjam</label>
											<div class="col-sm-10">
												<select required class="form-control" id="idAnggota" name="id_anggota" readonly>
													 <option value="{{ $borrowing->id_anggota }}">{{$borrowing->id_anggota}} - {{ $borrowing->nama }}</option>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label for="id_buku" class="col-sm-2 col-form-label">Buku</label>
											<div class="col-sm-10">
												<select required class="form-control" id="idAnggota" name="id_buku" readonly>
														<option value="{{ $borrowing->id_buku }}">{{$borrowing->id_buku}} - {{ $borrowing->judul_buku }}</option>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label for="tanggalPinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
											<div class="col-sm-10">
												<input required name="tanggal_pinjam" type="date" value="{{ $borrowing->tanggal_pinjam }}" min="{{ $dateNow }}" class="form-control" id="tanggalPinjam" readonly>
											</div>
										</div>

										<div class="form-group row">
											<label for="tanggalKembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
											<div class="col-sm-10">
												<input required name="tanggal_kembali" type="date" value="{{ $dateNextToSeventDay }}" min="{{ $dateNow }}" max="{{ $dateNextToSeventDay }}" class="form-control" id="tanggalKembali">
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button class="btn btn-sm btn-primary" type="submit"> Update </button>
												<a href="/home/borrowings" class="btn btn-sm btn-secondary" > Batal </a>
											</div>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
