<div style="text-align:center;"><button class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">What's My Mission?</button></div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Your Mission</h4>
            </div>
            <div class="modal-body">
                Oh no, something has happened! In order to keep moving forward, you must read the story
                and answer some questions.<br>
                <img src="http://placehold.it/140x100" alt="Generic placeholder thumbnail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Let's Get Started</button>
            </div>
        </div>
    </div>
</div>


<div id="slider">

    <a href="#" class="control_prev"><img src="leftarrow.png"></a>

    <ul id="sliderul">
        <li class="sliderli">
            <section class="page">
                <!--title-->
                <?php global $theme;
                $theme = $_REQUEST['theme'];
                $rows = $db->query("SELECT DISTINCT Title FROM `vw_fullstory` WHERE theme='$theme'");
                $result = $rows->fetch(PDO::FETCH_BOTH); ?>
                <h1 class="title"><?php print $result[0]; ?></h1>
            </section>
        </li>
        <!--pages -->
        <?php $findPages = "SELECT Content, ImagePath, ImageDesc FROM `vw_fullstory` WHERE theme='$theme' ORDER BY PageNum";
        foreach ($db->query($findPages) as $pages) { ?>
            <li class="sliderli">
                <section class="page">
                    <p><?php print $pages['Content']; ?></p>
                    <img alt="<?=$pages['ImageDesc']?>" src="<?=$pages['ImagePath']?>" />
                </section>
            </li>
        <?php } ?>

        <!-- Questions -->
        <?php $findQuestions = "SELECT DISTINCT Question FROM `vw_fullassessment` WHERE theme='$theme' ORDER BY RAND()";
        foreach ($db->query($findQuestions) as $questions) {
            $q = $questions['Question']?>
            <li class="sliderli">
                <section class="page">
                    <p><?php print $q; ?></p>
                    <!-- answer options -->
                    <form role="form">
                        <?php $opt = "SELECT AnswerValue, Correct FROM `vw_fullassessment` WHERE Question='$q' ORDER BY RAND()";
                        foreach ($db->query($opt) as $row) { ?>
                            <div class="form-group">
                                <div class="radio" >
                                    <label>
                                        <input type="radio" name="optionsRadios" value="<?=$row['Correct']?>">
                                        <?php 
                                            print $row['AnswerValue']; 
                                            $db->query("CALL new_selection('$username', '$AnswerValue')");
                                        ?>
                                    </label>
                                </div>
                            </div>
                        <?php } ?>
                    </form>
                </section>
            </li>
        <?php } ?>
    </ul>

    <a href="#" class="control_next"><img src="rightarrow.png"></a>

</div>

<!-- Javascript file for slider -->
<script src="slider.js" type="text/javascript"></script>