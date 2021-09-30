<?php 
  include('top.php');
  if(isset($_GET['did']) && $_GET['did'] > 0){
    $did = get_safe_value($_GET['did']);
    mysqli_query($con, "delete from chapters where id='$did' ");
    redirect('all_chapter.php');
  }
?>

                <div class="top_pad clr_chng">
                  All Chapters
                </div>
                <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                    <?php
                          $res = mysqli_query($con,"select chapters.*,departments.dept_name as deptNM,semesters.sem_name as semNM,subjects.sub_name as subNM from chapters,departments,semesters,subjects where chapters.dept_id=departments.id and chapters.sem_id=semesters.id and chapters.sub_id=subjects.id order by chapters.id desc");
                          if(mysqli_num_rows($res) > 0){
                        ?>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Department </th>
                            <th class="column-title">Semester </th>
                            <th class="column-title">Subject Name </th>
                            <th class="column-title">Chapter </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            while($row = mysqli_fetch_assoc($res)){
                          ?>
                          <tr>
                              <td><?php echo $row['deptNM']?></td>
                              <td><?php echo $row['semNM']?></td>
                              <td><?php echo $row['subNM']?></td>
                              <td><?php echo $row['chap_name']?></td>
                              <td>
                                  <a href="edit_chapter.php?id=<?php echo $row['id']?>&dept_id=<?php echo $row['dept_id']?>&sem_id=<?php echo $row['sem_id']?>&sub_id=<?php echo $row['sub_id']?>"><button class="btn btn-primary btn-sm">Edit</button></a>
                                  <a href="?did=<?php echo $row['id']?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                <?php }else{?>
                  <h3>No Data Found</h3>
                <?php } ?>
                </div>
              </div>
                

<?php include('footer.php');?>