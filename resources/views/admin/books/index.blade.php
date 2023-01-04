@extends('layouts.adminapp')

@section('content')
	@section('content_header')
	<h1 class="ml-2">Kelola Buku</h1>
	@endsection

	<div class="container">
			<div class="row justify-content-center">
					<div class="col">
							<div class="card">
									<div class="card-body">
											<div class="row">
												<a href="/home/books/add" class="btn btn-sm btn-primary mb-3 ml-3"><i class="fas fa-plus"></i> Tambah Buku</a>
												<a href="/home/books/print_books" class="btn btn-sm btn-outline-danger mb-3 mr-3 ml-auto"><i class="fas fa-file-pdf"></i></i> Cetak PDF</a>
											</div>

											<table class="table table-striped table-bordered" id="bookTable">
												<thead>
													<tr>
														<th scope="col">No</th>
														<th scope="col">Cover</th>
														<th scope="col">Judul Buku</th>
														<th scope="col">Penulis</th>
														<th scope="col">Penerbit</th>
														<th scope="col">Stok</th>
														<th scope="col">Kategori</th>
														<th scope="col">Aksi</th>
													</tr>
												</thead>
												<tbody>
													@foreach($books as $index => $book)
														<tr>
																<td> {{ $index + 1 }}</td>
																<td> <img width="30px" src="{{ url('/data_file/'.$book->gambar_buku) }}" alt=""> </a> </td>
																<td> {{ $book->judul_buku }} </a> </td>
																<td> {{ $book->penulis }} </td>
																<td> {{ $book->penerbit }} </td>
																<td> {{ $book->stok_buku }}</td>
																<td>
																	@if ($book->kategori)
																		{{ $book->kategori }}
																	@else
																		-
																	@endif
																</td>
																<td>
																	<div class="row">
																		<div class="col-6"><a class="btn btn-sm btn-outline-primary" href="{{ url("/home/book/show", $book->id_buku) }}" title="Detail"> <i class="fas fa-eye"></i> </a></div>
																		<div class="col-6"><a class="btn btn-sm btn-outline-dark" href="{{ url("/home/book/edit", $book->id_buku) }}" title="Edit"> <i class="fas fa-edit"></i> </a></div>
																		<!-- <div class="col-3">
																			<form method="POST" action="/home/book/{{$book->id_buku}}">
																				{{ method_field('DELETE') }}
																				{{ csrf_field() }}

																				<button onclick="return confirm('Hapus buku?')" type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="fas fa-trash"></i></button>
																			</form>
																		</div> -->
																	</div>
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
			$('#bookTable').DataTable();
		});
	</script>
@endsection
