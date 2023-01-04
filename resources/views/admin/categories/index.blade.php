@extends('layouts.adminapp')

@section('content')
	@section('content_header')
	<h1 class="ml-2">Kelola Kategori Buku</h1>
	@endsection

	<div class="container">
			<div class="row justify-content-center">
					<div class="col">
							<div class="card">
									<div class="card-body">
											<a href="/home/categories/add" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Kategori</a>

											<table class="table table-striped table-bordered" id="categoryTable">
												<thead>
													<tr>
														<th scope="col">No</th>
														<th scope="col">Nama Kategori</th>
														<th scope="col">Aksi</th>
													</tr>
												</thead>
												<tbody>
													@foreach($categories as $index => $category)
														<tr>
																<td> {{ $index + 1 }}</td>
																<td> {{ $category->kategori }} </td>
																<td>
																		<form method="POST" action="/home/categories/{{$category->id_kategori}}">
																				{{ method_field('DELETE') }}
																				{{ csrf_field() }}

																				<button onclick="return confirm('Hapus kategori?')" type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="fas fa-trash"></i></button>
																		</form>
																</td>
														</tr>
													@endforeach
												</tbody>
											</table>
									</div>
							</div>
					</div>
			</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(document).ready( function () {
			$('#categoryTable').DataTable();
		});
	</script>
@endsection
