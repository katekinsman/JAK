<?php
    // MySQl Connection

    $username = 'b23933fcb8ccea';
    $password = '8471ac64';
    $hostname = 'us-cdbr-azure-east-a.cloudapp.net:3306'; 
    $database = 'capstonemysql';

    $db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);

    session_start();
    if (!isset($_SESSION["user"])) {
      $_SESSION["user"] = $name;  // default
    } 
    $user = $_SESSION["user"];

	$studentanswer = $_POST['answers'];
	$db->query("CALL capstonemysql.new_selection('$user', '$studentanswer')");

	$correct = "SELECT Correct FROM `vw_fullassessment` WHERE AnswerValue = '$studentanswer'";
	$correctresult = $db->query($correct);
	$result = $correctresult->fetch(PDO::FETCH_BOTH);

    if($result[0] == 1) {
        echo "You were right!";
    }else {
        echo "Oh no! Try again.";
    }

?>