<div style="text-align:center;"><button class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">
  What's My Mission?
</button></div>

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
			    		<?php 
						    $rows = $db->query("SELECT title FROM story WHERE idStory='$story'");
						    $result = $rows->fetch(PDO::FETCH_BOTH); ?>
				    	<h1><?php print $result[0]; ?></h1>
				    	<?php 
						    $rows2 = $db->query("SELECT Content FROM page WHERE idPage='$pageone'");
						    $result2 = $rows2->fetch(PDO::FETCH_BOTH); ?>
				    	<p><?php print $result2[0]; ?></p>
			    	</div>
		    	</div>
			    <div class="item">
			    	<div class="panel panel-default">
					    <h1>Page Two</h1>
				    	<?php 
						    $rows3 = $db->query("SELECT Content FROM page WHERE idPage='$pagetwo'");
						    $result3 = $rows3->fetch(PDO::FETCH_BOTH); ?>
				    	<p><?php print $result3[0]; ?></p>
			    	</div>
			    </div>
			    <div class="item">
			    	<div class="panel panel-default">
				    	<h1>Page Two</h1>
				    	<?php 
						    $rows4 = $db->query("SELECT Content FROM page WHERE idPage='$pagethree'");
						    $result4 = $rows4->fetch(PDO::FETCH_BOTH); ?>
				    	<p><?php print $result4[0]; ?></p>
				    </div>
				</div>
				<!-- To do: figure out how to foreach through the radio buttons with possible answers -->
				<div class="item">
			    	<div class="panel panel-default">
				    	<h1>Question One</h1>
				    	<?php 
						    $rows5 = $db->query("SELECT Question FROM question WHERE idQuestion='$q1'");
				    		$result5 = $rows5->fetch(PDO::FETCH_BOTH); ?>
				    	<p><?php print $result5[0]; ?></p>
				    	<form>
				    		<?php $opt1 = $db->query("SELECT AnswerValue FROM option WHERE idQuestion='$q1'"); ?>
				    		<?php foreach ($opt1 as $row) { ?>
								<input type="radio" name="option" value="1"><?php $row["AnswerValue"]; ?> <br>
							  <?php } ?>
				    	</form>
				    </div>
				</div>
				<div class="item">
			    	<div class="panel panel-default">
				    	<h1>Question Two</h1>
				    	<?php 
						    $rows6 = $db->query("SELECT Question FROM question WHERE idQuestion='$q2'");
						    $result6 = $rows6->fetch(PDO::FETCH_BOTH); ?>
				    	<p><?php print $result6[0]; ?></p>
				    	<form>
							<input type="radio" name="option" value="1">One<br>
							<input type="radio" name="option" value="2">Two<br>
							<input type="radio" name="option" value="3">Three<br>
							<input type="radio" name="option" value="4">Four
						</form>
				    </div>
				</div>
				<div class="item">
			    	<div class="panel panel-default">
				    	<h1>Question Three</h1>
				    	<?php 
						    $rows7 = $db->query("SELECT Question FROM question WHERE idQuestion='$q3'");
						    $result7 = $rows7->fetch(PDO::FETCH_BOTH); ?>
				    	<p><?php print $result7[0]; ?></p>
				    	<form>
							<input type="radio" name="option" value="1">One<br>
							<input type="radio" name="option" value="2">Two<br>
							<input type="radio" name="option" value="3">Three<br>
							<input type="radio" name="option" value="4">Four
						</form>
				    </div>
				</div>
				
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