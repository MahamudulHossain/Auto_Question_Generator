<?php 
   include('top.php');
?>

                <div class="top_pad single_chap">
                  Single Chapter Question Generation 
                </div>

                <div class="x_panel">
                <div class="x_title">
                  <h2>&nbsp;</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form action="singleQuestionPDF.php" method="POST">

                    <div class="item form-group">
                        <div class="col-md-6">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Department<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control" required="required" id="dept_id" name="dept_id">
                            <option value="">Choose Department</option>
                          </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Semester<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9">
                          <select class="form-control" required="required" id="sem_id" name="sem_id">
                            
                          </select>
                          </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-6">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Subject<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control" required="required" id="sub_id" name="sub_id">
                           
                          </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Chapter<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control" required="required" id="chap_id" name="chap_id">
                            
                          </select>
                          </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-3">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Exam Name<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                            <input type="text" id="exam_nm" class="form-control" name="exam_name" required="required" placeholder="1st class test">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Total Set<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                          <select class="form-control" required="required" name="ques_set">
                            <option value="">Choose Number of Set</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                          </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Level<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9">
                            <?php $res = mysqli_query($con,"select * from levels");?>
                          <select class="form-control" required="required" name="lvl_id">
                            <option value="">Choose Level</option>
                            <?php while($row = mysqli_fetch_assoc($res)){?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['lvl']?></option>
                          <?php } ?>
                          </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Exam Time<span class="required">*</span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="exam_time" required="required" placeholder="1 hour 30 minutes">
                          </div>
                        </div>
                    </div>

                     <div class="text-right">
                      <button class="btn btn-lg single_chap_btn" name="generate">Generate</button>
                    </div>
                  </form> 
                </div>
                  
                </div>
              </div>

  <script type="text/javascript">
    
    function loadData(type, firstID, secondID,subID){
      $.ajax({
        url : "singleQuestionAjax.php",
        type : "POST",
        data : {type : type, fast_id : firstID, second_id : secondID, subID : subID},
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

  loadData();

  $("#dept_id").on("change",function(){
    loadData("semester");
  });

  $("#sem_id").on("change",function(){
    var deptID = $("#dept_id").val();
    var semID = $("#sem_id").val();
    loadData("subject",deptID,semID);
  });

  $("#sub_id").on("change",function(){
    var deptID = $("#dept_id").val();
    var semID = $("#sem_id").val();
    var subID = $("#sub_id").val();
    loadData("chapter",deptID,semID,subID);
  });
  </script>            

   <?php include('footer.php');?>