<?php include('top.php');?>

	<div class="row">
		<div class="col-3 mb-5">
	        <div class="bg-dark p-10 text-white text-center">
	            <i class="mdi mdi-chart-bubble mb-1 font-16"></i>
	            <?php 
	            	$res = mysqli_query($con,"select count(dept_name) as Depts from departments ");
	            	$row=mysqli_fetch_assoc($res);
	            ?>
	            <h5 class="mb-0 mt-1"><?php echo $row['Depts'] ?></h5>
	            <small class="font-light">Total Departments</small>
	        </div>
	    </div>
	    <div class="col-3 mb-5">
	        <div class="bg-dark p-10 text-white text-center">
	            <i class="mdi mdi-book mb-1 font-16"></i>
	            <?php 
	            	$res = mysqli_query($con,"select count(sub_name) as subs from subjects ");
	            	$row=mysqli_fetch_assoc($res);
	            ?>
	            <h5 class="mb-0 mt-1"><?php echo $row['subs'] ?></h5>
	            <small class="font-light">Total Subjects</small>
	        </div>
	    </div>
	    <div class="col-3 mb-5">
	        <div class="bg-dark p-10 text-white text-center">
	            <i class=" fas fa-cogs mb-1 font-16"></i>
	            <?php 
	            	$res = mysqli_query($con,"select count(user_name) as setts from users where user_role='setter'");
	            	$row=mysqli_fetch_assoc($res);
	            ?>
	            <h5 class="mb-0 mt-1"><?php echo $row['setts'] ?></h5>
	            <small class="font-light">Total Setters</small>
	        </div>
	    </div>
	    <div class="col-3 mb-5">
	        <div class="bg-dark p-10 text-white text-center">
	            <i class="fas fa-address-book mb-1 font-16"></i>
	            <?php 
	            	$res = mysqli_query($con,"select count(user_name) as retts from users where user_role='retriever'");
	            	$row=mysqli_fetch_assoc($res);
	            ?>
	            <h5 class="mb-0 mt-1"><?php echo $row['retts'] ?></h5>
	            <small class="font-light">Total Retrievers</small>
	        </div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-lg-12">
	        <div class="card">
	            <div class="card-body">
	                <h4 class="card-title">Latest Setters</h4>
	            </div>
	            <div class="comment-widgets scrollable">
	                <?php $res = mysqli_query($con,"select * from users where user_role='setter' and status='0' ");
                                if(mysqli_num_rows($res)){
                                	while($row = mysqli_fetch_assoc($res)){
                               ?> 
	                <div class="d-flex flex-row comment-row">
	                    <div class="comment-text w-100">
	                        <h6 class="font-medium"><?php echo $row['user_name']?></h6>
	                        <span class="mb-3 d-block"><?php echo $row['user_email']?></span>
	                        <div class="comment-footer">
	                            <span class="text-muted float-end"><?php echo $row['time']?></span>
	                            Status : <button type="button" class="btn btn-warning btn-sm text-white">Deactive</button>
	                        </div>
	                    </div>
	                </div>
	                <?php } }else{?>
                          <h3>No Data Found</h3>
                     <?php } ?>
	            </div>
	        </div>
	    </div>     
    </div>

    <div class="row">
	    <div class="col-lg-12">
	        <div class="card">
	            <div class="card-body">
	                <h4 class="card-title">Latest Retrievers</h4>
	            </div>
	            <div class="comment-widgets scrollable">
	                <?php $res = mysqli_query($con,"select * from users where user_role='retriever' and status='0' ");
                                if(mysqli_num_rows($res)){
                                	while($row = mysqli_fetch_assoc($res)){
                               ?> 
	                <div class="d-flex flex-row comment-row">
	                    <div class="comment-text w-100">
	                        <h6 class="font-medium"><?php echo $row['user_name']?></h6>
	                        <span class="mb-3 d-block"><?php echo $row['user_email']?></span>
	                        <div class="comment-footer">
	                            <span class="text-muted float-end"><?php echo $row['time']?></span>
	                            Status : <button type="button" class="btn btn-warning btn-sm text-white">Deactive</button>
	                        </div>
	                    </div>
	                </div>
	                <?php } }else{?>
                          <h3>No Data Found</h3>
                     <?php } ?>
	            </div>
	        </div>
	    </div>     
    </div>

<?php include('footer.php');?>