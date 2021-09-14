<?php 
  include('top.php');

  if(isset($_GET['id']) && $_GET['id'] > 0){
    $edit_id = get_safe_value($_GET['id']);
    $dept_id = get_safe_value($_GET['dept_id']);
    $sem_id = get_safe_value($_GET['sem_id']);
    $sub_id = get_safe_value($_GET['sub_id']);

    $row = mysqli_fetch_assoc(mysqli_query($con,"select chapters.*,departments.dept_name as deptNM,semesters.sem_name as semNM,subjects.sub_name as subNM from chapters,departments,semesters,subjects where chapters.dept_id=departments.id and chapters.sem_id=semesters.id and chapters.sub_id=subjects.id and chapters.id = '$edit_id' "));
  }else{
    redirect('all_chapter.php');
  }

?>
    <div id="editID" style="display: none;">
    <?php
      $output = $edit_id;
        echo htmlspecialchars($output);
    ?>
    </div>

                <div class="x_panel">
                <div class="x_title">
                  <h2>Edit Chapter</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form action="" method="POST">
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Department<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" name="dept_id" required="required" id="dept_id">
                          <option value="">Choose Department</option>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Semester<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" id="sem_id" name="sem_id" required="required">
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Subject<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select class="form-control" id="sub_id" name="sub_id" required="required"></select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">chapter Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" class="form-control" name="chap_name" required="required" id="chap_id">
                      </div>
                    </div>

                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>

<script type="text/javascript">

  //Converting php value into js value
  var editVal = <?php echo json_encode($edit_id, JSON_HEX_TAG); ?>;
  var deptVal = <?php echo json_encode($dept_id, JSON_HEX_TAG); ?>;
  var semVal = <?php echo json_encode($sem_id, JSON_HEX_TAG); ?>;
  var subVal = <?php echo json_encode($sub_id, JSON_HEX_TAG); ?>;

  /*  id=7&dept_id=3&sem_id=5&sub_id=3 */
    function loadData(type, editVal, deptVal, semVal, subVal){
      $.ajax({
        url : "chapter_edit.php",
        type : "POST",
        data : {type : type, editVal : editVal, deptVal : deptVal, semVal : semVal, subVal : subVal},
        dataType: 'json', // As we will get json data from chapter_edit.php
        success : function(result){
          var data = result;
          if(type == "pageLoad"){
            $("#dept_id").append(data.deptStr);
            $("#sem_id").html(data.semStr);
            $("#sub_id").html(data.subStr);
            $("#chap_id").val(data.chapStr.chap_name);
          }
          
        }
      });
    }

  loadData("pageLoad",editVal,deptVal,semVal,subVal);

</script>

<?php include('footer.php');?>
