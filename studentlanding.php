<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap-theme.min.css">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        
		<title>Student Landing</title>
	</head>

	<body style="background-color:#E5DBC1">
		<div class="jumbotron" style="text-align:center; background-color:#E5DBC1">
		    <h2>Hello, <?php print $user ?>!</h2>
		    <p>What would you like to do?</p>
		    <div class="btn-group-vertical btn-group-lg">
		        <a class="btn btn-default" href="/studentTemplate.php?page=theme"><span class="glyphicon glyphicon-play"></span> Play</a>
		        <a class="btn btn-default" href="/studentTemplate.php?page=avatar"><span class="glyphicon glyphicon-user"></span> View my Avatar</a>
		        <a class="btn btn-default" href="/studentTemplate.php?page=store"><span class="glyphicon glyphicon-shopping-cart"></span> Visit the Store</a>
		    </div>
		</div>
	</body>

</html>