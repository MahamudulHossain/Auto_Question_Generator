<?php include('top.php');?>

                <div class="top_pad add_ques">
                  Add Question
                </div>

                <div class="x_panel">
                <div class="x_title">
                  <h2>Add New Question</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form action="" method="POST">
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
                            <?php while($lvlRow = mysqli_fetch_assoc($res)){ ?>
                              <option value="<?php echo $lvlRow['id']?>"><?php echo $lvlRow['lvl']?></option>
                            <?php } ?>
                          </select>
                          </div>
                        </div>
                    </div>

                    <div class="text-right">
                      <input type="submit" class="btn btn-success btn-lg" name="submit" value="Save">
                    </div>
                  </form> 
                </div>
                  
                </div>
              </div>

    <script type="text/javascript">

  
    function loadQuestionData(type, deptID, semID, subID){
      $.ajax({
        url : "question_add.php",
        type : "POST",
        data : {type : type, deptID : deptID, semID : semID, subID : subID},
        success : function(result){
          if(type == "semester"){
            $("#sem_id").html(result);
          }else if(type == "subject"){
            $("#sub_id").html(result);
          }else if(type == "chapter"){
            $("#chap_id").html(result);
          }else{
            $("#dept_id").append(result);
          }
        }
      });
    }

  loadQuestionData();

  $("#dept_id").on("change",function(){
    loadQuestionData("semester");
  });
  
  $("#sem_id").on("change",function(){
    var deptID = $("#dept_id").val();
    var semID = $("#sem_id").val();
    loadQuestionData("subject",deptID,semID);
  });

  $("#sub_id").on("change",function(){
    var deptID = $("#dept_id").val();
    var semID = $("#sem_id").val();
    var subID = $("#sub_id").val();
    loadQuestionData("chapter",deptID,semID,subID);
  });
</script>          

  <?php include('footer.php');?>