<?php
	
	include('database.inc.php');
	$deptStr = "";
	$semStr = "";
	$subStr = "";
	$chapStr = "";

	if($_POST['type'] == "pageLoad"){
		$depRes = mysqli_query($con,"select * from departments");
			while($depRow = mysqli_fetch_assoc($depRes)){
				if($depRow['id'] == $_POST['deptVal']){
					$deptStr .= "<option value='{$depRow['id']}' selected>{$depRow['dept_name']}</option>";
				}else{
					$deptStr .= "<option value='{$depRow['id']}'>{$depRow['dept_name']}</option>";
				}
			}

		$semRes = mysqli_query($con,"select * from semesters");
			while($semRow = mysqli_fetch_assoc($semRes)){
				if($semRow['id'] == $_POST['semVal']){
					$semStr .= "<option value='{$semRow['id']}' selected>{$semRow['sem_name']}</option>";
				}else{
					$semStr .= "<option value='{$semRow['id']}'>{$semRow['sem_name']}</option>";
				}
			}

		$subRes = mysqli_query($con,"select * from subjects where dept_id ={$_POST['deptVal']} and sem_id = {$_POST['semVal']} ");
			while($subRow = mysqli_fetch_assoc($subRes)){
				if($subRow['id'] == $_POST['semVal']){
					$subStr .= "<option value='{$subRow['id']}' selected>{$subRow['sub_name']}</option>";
				}else{
					$subStr .= "<option value='{$subRow['id']}'>{$subRow['sub_name']}</option>";
				}
			}

		$chapRes = mysqli_query($con,"select chap_name from chapters where dept_id ={$_POST['deptVal']} and sem_id = {$_POST['semVal']} and sub_id = {$_POST['subVal']}");
			$chapStr = mysqli_fetch_assoc($chapRes);
			
	}
	
	echo json_encode(array("deptStr" => $deptStr, "semStr" => $semStr, "subStr" => $subStr, "chapStr" => $chapStr));


?>