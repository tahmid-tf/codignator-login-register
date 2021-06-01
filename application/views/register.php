<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register Page</title>

	<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">


	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<h1>Register Page :</h1>
<p>Please use register</p>
<?php if (isset($_SESSION['success'])) { ?>
	<div class="alert alert-success">
		<?php echo $_SESSION['success']; ?>
	</div>
<?php
} ?>
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<div class="col-lg-5 col-lg-offset-2">
	<form action="" method="POST">

		<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" class="form-control" name="username" id="username">
		</div>

		<div class="form-group">
			<label for="email">Email:</label>
			<input type="text" class="form-control" name="email" id="email">
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" name="password" id="password">
		</div>

		<div class="form-group">
			<label for="username">Confirm Password:</label>
			<input type="password" class="form-control" name="password2" id="password">
		</div>

		<div class="form-group">
			<label for="gender">Gender:</label>
			<select name="gender" id="gender" class="form-control">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
		</div>

		<div class="form-group">
			<label for="phone">Phone:</label>
			<input type="text" class="form-control" name="phone" id="phone">
		</div>

		<div>
			<button class="btn btn-primary" name="register">Register</button>
		</div>
	</form>

</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php base_url(); ?>assets/js/bootstrap.js"></script>
</body>
</html>
