<!-- This page let's the user select which theme they would like to use -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap-theme.min.css">
        <link href="capstone.css" rel="stylesheet" type="text/css">
        <title>Student Landing</title>
    </head>

    <body style="background-color:#eee;">
    	<div class="jumbotron" style="text-align:center;">
			<div style="text-align:center;">
				<p>Which theme would you like?</p>
				<div class="btn-group-vertical btn-group-lg">
					<a class="btn btn-default btn-lg" href="/studenttemplate.php?page=play&theme=rainforest"><span class="glyphicon glyphicon-tree-conifer"></span> Rainforest</a>
					<a class="btn btn-default btn-lg" href="/studenttemplate.php?page=play&theme=castle"><span class="glyphicon glyphicon-tower"></span> Castle</a>
					<a class="btn btn-default btn-lg" href="/studenttemplate.php?page=play&theme=pirate"><span class="glyphicon glyphicon-flag"></span> Pirate</a>
				</div>
			</div>
		</div>
	</body>
</html>
