@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3">
								<div class="card-header">Tambah Peminjaman</div>
                <div class="card-body">
									<form method="post" action="{{ url("/home/borrowings") }}">
										{{ csrf_field() }}

										<div class="form-group row">
											<label for="id_anggota" class="col-sm-2 col-form-label">Peminjam</label>
											<div class="col-sm-10">
												<select required style="width: 100%" id="id_anggota" name="id_anggota" required>
													<option></option>
													@foreach ($members as $member)
														<option value="{{ $member->id_anggota }}">ID#{{$member->id_anggota}} - {{ $member->nama }}</option>
													@endforeach
												</select>
											</div> 
										</div>

										<div class="form-group row">
											<label for="id_buku" class="col-sm-2 col-form-label">Buku</label>
											<div class="col-sm-10">
												<select required id="id_buku" style="width: 100%" id="id_buku" name="id_buku" required>
													<option></option>
													@foreach ($books as $book)
														<option value="{{ $book->id_buku }}">ID#{{$book->id_buku}} - {{ $book->judul_buku }}</option>
													@endforeach
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label for="tanggalPinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
											<div class="col-sm-10">
												<input required name="tanggal_pinjam" type="date" value="{{ $dateNow }}" min="{{ $dateNow }}" class="form-control" id="tanggalPinjam" required>
											</div>
										</div>

										<div class="form-group row">
											<label for="tanggalKembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
											<div class="col-sm-10">
												<input required name="tanggal_kembali" type="date" value="{{ $dateNextToSeventDay }}" min="{{ $dateNow }}" max="{{ $dateNextToSeventDay }}" class="form-control" id="tanggalKembali" required>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button class="btn btn-sm btn-primary" type="submit"> Tambah </button>
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

@section('scripts')
	<script>
		$(document).ready(function(){
			$('#id_anggota').select2({
				width: 'resolve',
				theme: "classic",
				placeholder: 'Pilih Peminjam'
			});

			$('#id_buku').select2({
				width: 'resolve',
				theme: "classic",
				placeholder: 'Pilih Buku'
			});
		});
	</script>
@endsection
