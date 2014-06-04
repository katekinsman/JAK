<?php 
    global $theme;
    $theme = $_REQUEST['theme'];

    if ($theme == 'rainforest') {
        ?><body style="background-color:#D8F6CE;"><?
    } else if ($theme == 'castle') {
        ?><body style="background-color:#E6E0F8;"><?
    } else {
        ?><body style="background-color:#E0F2F7;"><?
    }
?>

    <!--<div style="text-align:center;"><button id="buttonModal" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">What's My Mission?</button></div>-->

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
                    and answer some questions. This is a map of your journey:<br>
                    <img src="map/TikiMap.png" alt="Map" height="90%" width="90%"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Let's Get Started</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#myModal').modal({show: true});
    </script>

    <!--Story Slider-->
    <div id="storySlider" class="slider">

        <a href="#" class="control_prev"><img src="leftarrow.png"></a>

        <ul class="sliderul">
            <li class="sliderli">
                <section class="page">
                    <!--title-->
                    <?php
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
        </ul>

        <a href="#" class="control_next"><img src="rightarrow.png"></a>

    </div>

    <!--Question Slider-->
    <div id="questionSlider" class="slider" class="hidden">

        <ul class="sliderul">
            <!-- Questions -->
            <?php $findQuestions = "SELECT DISTINCT Question FROM `vw_fullassessment` WHERE theme='$theme' ORDER BY RAND()";
            $qNum = 1;
            foreach ($db->query($findQuestions) as $questions) {
                $q = $questions['Question'];?>
                <li class="sliderli">
                    <section class="page">
                        <p><?php print $q; ?></p>

                        <!-- answer options -->
                        <form id="<?=$qNum?>" method="post">
                            <?php $opt = "SELECT AnswerValue FROM `vw_fullassessment` WHERE Question='$q' ORDER BY RAND()";
                            foreach ($db->query($opt) as $row) { ?>
                                <div  class="form-group">
                                    <div class="radio" >
                                        <label>
                                            <input type="radio" name="answers" value="<?=$row['AnswerValue']?>">
                                            <?php print $row['AnswerValue']; ?>
                                        </label>
                                    </div>
                                </div>
                            <?php } ?>
                        </form>
                    </section>

                </li>
                <?php $qNum++;
            } ?>
        </ul>

        <a href="#questionSlider" id="clickarrow" class="control_next"><img src="rightarrow.png"></a>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="answerModal" tabindex="-1" role="dialog" aria-labelledby="answerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="answerModalLabel">Feedback</h4>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
</body>

<!-- Javascript file for slider -->
<script src="slider.js" type="text/javascript"></script>
