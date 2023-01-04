@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3">
								<div class="card-header">Tambah Kategori</div>
                <div class="card-body">
									<form method="post" action="{{ url("/home/categories") }}" enctype="multipart/form-data">
										{{ csrf_field() }}
										<div class="form-group row">
											<label for="kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
											<div class="col-sm-10">
												<input name="kategori" type="text" class="form-control" id="kategori" required>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2"></div>
											<div class="col-sm-10">
												<button class="btn btn-sm btn-primary" type="submit"> Tambah </button>
												<a href="/home/categories" class="btn btn-sm btn-secondary" > Batal </a>
											</div>
										</div>
									</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
