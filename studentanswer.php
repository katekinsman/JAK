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

	$studentanswer = $_POST['answers'];
	$db->query("CALL capstonemysql.new_selection('$user', '$studentanswer')");

	$correct = "SELECT Correct FROM `vw_fullassessment` WHERE AnswerValue = '$studentanswer'";
	$correctresult = $db->query($correct);
	$result = $correctresult->fetch(PDO::FETCH_BOTH);

    // Query for obstacle information

    // need an outer loop

    $count = 1;
    $obstaclequery = "SELECT Message, MapImage FROM `vw_fulljourney`
        WHERE `Theme` = '$theme' AND `Stage` = $count";
    
    foreach ($db->query($obstaclequery) as $result2) {
        if($result[0] == 1) {
            echo "You were right! Your next task is: ";
            echo $result2['Message']; 
            echo "<br>"; ?>
            <img src="<?= $result2['MapImage'] ?>" height="40%" width="40%"/><?php
        } else {
            echo "Oh no! Try answering again.";?>
            <img src="<?= $result2['MapImage'] ?>" height="40%" width="40%"/><?php
        } 
        $count++;
    }
  
?>