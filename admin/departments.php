<?php 
include('top.php');

if(isset($_GET['did']) && $_GET['did']>0){
    $did=get_safe_value($_GET['did']);
    mysqli_query($con,"Delete from departments where id='$did'");
    redirect('departments.php');
}

if(isset($_POST['submit'])){
    $dept_name = get_safe_value($_POST['dept_name']);
    $eid = get_safe_value($_POST['eid']);
    if($eid > 0){
        mysqli_query($con,"update departments set dept_name='$dept_name' where id='$eid'");
    }else{
        mysqli_query($con,"insert into departments(dept_name) values('$dept_name')");
    }
    redirect('departments.php');
}
?>
                
                 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row band">
                                    <div class="col-6 fw">
                                         DEPARTMENTS
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
                                        $res = mysqli_query($con,"select * from departments");
                                        if(mysqli_num_rows($res)>0){?>
                                            <table class="table">
                                <thead class="thead-dark text-white">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
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
                                        <td><?php echo $row['dept_name']?></td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" onclick="editModal('<?php echo $row['id']?>')">Edit</button>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Department Name</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <input type="text" class="form-control fwb" name="dept_name" placeholder="Enter Department Name" required="required" id="dept_name">
                                  </div>
                                    <input type="hidden" name="eid" id="eid">
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
                url : "editDeptData.php",
                type : "POST",
                data : "editID= "+eid,
                success : function(result){
                    var data = jQuery.parseJSON(result);
                    //console.log(data.dept_name);
                    $("#dept_name").val(data.dept_name);
                    $("#eid").val(data.id);
                }
            });
        }
    </script>                              

<?php include('footer.php'); ?>