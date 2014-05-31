<?php

    $cur_page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'student';
    $nav = json_decode(file_get_contents("site_contents.json"), true);
    $pageheader = $cur_page;
    $pagetitle = 'Student Page';

    // MySQl Connection

    $username = 'b23933fcb8ccea';
    $password = '8471ac64';
    $hostname = 'us-cdbr-azure-east-a.cloudapp.net:3306'; 
    $database = 'capstonemysql';

    $db = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);

    $theme = '';

    session_start();
    if (!isset($_SESSION["user"])) {
      $_SESSION["user"] = $name;  // default
    } 
    $user = $_SESSION["user"];
 
    $coinsquery = ("SELECT sum(`StorySum`) FROM `vw_totalstorycoins`
    WHERE `StudentName` = '$user'");
    $result = $db->query($coinsquery);
    $coins = $result->fetch(PDO::FETCH_BOTH);

    if ($coins[0] == null) {
        $coins[0] = 0;
    }

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

        <!-- Our CSS -->
        <link href="capstone.css" rel="stylesheet" type="text/css">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>

        <title><?= $pagetitle ?></title>
    </head>

    <body>            
        <div id="content">
            <!-- Begin contents of the page, to be loaded dynamically -->
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                    <p class="navbar-brand">SmartAdventure</p>
                    <ul class="nav navbar-nav" id="nav">
                        <?php foreach ($nav['student'] as $pageid => $title) { ?>
                            <li <?= $cur_page == $pageid ? 'class="current"' : ''; ?>>
                                <a href="studentTemplate.php?page=<?= $pageid ?>"><?= $title ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><p class="navbar-text">Coins: <span class="badge"><?php print $coins[0]; ?></span></p></li>
                        <li><a href="/endSession.php">Logout <?php print $user?></a></li>
                    </ul>
                 </div>
                </nav>

            <?php
                global $cur_page;
                $key = array_search($pageheader, $nav);
                include "$cur_page.php";
            ?>
            <!-- End dynamic content -->
        </div>
        <div id="push"></div>
        <div id="footer">
            <footer><p>JAK Capstone</p></footer>
        </div>

        <script type="text/javascript">
            $('#storeTab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            })

            $('.carousel').carousel();
        </script>

    </body>

</html>
