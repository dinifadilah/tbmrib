@extends('layouts.adminapp')

@section('content')
<div class="container">
		@if(count($errors) > 0)
			<div class="alert alert-danger mt-3">
				@foreach ($errors->all() as $error)
				{{ $error }} <br/>
				@endforeach
			</div>
		@endif

    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3">
								<div class="card-header">Edit Buku</div>
                <div class="card-body">
									<form method="post" action="{{ url("/home/book", $book->id_buku ) }}" enctype="multipart/form-data">
										{{ method_field('PUT') }}
										{{ csrf_field() }}
										<div class="form-group row">
											<label for="id_buku" class="col-sm-2 col-form-label">ID Buku</label>
											<div class="col-sm-10">
												<input name="id_buku" type="text" value="{{ $book->id_buku }}" class="form-control" id="id_buku" disabled>
											</div>
										</div>

										<div class="form-group row">
											<label for="file" class="col-sm-2 col-form-label">Gambar Buku <small>(Optional)</small></label>
											<div class="col-sm-10">
												<input name="file" type="file" id="file">
												<p>Gambar saat ini: {{ $book->gambar_buku }}</p>
											</div>
										</div>

										<div class="form-group row">
											<label for="judulBuku" class="col-sm-2 col-form-label">Judul Buku</label>
											<div class="col-sm-10">
												<input name="judul_buku" type="text" value="{{ $book->judul_buku }}" class="form-control" id="judulBuku" required>
											</div>
										</div>

										<div class="form-group row">
											<label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
											<div class="col-sm-10">
												<input name="penulis" type="text" value="{{ $book->penulis }}" class="form-control" id="penulis" required>
											</div>
										</div>

										<div class="form-group row">
											<label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
											<div class="col-sm-10">
												<input name="penerbit" type="text" value="{{ $book->penerbit }}" class="form-control" id="penerbit" required>
											</div>
										</div>

										<div class="form-group row">
											<label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
											<div class="col-sm-10">
												<input name="tahun_terbit" type="text" value="{{ $book->tahun_terbit }}" class="form-control" id="tahun_terbit" required>
											</div>
										</div>

										<div class="form-group row">
											<label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
											<div class="col-sm-10">
												<input name="tanggal_masuk" type="text" value="{{ $book->tanggal_masuk }}" class="form-control" id="penerbit" required>
											</div>
										</div>

										<div class="form-group row">
											<label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
											<div class="col-sm-10">
												<input name="isbn" type="text" value="{{ $book->isbn }}" class="form-control" id="penerbit" required>
											</div>
										</div>

										<div class="form-group row">
											<label for="id_kategori" class="col-sm-2 col-form-label">Kategori</label>
											<div class="col-sm-10">
												<select name="id_kategori" style="width: 100%" id="id_kategori">
												@if ($book->kategori)
													<option value="{{ $book->id_kategori }}"> {{ $book->kategori }}</option>
												@else
													<option selected disabled>Pilih Kategori</option>
												@endif
													@foreach ($category as $kategori)
														<option value="{{ $kategori->id_kategori }}"> {{ $kategori->kategori }}</option>
													@endforeach
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label for="stok_buku" class="col-sm-2 col-form-label">Stok Buku</label>
											<div class="col-sm-10">
												<input name="stok_buku" type="number" value="{{ $book->stok_buku }}" min="0" class="form-control" id="stok_buku" required>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button class="btn btn-sm btn-primary" type="submit"> Update </button>
												<a href="/home/books" class="btn btn-sm btn-secondary" > Batal </a>
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
			$('#tahun_terbit').datepicker({
				format: 'yy',
        changeYear: true,
				maxDate: "0Y",
        minDate: "-100Y",
        yearRange: "-100:+0",
        showButtonPanel: true,

				onClose: function(dateText, inst) {
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('yy', new Date(year, 1, 1)));
        }
			});

			$("#tahun_terbit").focus(function () {
        $(".ui-datepicker-calendar").hide();
				$(".ui-datepicker-prev").hide();
				$(".ui-datepicker-next").hide();
				$(".ui-datepicker-month").hide();
        $("#ui-datepicker-div").position({
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
   		});

			$('#id_kategori').select2({
				width: 'resolve',
				theme: "classic",
				placeholder: 'Pilih Kategori'
			});
		});
	</script>
@endsection