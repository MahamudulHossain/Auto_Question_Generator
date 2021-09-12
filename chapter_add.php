<?php
	
	include('database.inc.php');
	$str = "";

	if($_POST['type'] == "semester"){
		$res = mysqli_query($con,"select * from semesters");
		$str = "<option value=''>Choose Semester</option>";
		while($row = mysqli_fetch_assoc($res)){
			$str .= "<option value='{$row['id']}'>{$row['sem_name']}</option>";
		}
	}else if($_POST['type'] == "subject"){
		$res = mysqli_query($con,"select * from subjects where dept_id={$_POST['fast_id']} and sem_id={$_POST['second_id']} ");
		$str = "<option value=''>Choose Semester</option>";
		while($row = mysqli_fetch_assoc($res)){
			$str .= "<option value='{$row['id']}'>{$row['sub_name']}</option>";
		}
	}else{
		$res = mysqli_query($con,"select * from departments");
		while($row = mysqli_fetch_assoc($res)){
			$str .= "<option value='{$row['id']}'>{$row['dept_name']}</option>";
		}
	}
	

	echo $str;


?>