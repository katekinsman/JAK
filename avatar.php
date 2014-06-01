<body style="background-color:#CEF6E3">

	<div class="panel panel-default">
	  <div class="panel-body">

	  	<div style="text-align:center; overflow:auto; float:left; width:40%;">
	  		<h1>My Avatar</h1>
			<img src="http://www.clipartbest.com/cliparts/nTB/X6B/nTBX6BETA.gif" height="10%" width="10%">
			<!-- Total coins for student -->
			<?php 	

				$coinsquery = ("SELECT sum(`StorySum`) FROM `vw_totalstorycoins`
					WHERE `StudentName` = '$user'");
					$result = $db->query($coinsquery);
					$coins = $result->fetch(PDO::FETCH_BOTH);
					
					if ($coins[0] == null) {
						$coins[0] = 0;
					}
			?>
			<h3>You have <?php print $coins[0] ?> coins!</h3>
			<p>View your inventory here. You can purchase more items at the store!</p>
		</div>
	    
		<div id="myCarousel" class="carousel" style="float:right; width:60%" data-interval="false">

		  <!-- Carousel items -->
		<div class="carousel-inner">
		    <div class="active item">
		    	<table class="table">
	                <tr>
	                    <td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Shirt.png" 
					         alt="Shirt" width="30%" height="30%">
					      </a></td>
						<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Green Shirt.png" 
					         alt="Shirt" width="30%" height="30%">
					      </a></td>
						<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Grey Shirt.png" 
					         alt="Shirt" width="30%" height="30%">
					      </a></td>
	                </tr>
	                <tr>
	                   	<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Shirt.png" 
					         alt="Shirt" width="30%" height="30%">
					      </a></td>
	                   	<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Green Shirt.png" 
					         alt="Shirt" width="30%" height="30%">
					      </a></td>
	                   	<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Grey Shirt.png" 
					         alt="Shirt" width="30%" height="30%">
					      </a></td>
	                </tr>
	                <tr>
	                   	<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Shirt.png" 
					         alt="Shirt" width="30%" height="30%">
					      </a></td>
						<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Green Shirt.png" 
					         alt="Shirt" width="30%" height="30%">
					      </a></td>
						<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Grey Shirt.png" 
					         alt="Shirt" width="30%" height="30%">
					      </a></td>
	                </tr>
	            </table>

			</div>
		    <div class="item">
		    	<table class="table">
	                <tr>
	                    <td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Green Pants.png" 
					         alt="Shirt" width="25%" height="25%">
					      </a></td>
						<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Orange Pants.png" 
					         alt="Shirt" width="25%" height="25%">
					      </a></td>
						<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/White Pants.png" 
					         alt="Shirt" width="25%" height="25%">
					      </a></td>
	                </tr>
	                <tr>
	                   	<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Green Pants.png" 
					         alt="Shirt" width="25%" height="25%">
					      </a></td>
						<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Orange Pants.png" 
					         alt="Shirt" width="25%" height="25%">
					      </a></td>
						<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/White Pants.png" 
					         alt="Shirt" width="25%" height="25%">
					      </a></td>
	                </tr>
	                <tr>
	                   	<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Green Pants.png" 
					         alt="Shirt" width="25%" height="25%">
					      </a></td>
						<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/Orange Pants.png" 
					         alt="Shirt" width="25%" height="25%">
					      </a></td>
						<td><a href="#" class="thumbnail">
					         <img src="/avatarimages/White Pants.png" 
					         alt="Shirt" width="25%" height="25%">
					      </a></td>
	                </tr>
	            </table>
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
</body>