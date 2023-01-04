@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3">
								<div class="card-header">Tambah Buku</div>
                <div class="card-body">
									<form method="post" action="{{ url("/home/member", $member->id_anggota ) }}">
										{{ method_field('PUT') }}
										{{ csrf_field() }}
										<div class="form-group row">
											<label for="nama" class="col-sm-2 col-form-label">Nama</label>
											<div class="col-sm-10">
												<input name="nama" type="text" value="{{ $member->nama }}" class="form-control" id="nama" required>
											</div>
										</div>

										<div class="form-group row">
											<label for="statusAnggota" class="col-sm-2 col-form-label">Status Anggota</label>
											<div class="col-sm-10">
												<input name="status_anggota" type="text" value="{{ $member->status_anggota }}" class="form-control" id="statusAnggota" required>
											</div>
										</div>

										<div class="form-group row">
											<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
											<div class="col-sm-10">
												<input name="alamat" type="text" value="{{ $member->alamat }}" class="form-control" id="alamat" required>
											</div>
										</div>

										<div class="form-group row">
											<label for="nomorHP" class="col-sm-2 col-form-label">Nomor HP</label>
											<div class="col-sm-10">
												<input name="nomor_hp" type="text" value="{{ $member->nomor_hp }}" class="form-control" id="nomorHP" required>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button class="btn btn-sm btn-primary" type="submit"> Update </button>
												<a href="/home/members" class="btn btn-sm btn-secondary" > Batal </a>
											</div>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection