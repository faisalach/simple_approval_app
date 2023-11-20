<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
</head>
<body>
	<h1>LOGIN</h1>
	<form action="/authenticate" method="POST">
		{{ csrf_field() }}

		<table>
			<tr>
				<td>
					<label for="email">Email</label>
				</td>
				<td>
					<input type="email" name="email" id="email">
				</td>
				<td>
					@if($errors->has('email'))
						<div class="error">{{ $errors->first('email') }}</div>
					@endif
				</td>
			</tr>
			<tr>
				<td>
					<label for="password">Password</label>
				</td>
				<td>
					<input type="password" name="password" id="password">
				</td>
				
				<td>
					@if($errors->has('password'))
						<div class="error">{{ $errors->first('password') }}</div>
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