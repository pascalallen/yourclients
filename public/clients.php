<?php
	session_start();
	require_once "../Auth.php";
	if (!Auth::check()) {
		header('Location: logout.php');
	}
	require_once "../User.php";
	require_once "../Client.php";
	$user = User::find(Auth::user());
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
			    	<h1 class="display-1">Welcome back, <?= $user->name ?></h1>
			    	<div class="row navbar">
						<div class="col-3">
				    		<a class="lead underline-hover" href="#clients">clients</a>
				    	</div>
				    	<div class="col-3">
				    		<a class="lead underline-hover" href="logout.php">sign out</a>
				    	</div>
			    	</div>
		    	</div>
		    </div>
			<div class="row h-100 justify-content-center align-items-center" id="clients">
				<div class="text-center">
					<table class="table table-condensed table-responsive table-hover">
						<thead>
							<tr>
								<th  align="right">ID</th>
								<th>Name</th>
							</tr>
						</thead>
						<tbody id="clients-body">
						</tbody>
					</table>
				</div>
		    </div>
        </div>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
        <script src="js/app.js" type="text/javascript"></script>
        <script type="text/javascript">
			$.ajax({
				url: 'get-clients.php',
				method: "POST",
				dataType: 'json',
				data: {
					user_id: <?= $user->id ?>,
				},
				success: function(result){
					for (var i = 0; i < result.length; i++) {
						$("#clients-body").append("<tr><td align=\"right\">"+result[i].id+"</td><td>"+result[i].name+"</td></tr>");
					}
				}
			});
        </script>
    </body>
</html>