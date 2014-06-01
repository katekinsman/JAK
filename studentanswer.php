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
    //$count = 1;
    /*$obstaclequery = "SELECT Message, MapImage, Stage FROM `vw_fulljourney`
        WHERE `Theme` = '$theme' AND `Stage` = $count";
    $obstacleresult = $db->query($obstaclequery);
    $result2 = $obstacleresult->fetch(PDO::FETCH_BOTH);*/

    if($result[0] == 1) { // and count == 1
        echo "You were right!Test"; //doesn't work unless ONLY "You were right!"
        //echo $theme;
        //echo<img src="<?php $result2['MapImage']"> etc., replace 'MapImage' with 'Message' and 'Stage'
    } // have more conditions to include an image for each stage, both for if you were right and if you were wrong
        else { // you were wrong
        echo "Oh no! Try again.";
    } 

    //$count = $count + 1;

?>