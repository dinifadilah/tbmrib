@extends('layouts.adminapp')

@section('content')
	@section('content_header')
	<h1 class="ml-2">Transaksi Pengembalian</h1>
	@endsection

	<div class="container">
			<div class="row justify-content-center">
					<div class="col">
							<div class="card">
									<div class="card-body">
											<div class="row">
												<a href="/home/returns/print_returns" class="btn btn-sm btn-outline-danger mb-3 mr-3 ml-auto"><i class="fas fa-file-pdf"></i></i> Cetak PDF</a>
											</div>
											
											<table class="table table-striped table-bordered" id="memberTable">
												<thead>
													<tr>
														<th scope="col">No</th>
														<th scope="col">Nama Anggota</th>
														<th scope="col">Judul Buku</th>
														<th scope="col">Tanggal Pinjam</th>
														<th scope="col">Tanggal Dikembalikan</th>
														<th scope="col">Lama Peminjaman</th>
														<th scope="col">Aksi</th>
													</tr>
												</thead>
												<tbody>
													@foreach($returns as $index => $return)
														<tr>
																<td> {{ $index + 1 }}</td>
																<td> {{ $return->nama }} </a> </td>
																<td> {{ $return->judul_buku }} </td>
																<td> {{ $return->tanggal_pinjam }} </td>
																<td> {{ $return->tanggal_dikembalikan }}</td>
																<td> {{ $return->durasi_peminjaman }} Hari</td>
																<td>
																	<div class="col-3"><a class="btn btn-sm btn-outline-primary" href="{{ url("/home/return/show", $return->id_peminjaman) }}" title="Detail Peminjaman"><i class="fas fa-eye"></i></a></div>
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
