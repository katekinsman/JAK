<?php
    $cur_page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'Teacher';
    $nav = json_decode(file_get_contents("teacher_contents.json"), true);
    $user = isset($_REQUEST['user']) ? $_REQUEST['user'] : $cur_page;
    $pageheader = $cur_page;
    $pagetitle = 'Teacher Page';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />

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
					<?php foreach ($nav['teacher'] as $pageid => $title) { ?>
						<li <?= $cur_page == $pageid ? 'class="current"' : ''; ?>>
							<a href="<?= $BASE_URL ?>/<?= $pageid ?>/"><?= $title ?></a>
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