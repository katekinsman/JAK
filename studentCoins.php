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

    // Query for coins
	$coinsquery = ("SELECT `StorySum` FROM `vw_totalstorycoins`
		WHERE `StudentName` = '$user'
		AND `Theme` = '$theme'");
	$result = $db->query($coinsquery);
	$coins = $result->fetch(PDO::FETCH_BOTH);

    // Query for obstacle information
    $obstacleQuery = "SELECT Message, MapImage FROM `vw_fulljourney`
        WHERE `Theme` = '$theme' AND `Stage` = 4";
    $obstacleResult = $db->query($obstacleQuery);
    $result2 = $obstacleResult->fetch(PDO::FETCH_BOTH);

    if ($coins[0] > 13) {
        echo "<h1>You were outstanding!</h1><br>";
        echo "<p>Good job, " . $result2['Message'] . ". You also found $coins[0] coins!</p><br>";
        echo "<img src='" . $result2['MapImage'] . "' height='40%' width='40%' style='margin: 0 auto 0 auto'/>";
    } else if ($coins[0] < 0) {
        echo "<h1>Keep working!</h1><br>";
        echo "<p>Good job, " . $result2['Message'] . ". But you lost $coins[0] coins.</p><br>";
        echo "<img src='" . $result2['MapImage'] . "' height='40%' width='40%' style='margin: 0 auto 0 auto'/>";
    } else {
        echo "<h1>Good job!</h1><br>";
        echo "<p>Well done, " . $result2['Message'] . ". You also found $coins[0] coins!</p><br>";
        echo "<img src='" . $result2['MapImage'] . "' height='40%' width='40%' style='margin: 0 auto 0 auto'/>";
    }

?>