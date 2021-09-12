<?php 
  include('top.php');

  if(isset($_POST['submit'])){
    $dept_id = get_safe_value($_POST['dept_id']);
    $sem_id = get_safe_value($_POST['sem_id']);
    $sub_id = get_safe_value($_POST['sub_id']);
    $chap_name = get_safe_value($_POST['chap_name']);

    $res = mysqli_query($con,"insert into chapters(dept_id,sem_id,sub_id,chap_name) values('$dept_id','$sem_id','$sub_id','$chap_name') ");
    redirect('all_chapter.php');

  }
?>
                <div class="top_pad">
                  Add Chapter
                </div>

                <div class="x_panel">
                <div class="x_title">
                  <h2>Add New Chapter</h2>
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
                        <input type="text" class="form-control" name="chap_name" required="required">
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

  
    function loadData(type, firstID, secondID){
      $.ajax({
        url : "chapter_add.php",
        type : "POST",
        data : {type : type, fast_id : firstID, second_id : secondID},
        success : function(result){
          if(type == "semester"){
            $("#sem_id").html(result);
          }else if(type == "subject"){
            $("#sub_id").html(result);
          }else{
            $("#dept_id").append(result);
          }
        }
      });
    }

  loadData();

  $("#dept_id").on("change",function(){
    loadData("semester");
  });

  $("#sem_id").on("change",function(){
    var deptID = $("#dept_id").val();
    var semID = $("#sem_id").val();
    loadData("subject",deptID,semID);
  });
</script>

<?php include('footer.php');?>