<?php
	$studentanswer=$_POST['answers'];
	$db->query("CALL new_selection('$username', '$studentanswer')");
?>