<?php

session_start();
include('../database.inc.php');
include('../function.inc.php');
include('../constant.inc.php');

	if(isset($_POST['editID']) && $_POST['editID']>0){
	    $editID=get_safe_value($_POST['editID']);
	    $res = mysqli_query($con,"select * from subjects where id='$editID' ");
	    if(mysqli_num_rows($res) > 0){
	    	$row = mysqli_fetch_assoc($res);
	    	echo json_encode($row);
	    }
	}

?>