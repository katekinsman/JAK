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

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script>
            $('#storeTab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            })

            $('.carousel').carousel()
        </script>

        <!-- Rainforest theme -->
        <script type="text/javascript">
            $(document).ready(function() {
                $("#rainforest").click(function() {
                    $.ajax('selecttheme.php', {  
                        success: testMe,
                        error: ajaxError,
                        data: {action: 'rainforest'}
                    });
                });
            });

            function testMe(data) {
                alert("I work yay!");
            }
        </script>

        <!-- Castle theme
        <script type="text/javascript">
            $(document).ready(function() {
              $("#castle").click(function() {
                alert("castle");
               });
            });
        </script> -->

        <!-- Pirate theme -->

        <script type="text/javascript">
            function ajaxError(jqxhr, type, error) {
              var msg = "An Ajax error occurred!\n\n";
              if (type == 'error') {
                if (jqxhr.readyState == 0) {
                  // Request was never made - security block?
                  msg += "Looks like the browser security-blocked the request.";
                } else {
                  // Probably an HTTP error.
                  msg += 'Error code: ' + jqxhr.status + "\n" + 
                         'Error text: ' + error + "\n" + 
                         'Full content of response: \n\n' + jqxhr.responseText;
                }
              } else {
                msg += 'Error type: ' + type;
                if (error != "") {
                  msg += "\nError text: " + error;
                }
              }
              alert(msg);
            }
        </script>

    </body>

</html>
