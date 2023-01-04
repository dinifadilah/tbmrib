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

		#bookTablePrint {
		width: 100%;
    color: #232323;
    border-collapse: collapse;
		}
		
		#bookTablePrint, th, td {
				border: 1px solid #999;
				padding: 2 4px;
		}

	</style>
</head>
<body>

	<h3 class="heading">DAFTAR BUKU <br>PERPUSTAKAAN DAERAH KENDARI</h3>
	
	<p class="date">Tanggal {{ $dateNow }} </p>
	<table id="bookTablePrint">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Judul Buku</th>
					<th scope="col">Penulis</th>
					<th scope="col">Penerbit</th>
					<th scope="col">Kategori</th>
					<th scope="col">Stok</th>
				</tr>
			</thead>
			<tbody>
				@foreach($books as $index => $book)
					<tr>
							<td> {{ $index + 1 }}</td>
							<td> {{ $book->judul_buku }} </a> </td>
							<td> {{ $book->penulis }} </td>
							<td> {{ $book->penerbit }} </td>
							<td>
								@if ($book->kategori)
									{{ $book->kategori }}
								@else
									-
								@endif
							</td>
							<td> {{ $book->stok_buku }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
</body>
</html>