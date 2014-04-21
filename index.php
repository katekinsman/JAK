<?php
    $cur_page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'login';
    $nav = json_decode(file_get_contents("site_contents.json"), true);
    $user = isset($_REQUEST['user']) ? $_REQUEST['user'] : $cur_page;
    $pageheader = $cur_page == 'login' ? 'Welcome!' : $cur_page == 'teacher' || $cur_page == 'student' ?
    $cur_page : $nav[$user][$cur_page];
    $pagetitle =($cur_page == 'login' ? 'Login' : "JAK - $pageheader");
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
    <header>
        <div class="logocontainer"><a href="index.php" class="logo"></a></div>
        <nav>
            <?php $cur_page == 'login' ?
                foreach ($nav['navigation'] as $pageid => $title) { ?>
                <button <?= $cur_page == $pageid ? 'class="current"' : ''; ?> >
                    <a href="/index.php?page=<?= $pageid ?>"><?= $title ?></a>
                </button>
            <?php } : '' ?>

            <?php $user == 'teacher' || $user == 'student' ? ?>
                <ul>
                <?php foreach ($nav[$user] as $pageid => $title) { ?>
                    <li <?= $cur_page == $pageid ? 'class="current"' : ''; ?> >
                        <a href="/index.php?user=<?= $user ?>page=<?= $pageid ?>"><?= $title ?></a>
                    </li>
                <?php }
            : '' ?>
                </ul>
        </nav>
    </header>

    <div id="content">
        <?= $headeritem ?>
        <!-- Begin contents of the page, to be loaded dynamically -->
        <?php
            global $cur_page;
            $key = array_search($pageheader, $nav);
            include_once "$cur_page.php";
        ?>
        <!-- End dynamic content -->
    </div>
    <div id="push"></div>
    <div id="footer">
        <footer><p>JAK Capstone</p></footer>
    </div>
</body>

</html>