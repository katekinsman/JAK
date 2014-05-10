<?php
    $cur_page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'Student';
    $nav = json_decode(file_get_contents("student_contents.json"), true);
    $pageheader = $cur_page;
    $pagetitle = 'Student Page';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="responsiveslides.min.js"></script>

    <link href="capstone.css" rel="stylesheet" type="text/css">

    <title><?= $pagetitle ?></title>

</head>
<body>
    <div id="content">
        <?= $headeritem ?>
        <!-- Begin contents of the page, to be loaded dynamically -->
			<nav>
				<ul id="nav">
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
</body>

</html>