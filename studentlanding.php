<?php

    // MySQl Connection

    $username = 'b23933fcb8ccea';
    $password = '8471ac64';
    $hostname = 'us-cdbr-azure-east-a.cloudapp.net:3306'; 
    $database = 'capstonemysql';

    $db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);

    $name = $_POST["name"];
    $insert = "INSERT INTO `Student` (`StudentName`) VALUES ('$name')";
    $db->query($insert);
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

    <body style="background-color:#eee;">
    	<div class="jumbotron" style="text-align:center;">
            <h2>Hello, <?php print $name ?>!</h2>
    		<p>What would you like to do?</p>
			<div class="btn-group-vertical btn-group-lg">
				<a class="btn btn-default" href="/studenttemplate.php?page=theme"><span class="glyphicon glyphicon-play"></span> Play</a>
			  	<a class="btn btn-default" href="/studenttemplate.php?page=avatar"><span class="glyphicon glyphicon-user"></span> View my Avatar</a>
			 	<a class="btn btn-default" href="/studenttemplate.php?page=store"><span class="glyphicon glyphicon-shopping-cart"></span> Visit the Store</a>
			</div>
		</div>
	</body>

</html>