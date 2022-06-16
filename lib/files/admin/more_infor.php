<?php 
  include_once("../../function/function.php");

  if(empty($_SESSION['loginSession'])){
      header('location:../../auth/login.php');
  }

  include_once("../../views/header.php");
  include_once("../../views/nav_loged_user.php");
?>
<link rel="stylesheet" href="../../../css/style.css">

<div class="admin-content">
    <section class="sidebar">
        <ul class="nav-bar">
            <li><a href="../admin.php"><i class='fas fa-tachometer-alt' style='font-size:20px'></i>&nbsp;&nbsp;Dashboard</a></li>
            <li><a href="#"><i class='fas fa-user-graduate' style='font-size:20px'></i>&nbsp;&nbsp;Student</a></li>
            <li><a href=""><i class='fas fa-chalkboard-teacher' style='font-size:20px'></i>&nbsp;&nbsp;Lecturers</a></li>
            <li><a href=""><i class='fas fa-user-tag' style='font-size:20px'></i>&nbsp;&nbsp;Staff</a></li>
            <li><a href=""><i class='fas fa-school' style='font-size:20px'></i>&nbsp;&nbsp;Faculties</a></li>
            <li><a href=""><i class='fas fa-book-open' style='font-size:20px'></i>&nbsp;&nbsp;Subjects</a></li>
            <li><a href=""><i class='fas fa-user-tie' style='font-size:20px'></i>&nbsp;&nbsp;Admins</a></li>
            <li><a href=""><i class='fas fa-tachometer-alt' style='font-size:20px'></i>&nbsp;&nbsp;Menu1</a></li>
            <li><a href=""><i class='fas fa-tachometer-alt' style='font-size:20px'></i>&nbsp;&nbsp;Menu2</a></li>
            <li><a href=""><i class='fas fa-user-cog' style='font-size:20px'></i>&nbsp;&nbsp;Account Settings</a></li>
        </ul>

    </section>
    <section class="admin-panel">
        <div class="container-fluid">
          <h1 class="display-4">All Students</h1>
          <hr>


    </section>
</div>