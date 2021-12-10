<?php include "./templates/top.php"; ?>

<?php include "./templates/admin_navbar.php"; ?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>



	<div class="container">
		<div class="row justify-content-center" style="margin:100px 0;">
			<div class="col-md-4">
				<h4>Admin Login</h4>
				<p class="message"></p>
				<form  action="logincheck.php" method="POST">
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" name="email"  placeholder="Enter email" required>
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password"  placeholder="Password" required>
					</div>
					<button type="submit" class="btn btn-primary login-btn">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>

