<h3>Select a class:</h3>
<div class="btn-group" style="text-align:center;">
  <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Class <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#" id="action-1">Class 1</a></li>
    <li><a href="#" id="action-2">Class 2</a></li>
  </ul>
</div>

<div id="analytics1">
	<h1>Class 1</h1>
	<h3>Class Averages Overtime</h3>
	<img src="/Bar Graph.png" alt="Bar graph">

	<h3>Compare The Average Of My Class</h3>
	<img src="/Line Graph.png" alt="Line graph">
</div>

<div id="analytics2">
	<h1>Class 2</h1>
	<h3>Class Averages Overtime</h3>
	<img src="/Bar Graph.png" alt="Bar graph">

	<h3>Compare The Average Of My Class</h3>
	<img src="/Line Graph.png" alt="Line graph">
</div>

<script type="text/javascript">
	$('#analytics1').hide();
	$('#analytics2').hide();

	$("#action-1").click(function(e){
		$('#analytics1').show();
		$('#analytics2').hide();
		e.preventDefault();
	});

	$("#action-2").click(function(e){
		$('#analytics2').show();
		$('#analytics1').hide();
		e.preventDefault();
	});
</script>