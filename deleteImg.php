<?php

	include('database.inc.php');
	
	$dImId = $_POST['dImId'];
	$txt = "No Image";
	$res = mysqli_query($con,"update questions set img='{$txt}' where id='{$dImId}' ");
	if($res){
		echo json_encode(array("msg" => 'success'));
	}

?>