<?php
    $cur_page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'teacher';
    $nav = json_decode(file_get_contents("site_contents.json"), true);
    $pageheader = $cur_page;
    $pagetitle = 'Teacher Page';
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
        <div class="panel panel-default">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="teacherTabs">
                <li class="active"><a href="#students" data-toggle="tab">Students</a></li>
                <li><a href="#classStats" data-toggle="tab">Class Statistics</a></li>
                <li><a href="#pastClasses" data-toggle="tab">Past Classes</a></li>
                <li><a href="#configure" data-toggle="tab">Configure</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="students"><?php include "students.php"; ?></div>
                <div class="tab-pane" id="classStats"><?php include "class.php"; ?></div>
                <div class="tab-pane" id="pastClasses"><?php include "pastclass.php"; ?></div>
                <div class="tab-pane" id="configure"><?php include "configure.php"; ?></div>
            </div>
        </div>
<!--            <nav>
				<ul id="nav">
					<?php /*foreach ($nav['teacher'] as $pageid => $title) { */?>
						<li <?/*= $cur_page == $pageid ? 'class="active"' : ''; */?>>
							<a href="<?/*= $BASE_URL */?>?page=<?/*= $pageid */?>"><?/*= $title */?></a>
						</li>
					<?php /*} */?>
				</ul>
			</nav>

        --><?php
/*            global $cur_page;
            $key = array_search($pageheader, $nav);
            include "$cur_page.php";
        */?>
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
        $('#teacherTabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
    </script>

</body>

</html>