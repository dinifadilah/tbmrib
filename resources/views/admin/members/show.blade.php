@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3">
								<div class="card-header">Detail Anggota</div>
                <div class="card-body">
									<p>ID Anggota <br><b>#{{ $member->id_anggota }}</b></p>
									<p>Nama <br><b>{{ $member->nama }}</b></p>
									<p>Status Anggota<br><b>{{ $member->status_anggota }}</b></p>
									<p>Alamat <br><b>{{ $member->alamat }}</b></p>
									<p>Nomor HP <br><b>{{ $member->nomor_hp }}</b></p>

									<a href="/home/members" class="btn btn-sm btn-secondary" > Kembali </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
