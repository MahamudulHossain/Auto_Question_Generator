<?php
session_start();
include('../database.inc.php');
include('../function.inc.php');
include('../constant.inc.php');

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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../admin/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../admin/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../admin/assets/css/custom.css">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="index.php">
                        <b class="logo-icon ps-2">
                            <img src="../admin/assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                        </b>
                        <span class="logo-text">
                            <img src="../admin/assets/images/logo-text.png" alt="homepage" class="light-logo" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                       <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../admin/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown" style="margin-left:-240px;margin-top: 3px; padding: 5px">
                                
                                <a class="dropdown-item" href="logout.php"><i
                                        class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="departments.php" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span
                                    class="hide-menu">Departments</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="semester.php" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span
                                    class="hide-menu">Semester</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="subjects.php" aria-expanded="false"><i class="mdi mdi-book"></i><span
                                    class="hide-menu">Subjects</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="setters.php" aria-expanded="false"><i class="fas fa-cogs"></i><span
                                    class="hide-menu">Question Setter</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="retrievers.php" aria-expanded="false"><i class="mdi mdi-developer-board"></i><span
                                    class="hide-menu">Question Retriever</span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">