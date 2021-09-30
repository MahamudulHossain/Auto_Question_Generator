<?php
session_start();
  include 'database.inc.php';
  include 'function.inc.php';

  $msg = "";
  $login_msg = "";
  if(isset($_POST['register'])){
    $user_name = get_safe_value($_POST['user_name']);
    $user_email = get_safe_value($_POST['user_email']);
    $user_password = md5($_POST['user_password']);
    $user_role = get_safe_value($_POST['user_role']);
    $added = date('Y-m-d');
    $check = mysqli_query($con,"select user_email,user_role from users");
    while($row = mysqli_fetch_assoc($check)){
      if($row['user_email'] == $user_email && $row['user_role'] == $user_role){
        $msg = "This Email is already registered";
      }
    }
    if($msg == ""){
      mysqli_query($con,"insert into users(user_name,user_email,user_password,user_role,time) values('$user_name','$user_email','$user_password','$user_role','$added') ");
      $msg = "Registration successful. Please wait for the admin approval";
    }
    
  }


  if(isset($_POST['login'])){
    $email = get_safe_value($_POST['email']);
    $password = md5($_POST['password']);
    $role = get_safe_value($_POST['role']);

    $check = mysqli_query($con,"select * from users where user_email='$email' and user_password = '$password' and user_role = '$role' and status = 1");
   
      if(mysqli_num_rows($check)>0){
        $row=mysqli_fetch_assoc($check);
        $_SESSION['IS_LOGIN']='yes';
        $_SESSION['USER_NAME']=$row['user_name'];
        $_SESSION['USER_ROLE']=$row['user_role'];
        redirect('index.php');
    }else{
        $login_msg="Please enter valid login details";
    }
  }


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="mt-5">
            <h1><center>WELCOME TO THE QUESTION GENERATOR SYSTEM</center></h1>
      </div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="required" name="email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="required" name="password" />
              </div>
              <div>
                <select class="form-control" required="required" name="role">
                          <option>Select Role</option>
                          <option>Setter</option>
                          <option>Retriever</option>
                </select>
              </div>
              <div class="regBtn">
                <input type="submit" name="login" value="Log in" class="btn btn-primary">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>
                <div>
                  <h3 class="reg_msg"><?php echo $login_msg; ?></h3>
                </div>
                <div class="clearfix"></div>
                <br />
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="" method="POST">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="required" name="user_name" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="required" name="user_email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="required" name="user_password"/>
              </div>
              <div>
                <select class="form-control" required="required" name="user_role">
                          <option value="">Select Role</option>
                          <option value="setter">Setter</option>
                          <option value="retriever">Retriever</option>
                </select>
              </div>
              <div class="regBtn">
                <input type="submit" name="register" value="Register" class="btn btn-primary">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>
                <h3 class="reg_msg"><?php echo $msg; ?></h3>
                <div class="clearfix"></div>
                <br />
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
