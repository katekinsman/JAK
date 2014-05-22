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
                and answer some questions.
                <img src="http://placehold.it/140x100" alt="Generic placeholder thumbnail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Let's Get Started</button>
            </div>
        </div>
    </div>
</div>


<div class="panel panel-default">
	<div class="panel-body">
		<div id="myCarousel" class="carousel" data-interval="false">
			  <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item">
                    <div class="panel panel-default">
                        <!--title-->
                        <?php global $theme;
                        $theme = $_REQUEST['theme'];
                        $rows = $db->query("SELECT DISTINCT Title FROM `vw_fullstory` WHERE theme='$theme'");
                        $result = $rows->fetch(PDO::FETCH_BOTH); ?>
                        <h1><?php print $result[0]; ?></h1>
                    </div>
                </div>

                <!--pages -->
                <?php $findPages = "SELECT Content, ImagePath, ImageDesc FROM `vw_fullstory` WHERE theme='$theme' ORDER BY PageNum";
                foreach ($db->query($findPages) as $pages) { ?>
                    <div class="item">
                        <div class="panel panel-default">
                            <p><?php print $pages['Content']; ?></p>
                            <img alt="<?=$pages['ImageDesc']?>" src="<?=$pages['ImagePath']?>" />
                        </div>
                    </div>
                <?php } ?>

				<!-- TODO: figure out how to foreach through the radio buttons with possible answers -->

                <!-- Questions -->
                <?php $findQuestions = "SELECT DISTINCT Question FROM `vw_fullassessment` WHERE theme='$theme' ORDER BY RAND()";
                foreach ($db->query($findQuestions) as $questions) {
                    $q = $questions['Question']?>
                    <div class="item">
                        <div class="panel panel-default">
                            <p><?php print $q; ?></p>
                            <!-- answer options -->
                            <form>
                                <?php $opt = "SELECT AnswerValue, Correct FROM `vw_fullassessment` WHERE Question='$q' ORDER BY RAND()";
                                foreach ($db->query($opt) as $row) { ?>
                                    <input type="radio" name="option" value="<?=$row['Correct']?>"><?php print $row['AnswerValue']; ?> <br>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                <?php } ?>

				
			</div>
		  <!-- Carousel nav -->
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left"></span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right"></span>
		</a>
		</div>
  	</div>
</div>