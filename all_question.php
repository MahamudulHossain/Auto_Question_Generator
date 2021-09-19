<?php 
  include('top.php');
  if(isset($_GET['did']) && $_GET['did'] > 0){
    $did = get_safe_value($_GET['did']);
    mysqli_query($con, "delete from questions where id='$did' ");
    redirect('all_question.php');
  }
  ?>

                <div class="top_pad all_ques">
                  All Questions
                </div>
                <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                      <?php 
                        $res = mysqli_query($con,"select questions.*,departments.dept_name as deptNM,semesters.sem_name as semNM,subjects.sub_name as subNM,chapters.chap_name as chapNM from questions,departments,semesters,subjects,chapters where questions.dept_id=departments.id and questions.sem_id=semesters.id and questions.sub_id=subjects.id and questions.chap_id=chapters.id");
                        if(mysqli_num_rows($res) > 0){
                        ?>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <?php ?>
                      <thead>
                        <tr>
                          <th width="25%">Question</th>
                          <th width="10%">Department</th>
                          <th width="10%">Semester</th>
                          <th width="10%">Subject</th>
                          <th width="10%">Chapter</th>
                          <th width="17%">Diagram</th>
                          <th width="18%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while($row = mysqli_fetch_assoc($res)){?>
                        <tr>
                          <td><?php echo $row['question']?></td>
                          <td><?php echo $row['deptNM']?></td>
                          <td><?php echo $row['semNM']?></td>
                          <td><?php echo $row['subNM']?></td>
                          <td><?php echo $row['chapNM']?></td>
                          <td>
                            <?php if($row['img'] == 'No Image'){?>
                              No Diagram Available
                            <?php }else{?>
                            <a target="_blank" href="<?php echo SITE_IMAGE_PATH.$row['img'];?>"><img src="<?php echo SITE_IMAGE_PATH.$row['img'];?>" width="150px" height="100px">
                            <?php } ?>  
                          </td>
                          <td>
                                  <a href="edit_question.php?id=<?php echo $row['id']?>"><button class="btn btn-primary btn-sm">Edit</button></a>
                                  <a href="?did=<?php echo $row['id']?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                          </td>
                        </tr>
                       <?php } ?> 
                      </tbody>
                    </table>
                  <?php }else{?>
                    <h3>No Data Founnd</h3>
                   <?php } ?> 
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
                

<?php include('footer.php');?>
