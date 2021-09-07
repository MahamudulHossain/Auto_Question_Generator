<?php 
include('top.php');

if(isset($_GET['did']) && $_GET['did']>0){
    $did=get_safe_value($_GET['did']);
    mysqli_query($con,"Delete from subjects where id='$did'");
    redirect('subjects.php');
}

if(isset($_POST['submit'])){
    $sub_name  = get_safe_value($_POST['sub_name']);
    $dep_name  = get_safe_value($_POST['dep_name']);
    $sem_name  = get_safe_value($_POST['sem_name']);
    $eid = get_safe_value($_POST['eid']);
    
    mysqli_query($con,"insert into subjects(sub_name,dept_id,sem_id) values('$sub_name','$dep_name','$sem_name')");
    redirect('subjects.php');
}


 ?>
                
                 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row band">
                                    <div class="col-6 fw">
                                        SUBJECTS LIST
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-primary fr" data-toggle="modal" data-target="#exampleModal">
                                                  ADD NEW
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                            <?php 
                                $res = mysqli_query($con,"select subjects.*,departments.dept_name as depName,semesters.sem_name as semName from subjects,departments,semesters where subjects.dept_id = departments.id and subjects.sem_id = semesters.id order by subjects.id desc");
                                        if(mysqli_num_rows($res)>0){?>
                            <table class="table">
                                <thead class="thead-dark text-white">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $i=1;
                                            while($row=mysqli_fetch_assoc($res)){
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['sub_name']?></td>
                                        <td><?php echo $row['depName']?></td>
                                        <td><?php echo $row['semName']?></td>
                                        <td>
                                            <a href="editSubject.php?eid=<?php echo $row['id'] ?>"><button type="button" class="btn btn-info" id="edit_btn">Edit</button>
                                            <a href="?did=<?php echo $row['id']?>"><button type="button" class="btn btn-danger text-white">Delete</button></a>
                                        </td>
                                    </tr>
                                    <?php $i++;
                            }
                                    }else{ ?>
                                    <h2>No Data Found</h2>
                                 <?php } ?>
                                </tbody>
                            </table>
                           </div> 
                        </div> 

                    <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <form method="POST">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Subjects Name</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <input type="text" class="form-control fwb" name="sub_name" placeholder="Enter Subject Name" required="required" id="sub_name">
                                    <div class="form-group row mt-3">
                                        <div class="col-12">
                                            <select class="select2 form-select shadow-none fwb"
                                                style="width: 100%; height:36px;" required="required" name="dep_name">
                                                <option value="">Select Department</option>
                                            <?php 
                                            $res1 = mysqli_query($con,"select * from departments");
                                            while($dept = mysqli_fetch_assoc($res1)){
                                            ?>
                                                <option value="<?php echo $dept['id']?>"><?php echo $dept['dept_name']?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-12">
                                            <select class="select2 form-select shadow-none fwb"
                                                style="width: 100%; height:36px;" required="required" name="sem_name">
                                                <option value="">Select Semester</option>
                                            <?php 
                                            $res2 = mysqli_query($con,"select * from semesters order by id asc");
                                            while($sem = mysqli_fetch_assoc($res2)){
                                            ?>
                                                <option value="<?php echo $sem['id']?>"><?php echo $sem['sem_name']?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="submit" value="Save">
                                  </div>
                                </div>
                            </form>
                          </div>
                        </div>
                     <!-- Modal -->

                    
    <script type="text/javascript">
        function editModal(id){
            var eid = id;
            $.ajax({
                url : "editSubData.php",
                type : "POST",
                data : "editID= "+eid,
                success : function(result){
                    var data = jQuery.parseJSON(result);
                    //console.log(data.sub_name);
                    $("#sub_name").val(data.sub_name);
                    $("#eid").val(eid);
                }
            });
        }

    </script> 
<?php include('footer.php'); ?>