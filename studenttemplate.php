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

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <!-- Javascript file for slider -->
        <script src="slider.js" type="javascript"></script>

        <title><?= $pagetitle ?></title>
    </head>

    <body>            
        <div id="content">

            <!-- Begin contents of the page, to be loaded dynamically -->
                <nav class="navbar navbar-default" role="navigation">
                    <a class="navbar-brand" href="http://jakcapstone.azurewebsites.net/">SmartAdventure</a>
                    <ul class="nav navbar-nav" id="nav">
                        <?php foreach ($nav['student'] as $pageid => $title) { ?>
                            <li <?= $cur_page == $pageid ? 'class="current"' : ''; ?>>
                                <a href="studenttemplate.php?page=<?= $pageid ?>"><?= $title ?></a>
                            </li>
                        <?php } ?>
                    </ul>
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
