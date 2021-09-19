<?php 
  include('top.php');
  $img_error="";

  if(isset($_GET['id']) && $_GET['id'] > 0){
    $edit_id = get_safe_value($_GET['id']);

    $data = mysqli_fetch_assoc(mysqli_query($con,"select * from questions where id='$edit_id' "));
    $dept_id = $data['dept_id'];
    $sem_id = $data['sem_id'];
    $sub_id = $data['sub_id'];
    $chap_id = $data['chap_id'];
    $lvl_id = $data['lvl_id'];

    $row = mysqli_fetch_assoc(mysqli_query($con,"select questions.*,departments.dept_name as deptNM,semesters.sem_name as semNM,subjects.sub_name as subNM,chapters.chap_name as chapNM,levels.lvl as lvlNM from questions,departments,semesters,subjects,chapters,levels where questions.dept_id='$dept_id' and questions.sem_id='$sem_id' and questions.sub_id='$sub_id' and questions.chap_id='$chap_id' and questions.lvl_id='$lvl_id' and questions.id = '$edit_id'"));
  }else{
    redirect('all_question.php');
  }


  if(isset($_POST['submit'])){
    $dept_id = get_safe_value($_POST['dept_id']);
    $sem_id = get_safe_value($_POST['sem_id']);
    $sub_id = get_safe_value($_POST['sub_id']);
    $chap_id = get_safe_value($_POST['chap_id']);
    $lvl_id = get_safe_value($_POST['lvl_id']);
    $question = $_POST['question'];
    $type= $_FILES['image']['type'];
    if($type != null){
      if($type !="image/jpeg" && $type !="image/png"){
          $img_error="Invalid Image Format(Choose jpeg/png)";
        }else{
          $image = rand(11111111,9999999)."_".$_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'],SERVER_IMAGE_PATH.$image);
          $sql = "update questions set dept_id = '$dept_id', sem_id  ='$sem_id', sub_id = '$sub_id', chap_id = '$chap_id', lvl_id = '$lvl_id', question = '$question', img = '$image' where id = '$edit_id' ";
          if(mysqli_query($con,$sql)){
            redirect('all_question.php');
          }
        }
    }
  }
?>


                <div class="x_panel">
                <div class="x_title">
                  <h2>Edit Question</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form action="" method="POST"  enctype="multipart/form-data">
                    <div class="item form-group">
                        <div class="col-md-6">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Department<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control" name="dept_id" required="required" id="dept_id">
                            <option value="">Choose Department</option>
                          </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Semester<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control" name="sem_id" required="required" id="sem_id">

                          </select>
                          </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-4">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Subject<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control" name="sub_id" required="required" id="sub_id">

                          </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Chapter<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control" name="chap_id" required="required" id="chap_id">

                          </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Level<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                            <?php $res = mysqli_query($con, "select * from levels");?>
                          <select class="form-control" name="lvl_id" required="required" id="lvl_id">
                              <option value="">Select Level</option>
                            <?php 
                            while($lvlRow = mysqli_fetch_assoc($res)){ 
                                if($lvlRow['id'] == $row['lvl_id']){
                              ?>
                              <option value="<?php echo $lvlRow['id']?>" selected><?php echo $lvlRow['lvl']?></option>
                            <?php }else{ ?>
                              <option value="<?php echo $lvlRow['id']?>"><?php echo $lvlRow['lvl']?></option>
                            <?php } }?>
                          </select>
                          </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div>
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Question<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <textarea class="form-control" name="question"  rows="4" cols="100" placeholder="Add your question here" required="required"><?php echo $row['question']?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Image
                          </label>
                        <input type="file" class="form-control" placeholder="Image" name="image">
                          <?php if($row['img'] == 'No Image'){?>
                          <div><h3>No Diagram Selected</h3></div>
                        <?php }else{?>
                          <div style="margin-top: 10px;"><a target="_blank" href="<?php echo SITE_IMAGE_PATH.$row['img'];?>"><img src="<?php echo SITE_IMAGE_PATH.$row['img'];?>" width="300px" height="150px"></div>
                          <?php } ?>  
                             <div class="error mt8"><?php echo $img_error?></div>
                      </div>
                    </div>

                    <div class="text-right">
                      <input type="submit" class="btn btn-success btn-lg" name="submit" value="Update">
                    </div>
                  </form> 
                </div>
                  
                </div>
              </div>


<script type="text/javascript">

  //Converting php value into js value
  var editVal = <?php echo json_encode($edit_id, JSON_HEX_TAG); ?>;
  var deptVal = <?php echo json_encode($dept_id, JSON_HEX_TAG); ?>;
  var semVal = <?php echo json_encode($sem_id, JSON_HEX_TAG); ?>;
  var subVal = <?php echo json_encode($sub_id, JSON_HEX_TAG); ?>;
  var chapVal = <?php echo json_encode($chap_id, JSON_HEX_TAG); ?>;

  /*  Retrieving Data */
    function loadData(type, editVal, deptVal, semVal, subVal, chapVal){
      $.ajax({
        url : "question_edit.php",
        type : "POST",
        data : {type : type, editVal : editVal, deptVal : deptVal, semVal : semVal, subVal : subVal, chapVal : chapVal},
        dataType: 'json', // As we will get json data from chapter_edit.php
        success : function(result){
          var data = result;
          if(type == "pageLoad"){
            $("#dept_id").append(data.deptStr);
            $("#sem_id").html(data.semStr);
            $("#sub_id").html(data.subStr);
            $("#chap_id").html(data.chapStr);
          }
          
        }
      });
    }

  loadData("pageLoad",editVal,deptVal,semVal,subVal,chapVal);
  
</script>             

<?php 
  include('footer.php');
?>
