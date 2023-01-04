<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
	<style>
		.heading {
			text-align: center;
		}

		.date {
			text-align: right;
			margin-right: 4px;
		}

		#borrowingsTablePrint {
		width: 100%;
    color: #232323;
    border-collapse: collapse;
		}
		
		#borrowingsTablePrint, th, td {
				border: 1px solid #999;
				padding: 2px 4px;
		}

	</style>
</head>
<body>

	<h3 class="heading">DAFTAR PEMINJAMAN BUKU <br>PERPUSTAKAAN DAERAH KENDARI</h3>
	
	<p class="date">Tanggal {{ $dateNow }} </p>
	<table id="borrowingsTablePrint">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama Anggota</th>
					<th scope="col">Nomor HP</th>
					<th scope="col">Judul Buku</th>
					<th scope="col">Tanggal Pinjam</th>
					<th scope="col">Tanggal Kembali</th>
					<th scope="col">Status Peminjaman</th>
				</tr>
			</thead>
			<tbody>
				@foreach($borrowings as $index => $borrowing)
					<tr>
							<td> {{ $index + 1 }}</td>
							<td> {{ $borrowing->nama }} </a> </td>
							<td> {{ $borrowing->nomor_hp }} </a> </td>
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
					</tr>
				@endforeach
			</tbody>
		</table>
</body>
</html>