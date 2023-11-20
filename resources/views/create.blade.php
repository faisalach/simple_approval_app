<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Insert</title>
</head>
<body>
	<h1>INSERT</h1>
	<form action="/request/store" method="POST">
		{{ csrf_field() }}

		<table>
			<tr>
				<td>
					<label for="tanggal_mulai_cuti">Tanggal Mulai Cuti</label>
				</td>
				<td>
					<input type="date" name="tanggal_mulai_cuti" id="tanggal_mulai_cuti">
				</td>
				<td>
					@if($errors->has('tanggal_mulai_cuti'))
						<div class="error">{{ $errors->first('tanggal_mulai_cuti') }}</div>
					@endif
				</td>
			</tr>
			<tr>
				<td>
					<label for="tanggal_akhir_cuti">Tanggal Akhir Cuti</label>
				</td>
				<td>
					<input type="date" name="tanggal_akhir_cuti" id="tanggal_akhir_cuti">
				</td>
				
				<td>
					@if($errors->has('tanggal_akhir_cuti'))
						<div class="error">{{ $errors->first('tanggal_akhir_cuti') }}</div>
					@endif
				</td>
			</tr>
			<tr>
				<td>
					<label for="alasan">Alasan</label>
				</td>
				<td>
					<textarea name="alasan" id="alasan"></textarea>
				</td>
				
				<td>
					@if($errors->has('alasan'))
						<div class="error">{{ $errors->first('alasan') }}</div>
					@endif
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<button type="submit">Submit</button>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>