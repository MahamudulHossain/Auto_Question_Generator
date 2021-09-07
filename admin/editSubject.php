<?php 
include('top.php');
$selected = "";
if(isset($_GET['eid']) && $_GET['eid']>0){
    $eid=get_safe_value($_GET['eid']);
    $edit_row = mysqli_fetch_assoc(mysqli_query($con,"select * from subjects where id='$eid'"));
}

if(isset($_POST['save_changes'])){
    $edit_sub_name  = get_safe_value($_POST['edit_sub_name']);
    $edit_dep_name  = get_safe_value($_POST['edit_dep_name']);
    $edit_sem_name  = get_safe_value($_POST['edit_sem_name']);
    $eid = get_safe_value($_POST['eid']);
    if($eid > 0){
        mysqli_query($con,"update subjects set sub_name = '$edit_sub_name', dept_id = '$edit_dep_name', sem_id = '$edit_sem_name' where id = '$eid' ");
    }
    redirect('subjects.php');
}
?>

 <!-- Edit Modal -->

                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <form method="POST">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Edit Subjects Name</h5>
                                      
                                    
                                  </div>
                                  <div class="modal-body">
                                    <input type="text" class="form-control fwb" name="edit_sub_name" placeholder="Enter Subject Name" required="required" id="sub_name" value="<?php echo $edit_row['sub_name']?>">
                                    <div class="form-group row mt-3">
                                        <div class="col-12">
                                            <select class="select2 form-select shadow-none fwb"
                                                style="width: 100%; height:36px;" required="required" name="edit_dep_name">
                                                <option value="">Select Department</option>
                                            <?php 
                                            $res1 = mysqli_query($con,"select * from departments");
                                            while($dept = mysqli_fetch_assoc($res1)){
                                            	if($dept['id'] == $edit_row['dept_id']){
                                            		$selected = "selected";
                                            ?>
                                                <option value="<?php echo $dept['id']?>" <?php echo $selected?> ><?php echo $dept['dept_name']?></option>
                                            <?php }else{ ?>
                                            	<option value="<?php echo $dept['id']?>" ><?php echo $dept['dept_name']?></option>
                                            <?php } }?>	
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-12">
                                            <select class="select2 form-select shadow-none fwb"
                                                style="width: 100%; height:36px;" required="required" name="edit_sem_name">
                                                <option value="">Select Semester</option>
                                            <?php 
                                            $res2 = mysqli_query($con,"select * from semesters order by id asc");
                                            while($sem = mysqli_fetch_assoc($res2)){
                                            	if($sem['id'] == $edit_row['sem_id']){
                                            		$selected = "selected";
                                            ?>
                                                <option value="<?php echo $sem['id']?>" <?php echo $selected?> ><?php echo $sem['sem_name']?></option>
                                            <?php }else{ ?>
                                            	<option value="<?php echo $sem['id']?>" ><?php echo $sem['sem_name']?></option>
                                            <?php } }?>	
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="eid" id="eid" value="<?php echo $edit_row['id']?>">
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
                                    <input type="submit" class="btn btn-primary" name="save_changes" value="Save Changes">
                                  </div>
                                </div>
                            </form>
                          </div>
                        </div>
                     <!-- End Edit Modal-->

        <script type="text/javascript">
        	$(document).ready(function(e){
            $("#editModal").modal("show");
        });
        	$("#close").on("click",function(e){
        		window.location.href = "../admin/subjects.php";
        	});
        </script>   


<?php include('footer.php'); ?>