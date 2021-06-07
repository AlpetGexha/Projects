<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="my-login-page">
		<div class="container mt-5 h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Regjistrohuni</h4>
							<form method="POST" class="my-login-validation" action="server.php">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									
									<label for="name">Emri</label>
									<input id="emri" type="text" class="form-control" placeholder="Emri" name="emri" value="" required autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin');" oninput="this.setCustomValidity('');">
								</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<div class="row"></div>
									<label for="name">Mbiemri</label>
									<input id="" type="text" class="form-control" placeholder="Mbimri" name="mbiemri" value="" required autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin');" oninput="this.setCustomValidity('');">
								</div>
								</div>
								</div>
								<div class="form-group">
									<label for="username">Username</label>
									<input id="username" type="text" class="form-control" placeholder="Username" name="username" value="" required autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani emailin');" oninput="this.setCustomValidity('');">
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input id="email" type="email" class="form-control" placeholder="Email" name="email" value="" required autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani emailin');" oninput="this.setCustomValidity('');">
								</div>
								<div class="form-group">
									<label for="password">Password
									<input id="password" type="password" placeholder="Password" class="form-control" name="password" required data-eye oninvalid="this.setCustomValidity('Ju lutem shkruani passwordin');" oninput="this.setCustomValidity('');">
								</div>
								<div class="form-group m-0">
									<button type="submit" name="register_submit" class="btn btn-primary btn-block">
										Regjistrohuni
									</button>
								</div>
								<div class="mt-4 text-center">
								 <a href="login.php">Login</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
