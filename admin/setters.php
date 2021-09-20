<?php 
    include('top.php');
    if(isset($_GET['did']) && $_GET['did'] > 0){
        $delete_id = get_safe_value($_GET['did']);
        mysqli_query($con,"Delete from users where id='{$delete_id}'");
        redirect('setters.php');
    }
    if(isset($_GET['stat'])){
        $eid = get_safe_value($_GET['eid']);
        if($_GET['stat'] == 0){
            mysqli_query($con,"update users set status='0' where id='{$eid}' ");
        }else if($_GET['stat'] == 1){
            mysqli_query($con,"update users set status='1' where id='{$eid}' ");
        }
        redirect('setters.php');
    }
 ?>

                 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row band">
                                    <div class="col-12 fw">
                                        <center>QUESTION SETTER LIST</center>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                            <table class="table">
                               <?php $res = mysqli_query($con,"select * from users where user_role='setter' ");
                                if(mysqli_num_rows($res)){
                               ?> 
                                <thead class="thead-dark text-white">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $i=1;
                                    while($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <tr>
                                        <td><?php echo $i++?></td>
                                        <td><?php echo $row['user_name']?></td>
                                        <td><?php echo $row['user_email']?></td>
                                        <td>
                                            <?php if($row['status'] == 0){?>
                                                <a href="?stat=1&eid=<?php echo $row['id']?>"><button type="button" class="btn btn-warning">Deactive</button></a>
                                            <?php }else{?>
                                                 <a href="?stat=0&eid=<?php echo $row['id']?>"><button type="button" class="btn btn-success">Active</button></a>
                                            <?php } ?>    
                                            <a href="?did=<?php echo $row['id']?>"><button type="button" class="btn btn-danger text-white">Delete</button></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            <?php }else{?>
                                <h3>No Data Found</h3>
                            <?php } ?>
                            </table>
                           </div> 
                        </div> 

<?php include('footer.php'); ?>