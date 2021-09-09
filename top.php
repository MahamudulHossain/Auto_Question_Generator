<?php

  session_start();
  include('database.inc.php');
  include('function.inc.php');
  include('constant.inc.php');

  $curStr=$_SERVER['REQUEST_URI'];
  $curArr=explode('/',$curStr);
  $cur_path=$curArr[count($curArr)-1];

  if(!isset($_SESSION['IS_LOGIN'])){
    redirect('login.php');
  }

  $page_title='';
  if($cur_path=='' || $cur_path=='index.php'){
      $page_title='Dashboard';
  }elseif($cur_path=='departments.php'){
      $page_title='Manage Departments';
  }elseif($cur_path=='semester.php'){
      $page_title='Manage Semesters';
  }elseif($cur_path=='subjects.php'){
      $page_title='Manage Subjects';
  }elseif($cur_path=='setters.php'){
      $page_title='Manage Question setters';
  }elseif($cur_path=='retrievers.php'){
      $page_title='Manage Question retrievers';
  }    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title><?php echo $page_title ;?></title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="build/css/custom.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Welcome</span></a>
            </div>

            <div class="clearfix"></div>
            <br>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li>
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li><a><i class="fa fa-cog"></i> Chapters <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_chapter.html">Add Chapter</a></li>
                      <li><a href="all_chapter.html">All Chapter</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cubes"></i> Questions <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_question.html">Add Question</a></li>
                      <li><a href="all_question.html">All Questions</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-creative-commons"></i> Questions Generator <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="single_question.html">Single Chapter Question</a></li>
                      <li><a href="multi_question.html">Multi Chapter Question</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['USER_NAME'] ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
              <div class="row">