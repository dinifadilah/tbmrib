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
		
		#returnsTablePrint {
			width: 100%;
			color: #232323;
			border-collapse: collapse;
		}
		
		#returnsTablePrint, th, td {
				border: 1px solid #999;
				padding: 2px 4px;
		}

	</style>
</head>
<body>

	<h3 class="heading">DAFTAR PENGEMBALIAN BUKU <br>TBM RUMAH INSPIRASI BUNGKUTOKO</h3>
	
	<p class="date">Tanggal {{ $dateNow }} </p>
	<table id="returnsTablePrint">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama Anggota</th>
					<th scope="col">Judul Buku</th>
					<th scope="col">Tanggal Pinjam</th>
					<th scope="col">Tanggal Dikembalikan</th>
					<th scope="col">Lama Peminjaman</th>
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
					</tr>
				@endforeach
			</tbody>
		</table>
</body>
</html>