<?php
	include('function.inc.php');
	include('database.inc.php');
	include('constant.inc.php');
	require_once __DIR__ . '/pdf/vendor/autoload.php';

	if(isset($_POST['generate'])){
		$dept_id = $_POST['dept_id'];
		$sem_id = $_POST['sem_id'];
		$sub_id = $_POST['sub_id'];
		$chap_ids = $_POST['chap_ids'];
		$exam_name = $_POST['exam_name'];
		$ques_set = $_POST['ques_set'];
		$lvl_id = $_POST['lvl_id'];
		$exam_time = $_POST['exam_time'];
		$exam_mark = $_POST['exam_mark'];
		$setsToAns = $exam_mark/20;
		//echo $chap_ids['1'];

		$count = count($chap_ids);
		if($count < $ques_set){
		    $chap_ids = array_merge($chap_ids,array_reverse($chap_ids));
		  }

		$res = mysqli_query($con,"select question from questions where dept_id='{$dept_id}' and sem_id='{$sem_id}' and sub_id='{$sub_id}' ");
		$dep = mysqli_query($con,"select * from departments where id='{$dept_id}' ");
		$depRow = mysqli_fetch_assoc($dep);
		$sem = mysqli_query($con,"select * from semesters where id='{$sem_id}' ");
		$semRow = mysqli_fetch_assoc($sem);
		$sub = mysqli_query($con,"select * from subjects where id='{$sub_id}' ");
		$subRow = mysqli_fetch_assoc($sub);

		$html = "<html>
			<head><title>Automatic Question Generator</title></head>
			<body>
				<div style='text-align:center;'>
					<h2>Jahangirnagar University</h2>
						Department of ". $depRow['dept_name']."<br>
						Semester: ". $semRow['sem_name']."<br>
						Subject: ". $subRow['sub_name']."
				</div>";
		$html.="<table width='100%'><tr><td>Marks: ". $exam_mark."</td><td align='right'>Time: ". $exam_time."</td></tr></table><hr><br><div style='text-align:center;'>[N.B. Answer any 0".$setsToAns." set/s. All questions contain same marks]</div>";		

			if(mysqli_num_rows($res)){
				for($i=0;$i<count($chap_ids);$i++){
					$res1 = mysqli_query($con,"select question,img from questions where dept_id='{$dept_id}' and sem_id='{$sem_id}' and sub_id='{$sub_id}' and chap_id='{$chap_ids[$i]}' and lvl_id='{$lvl_id}' ");
					$arr = array();
					while($row = mysqli_fetch_assoc($res1)){
				  	$arr[]=$row;
					}
					$solo[] = $arr; //converting the prevoius array again to array for index number
				}
			}
			//echo '<pre>';
			//print_r($solo);
			//die();
			 $c = count($solo);


			 $serial=1;
			for($s=0;$s<$ques_set;$s++){
				$ques = array();
				$ques[] = array_rand($solo[$s],4);
				$html.= $serial++."<br>";
				$c = "a";
				for($k=0;$k<4;$k++){
					//echo "<pre>";
					//print_r($solo[$s][$ques[0][$k]]['question']);
					//die();

					$html.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$c. ".$solo[$s][$ques[0][$k]]['question']."<br><br>";
					if($solo[$s][$ques[0][$k]]['img'] != "No Image"){
						$html.="<div style='margin-left: 200px;padding:5px;'><img src='".SITE_IMAGE_PATH."".$solo[$s][$ques[0][$k]]['img']."' width='200px' height='100px'></div> <br><br>";
						
					}
					$c++;
				}
				$html.="<br>";
			}


			$html.="</body></html>";
			//echo $html;
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$file=time().'.pdf';
			$mpdf->Output($file,'I');
	}

?>