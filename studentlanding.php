<?php

    // MySQl Connection

    $username = 'b23933fcb8ccea';
    $password = '8471ac64';
    $hostname = 'us-cdbr-azure-east-a.cloudapp.net:3306'; 
    $database = 'capstonemysql';

    $db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);

    // Insert name into DB
    $name = $_POST["name"];
    $insert = "INSERT INTO `Student` (`StudentName`) VALUES ('$name')";
    $db->query($insert);

    // Create new session for current user
    session_start();
    if (!isset($_SESSION["user"])) {
      $_SESSION["user"] = $name;  // default
    }
    $user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap-theme.min.css">
        <link href="capstone.css" rel="stylesheet" type="text/css">
        <title>Student Landing</title>
    </head>

    <body style="background-color:#E5DBC1;">
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