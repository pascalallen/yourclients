<?php
	session_start();
	require_once "../Auth.php";

	if (!empty($_POST['signupemail'])) {
		$signupname = $_POST['signupname'];
		$signupemail = $_POST['signupemail'];
		$signuppassword = $_POST['signuppassword'];
		require_once "../User.php";

		$user = new User();
		$user->name = $signupname;
		$user->email = $signupemail;
		$user->password = password_hash($signuppassword, PASSWORD_DEFAULT);
		$user->save();
		header('Location: clients.php');
	}

	if (!empty($_POST['email'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		if (Auth::attempt($email, $password)) {
			header('Location: clients.php');
		}
	}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Your Clients</title>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Cabin+Sketch|Sacramento" rel="stylesheet">
        <script src="js/fontawesome-all.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/app.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
		    <div class="row h-100 justify-content-center align-items-center">
		    	<div class="text-center">
			    	<h1 class="display-1">Your Clients</h1>
			    	<div class="row navbar">
				    	<div class="col-3">
				    		<a class="lead underline-hover" href="#products">Products</a>
				    	</div>
				    	<?php if (!Auth::check()): ?>
					    	<div class="col-3">
					    		<a class="lead underline-hover" href="#signup">sign up</a>
					    	</div>
					    	<div class="col-3">
					    		<a class="lead underline-hover" href="#signin">sign in</a>
					    	</div>
				    	<?php else: ?>
							<div class="col-3">
					    		<a class="lead underline-hover" href="clients.php">clients</a>
					    	</div>
					    	<div class="col-3">
					    		<a class="lead underline-hover" href="logout.php">sign out</a>
					    	</div>
					    <?php endif ?>
			    	</div>
		    	</div>
		    </div>
			<div class="row h-100 justify-content-center align-items-center" id="products">
		    	<div id="serene" class="col-4 mx-auto">
		    		<div class="image-container">
						<img src="img/house1.jpg" class="image rounded-circle image-fluid">
						<div class="text-container">
							<a class="lead underline-hover image-text" href="#">Serene</a>
						</div>
		    		</div>
		    	</div>
		    	<div id="peace" class="col-4 mx-auto">
		    		<div class="image-container">
						<img src="img/house2.jpeg" class="image rounded-circle image-fluid">
						<div class="text-container">
							<a class="lead underline-hover image-text" href="#">Peace</a>
						</div>
					</div>
		    	</div>
		    	<div id="luxury" class="col-4 mx-auto">
		    		<div class="image-container">
						<img src="img/house3.jpg" class="image rounded-circle image-fluid">
						<div class="text-container">
							<a class="lead underline-hover image-text" href="#">Luxury</a>
						</div>
					</div>
		    	</div>
		    </div>
		    <?php if (!Auth::check()): ?>
				<div class="row h-100 justify-content-center align-items-center" id="signup">
			    	<div class="text-center col-6">
			    		<h2>Sign Up</h2>
						<form method="POST">
							<div class="form-group">
								<label for="signupname">Name</label>
								<input type="text" class="form-control" id="signupname" name="signupname" placeholder="Enter name">
							</div>
							<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" class="form-control" id="signupemail" name="signupemail" placeholder="Enter email">
								<small class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="signuppassword" name="signuppassword" placeholder="Enter password">
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
			    	</div>
			    </div>
				<div class="row h-100 justify-content-center align-items-center" id="signin">
					<?php if (isset($_SESSION['error_msg'])): ?>
						<div class="alert alert-danger"><?= $_SESSION['error_msg'] ?></div>
					<?php endif ?>
			    	<div class="text-center col-6">
			    		<h2>Sign In</h2>
						<form method="POST">
							<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
								<small class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
			    	</div>
			    </div>
		    <?php endif ?>
        </div>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
        <script src="js/app.js" type="text/javascript"></script>
    </body>
</html>