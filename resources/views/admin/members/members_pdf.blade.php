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
		
		#memberTablePrint {
			width: 100%;
			color: #232323;
			border-collapse: collapse;
		}
		
		#memberTablePrint, th, td {
				border: 1px solid #999;
				padding: 2px 4px;
		}

	</style>
</head>
<body>

	<h3 class="heading">DAFTAR ANGGOTA <br>PERPUSTAKAAN DAERAH KENDARI</h3>
	
	<p class="date">Tanggal {{ $dateNow }} </p>
	<table id="memberTablePrint">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama</th>
				<th scope="col">Status Anggota</th>
				<th scope="col">Alamat</th>
				<th scope="col">Nomor HP</th>
			</tr>
		</thead>
		<tbody>
			@foreach($members as $index => $member)
				<tr>
						<td> {{ $index + 1 }}</td>
						<td> {{ $member->nama }} </a> </td>
						<td> {{ $member->status_anggota }} </td>
						<td> {{ $member->alamat }} </td>
						<td> {{ $member->nomor_hp }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>