<!DOCTYPE html>
<html>
<head>
	<title>laporan peminjaman kominfo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
		<h6></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>ID peminjaman</th>
				<th>Nama user</th>
				<th>Nama asset</th>
				<th>Tanggal pinjam</th>
				<th>Tanggal pengembalian</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($transaksiAsset as $item)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$item->id}}</td>
				<td>{{$user->nama}}</td>
				<td>{{$item->nama}}</td>
				<td>{{$transaksi->tanggal_pinjam}}</td>
				<td>{{$transaksi->tanggal_pengembalian}}</td>
			</tr>
			@endforeach
            @foreach($transaksiKomponen as $item)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$item->id}}</td>
				<td>{{$user->nama}}</td>
				<td>{{$item->nama}}</td>
				<td>{{$transaksi->tanggal_pinjam}}</td>
				<td>{{$transaksi->tanggal_pengembalian}}</td>
			</tr>
			@endforeach
            @foreach($transaksiSoftware as $item)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$item->id}}</td>
				<td>{{$user->nama}}</td>
				<td>{{$item->nama}}</td>
				<td>{{$transaksi->tanggal_pinjam}}</td>
				<td>{{$transaksi->tanggal_pengembalian}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>