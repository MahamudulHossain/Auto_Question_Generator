<?php 
	include('database.inc.php');
	$str = "";

		if($_POST['newtype'] == "semester"){
		$res = mysqli_query($con,"select * from semesters");
		$str = "<option value=''>Choose Semester</option>";
			while($row = mysqli_fetch_assoc($res)){
				$str .= "<option value='{$row['id']}'>{$row['sem_name']}</option>";
			}
		}else if($_POST['newtype'] == "subject"){
		$res = mysqli_query($con,"select * from subjects where dept_id={$_POST['deptID']} and sem_id={$_POST['semID']} ");
		$str = "<option value=''>Choose Subject</option>";
			while($row = mysqli_fetch_assoc($res)){
				$str .= "<option value='{$row['id']}'>{$row['sub_name']}</option>";
			}
		}else if($_POST['newtype'] == "chapter"){
		$res = mysqli_query($con,"select * from chapters where dept_id={$_POST['deptID']} and sem_id={$_POST['semID']} and sub_id={$_POST['subID']} ");
		$str = "<option value=''>Choose Chapter</option>";
			while($row = mysqli_fetch_assoc($res)){
				$str .= "<option value='{$row['id']}'>{$row['chap_name']}</option>";
			}
		}

		echo $str;

?>