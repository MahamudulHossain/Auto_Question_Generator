<?php include('top.php');?>


	<div class="row" style="display: inline-block;">
            <div class="top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <?php 
	            	$res = mysqli_query($con,"select count(id) as Users from users ");
	            	$row=mysqli_fetch_assoc($res);
	              ?>
                  <div class="count"><?php echo $row['Users'] ?></div>
                  <h3>Users Available </h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <?php 
	            	$res = mysqli_query($con,"select count(id) as Chapters from chapters ");
	            	$row=mysqli_fetch_assoc($res);
	              ?>
                  <div class="count"><?php echo $row['Chapters'] ?></div>
                  <h3>Chaperts Added</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-question-circle"></i></div>
                  <?php 
	            	$res = mysqli_query($con,"select count(id) as Questions from questions ");
	            	$row=mysqli_fetch_assoc($res);
	              ?>
                  <div class="count"><?php echo $row['Questions'] ?></div>
                  <h3>Question Added</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recent Activities</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                    	<?php 
                        $res = mysqli_query($con,"select questions.*,departments.dept_name as deptNM,semesters.sem_name as semNM,subjects.sub_name as subNM,chapters.chap_name as chapNM from questions,departments,semesters,subjects,chapters where questions.dept_id=departments.id and questions.sem_id=semesters.id and questions.sub_id=subjects.id and questions.chap_id=chapters.id order by questions.id desc limit 5 ");
                        while($row = mysqli_fetch_assoc($res)){
                        ?>
		                      <li>
		                        <div class="block">
		                          <div class="block_content">
		                            <h2 class="title">
		                                              <a href="javascript:void(0)"><?php echo $row['question']?></a>
		                                          </h2>
		                            <div class="byline mt-2">
		                              <span>Department </span> : <a><?php echo $row['deptNM']?></a>
		                            </div>
		                            <p class="excerpt text-center" >
		                            	<?php if($row['img'] != 'No Image'){?>
				                              <a target="_blank" href="<?php echo SITE_IMAGE_PATH.$row['img'];?>"><img src="<?php echo SITE_IMAGE_PATH.$row['img'];?>" width="350px" height="150px">
				                            
				                            <?php } ?>
		                            </p>
		                          </div>
		                        </div>
		                      </li>
		                <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php include('footer.php');?>

              
