<?php
    $cur_page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'login';
    $nav = json_decode(file_get_contents("site_contents.json"), true);
    $user = isset($_REQUEST['user']) ? $_REQUEST['user'] : $cur_page;
    $pageheader = if($cur_page == 'login') {
        'Welcome!'; 
    } else if ($cur_page == 'teacher' || $cur_page == 'student') {
        $cur_page;
     else {
        $nav[$user][$cur_page];
    }
    $pagetitle = if($cur_page == 'login' ? 'Login' : "JAK - $pageheader");
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
            <?php if($cur_page == 'login') {
                foreach ($nav['navigation'] as $pageid => $title) { ?>
                <button <if ($cur_page == $pageid) {
                            'class="current"';
                        }
                            else {
                            ''; 
                        } ?> >
                    <a href="/index.php?page=<?= $pageid ?>"><?= $title ?></a>
                </button>
            <?php }} else {
                '' 
            }?>

            <?php if($user == 'teacher' || $user == 'student') { ?>
                <ul>
                <?php foreach ($nav[$user] as $pageid => $title) { ?>
                    <li <if($cur_page == $pageid) {
                            'class="current"';
                        } else {
                            ''; 
                        }?> >
                        <a href="/index.php?user=<?= $user ?>page=<?= $pageid ?>"><?= $title ?></a>
                    </li>
                <?php }} else {
                    '' } ?>
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