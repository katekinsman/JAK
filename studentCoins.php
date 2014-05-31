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

    $theme = $_REQUEST["theme"];

	$coinsquery = ("SELECT `StorySum` FROM `vw_totalstorycoins`
		WHERE `StudentName` = '$user'
		AND `Theme` = '$theme'");
	$result = $db->query($coinsquery);
	$coins = $result->fetch(PDO::FETCH_BOTH);

	echo "You found $coins[0] coins! ";

    if ($coins[0] > 13) {
        echo "You were outstanding!";
    } else {
        echo "Keep working!";
    }
?>