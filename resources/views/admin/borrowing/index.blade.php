@extends('layouts.adminapp')

@section('content')
	@section('content_header')
	<h1 class="ml-2">Transaksi Peminjaman</h1>
	@endsection

	<div class="container">
			<div class="row justify-content-center">
					<div class="col">
							<div class="card">
									<div class="card-body">
											<div class="row">
												<a href="/home/borrowings/add" class="btn btn-sm btn-primary mb-3 ml-3"><i class="fas fa-plus"></i> Tambah Peminjaman</a>
												<a href="/home/borrowings/print_borrowings" class="btn btn-sm btn-outline-danger mb-3 mr-3 ml-auto"><i class="fas fa-file-pdf"></i></i> Cetak PDF</a>
											</div>

											<table class="table table-striped table-bordered" id="memberTable">
												<thead>
													<tr>
														<th scope="col">No</th>
														<th scope="col">Nama Anggota</th>
														<th scope="col">Judul Buku</th>
														<th scope="col">Tanggal Pinjam</th>
														<th scope="col">Tanggal Kembali</th>
														<th scope="col">Status Peminjaman</th>
														<th scope="col">Aksi</th>
													</tr>
												</thead>
												<tbody>
													@foreach($borrowings as $index => $borrowing)
														<tr>
																<td> {{ $index + 1 }}</td>
																<td> {{ $borrowing->nama }} </a> </td>
																<td> {{ $borrowing->judul_buku }} </td>
																<td> {{ $borrowing->tanggal_pinjam }} </td>
																<td> {{ $borrowing->tanggal_kembali }}</td>
																<td>

																	@if ($borrowing->status_peminjaman == 1 && date('Y-m-d') > date('Y-m-d', strtotime($borrowing->tanggal_kembali)))
																		<span class="badge badge-danger">
																			Terlambat
																		</span>
																	@elseif ($borrowing->status_peminjaman == 0)
																		<span class="badge badge-success">Dikembalikan</span>
																	@elseif ($borrowing->status_peminjaman == 1)
																		<span class="badge badge-warning">Dipinjam</span>
																	@endif

																</td>
																<td style="width: 15%;">
																	<div class="row">
																		<div class="col-3"><a class="btn btn-sm btn-outline-primary" href="{{ url("/home/borrowing/show", $borrowing->id_peminjaman) }}" title="Detail Peminjaman"><i class="fas fa-eye"></i></a></div>

																		@if ($borrowing->status_peminjaman == 1)
																		<div class="col-3"><a class="btn btn-sm btn-outline-dark" href="{{ url("/home/borrowing/edit", $borrowing->id_peminjaman) }}" title="Perpanjang"> <i class="fas fa-stopwatch"></i> </a></div>
																		<div class="col-3">
																			<form method="POST" action="/home/borrowing/return/{{$borrowing->id_peminjaman}}">
																				{{ method_field('PUT') }}
																				{{ csrf_field() }}

																				<input name="id_anggota" type="number" value="{{ $borrowing->id_anggota }}" hidden>
																				<input name="id_buku" type="number" value="{{ $borrowing->id_buku }}" hidden>
																				<input name="tanggal_pinjam" type="date" value="{{ $borrowing->tanggal_pinjam }}"  hidden>
																				<input name="tanggal_kembali" type="date" value="{{ $borrowing->tanggal_kembali }}" hidden>
																				<input name="status_peminjaman" type="number" value="0" hidden>

																				<button onclick="return confirm('Buku dikembalikan?')" type="submit" class="btn btn-sm btn-outline-success" title="Kembalikan Buku"><i class="fas fa-undo-alt"></i></button>
																			</form>
																		</div>
																		@endif
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
			$('#memberTable').DataTable();
		});
	</script>
@endsection
