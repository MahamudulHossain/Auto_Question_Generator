<?php
	include('function.inc.php');
	include('database.inc.php');
	include('constant.inc.php');
	require_once __DIR__ . '/pdf/vendor/autoload.php';
	if(isset($_POST['generate'])){
		$dept_id = $_POST['dept_id'];
		$sem_id = $_POST['sem_id'];
		$sub_id = $_POST['sub_id'];
		$chap_id = $_POST['chap_id'];
		$exam_name = $_POST['exam_name'];
		$ques_set = $_POST['ques_set'];
		$lvl_id = $_POST['lvl_id'];
		$exam_time = $_POST['exam_time'];


		$res = mysqli_query($con,"select question,img from questions where dept_id='{$dept_id}' and sem_id='{$sem_id}' and sub_id='{$sub_id}' and chap_id='{$chap_id}' and lvl_id='{$lvl_id}' ");
		$dep = mysqli_query($con,"select * from departments where id='{$dept_id}' ");
		$depRow = mysqli_fetch_assoc($dep);
		$sem = mysqli_query($con,"select * from semesters where id='{$sem_id}' ");
		$semRow = mysqli_fetch_assoc($sem);
		$sub = mysqli_query($con,"select * from subjects where id='{$sub_id}' ");
		$subRow = mysqli_fetch_assoc($sub);
		$totalMarks = $ques_set*10;

		$html = "<html>
			<head><title>Automatic Question Generator</title></head>
			<body>
				<div style='text-align:center;'>
					<h2>Jahangirnagar University</h2>
						Department of ". $depRow['dept_name']."<br>
						Semester: ". $semRow['sem_name']."<br>
						Subject: ". $subRow['sub_name']."
				</div>";
		$html.="<table width='100%'><tr><td>Marks: ". $totalMarks."</td><td align='right'>Time: ". $exam_time."</td></tr></table><hr>";

			if(mysqli_num_rows($res)){
					while($row = mysqli_fetch_assoc($res)){
						$arr[]=$row;
					}
			}

			for($s=1;$s<=$ques_set;$s++){
				$ques = array();
				$ques[] = array_rand($arr,4);
				$html.= $s."<br>";
				$c = "a";
				for($k=0;$k<4;$k++){
					$html.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$c. ". $arr[$ques[0][$k]]['question']."<br><br>";
					if($arr[$ques[0][$k]]['img'] != "No Image"){
						//$html.="<div style='margin-left: 200px;padding:5px;'><img src='http://localhost/auto_Question_Generator/images/diagrams/".$arr[$ques[0][$k]]['img']."' width='200px' height='100px'></div> <br><br>";
						$html.="<div style='margin-left: 200px;padding:5px;'><img src='".SITE_IMAGE_PATH."".$arr[$ques[0][$k]]['img']."' width='200px' height='100px'></div> <br><br>";
						
					}
					$c++;
				}
				$html.="<br><br>";
			}

			$html.="</body></html>";
		//echo $html;
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$file=time().'.pdf';
			$mpdf->Output($file,'I');
	}

?>