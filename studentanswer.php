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

    $stage = $_POST["stage"];

    $result;
    if($stage > 1){
        $studentAnswer = $_POST['answers'];
        $db->query("CALL capstonemysql.new_selection('$user', '$studentAnswer')");

        $correct = "SELECT Correct FROM `vw_fullassessment` WHERE AnswerValue = '$studentAnswer'";
        $correctResult = $db->query($correct);
        $result = $correctResult->fetch(PDO::FETCH_BOTH);
    }
    // Query for obstacle information
    $obstacleQuery = "SELECT Message, MapImage FROM `vw_fulljourney`
        WHERE `Theme` = '$theme' AND `Stage` = '$stage'";

    $obstacleResult = $db->query($obstacleQuery);
    $result2 = $obstacleResult->fetch(PDO::FETCH_BOTH);
    if($stage == 1){
        echo "<p>Oh no! There's something in the way! Answer the question correctly to " . $result2['Message']
            . ".</p><br> <img src='" . $result2['MapImage'] . "' height='40%' width='40%' style='margin: 0 auto 0 auto'/>";
    }else{
        if($result[0] == 1) {
            echo "<h1>You were right!</h1> <br> <p>Oh no! There's something in the way! Answer the question correctly to "
                . $result2['Message'] . ".</p><br> <img src='" . $result2['MapImage'] . "' height='40%' width='40%' style='margin: 0 auto 0 auto'/>";
        }else {
            echo "<p>Oh no! Try answering again.</p>";
        }
    }
  
?>