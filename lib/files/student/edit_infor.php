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
            <li><a href="../student.php"><i class='fas fa-tachometer-alt' style='font-size:20px'></i>&nbsp;&nbsp;Dashboard</a></li>
            <li><a href="std_profile.php"><i class='fas fa-user-cog' style='font-size:20px'></i>&nbsp;&nbsp;Account Settings</a></li>
        </ul>

    </section>
    <section class="admin-panel">
        <div class="container-fluid">
          <h1 class="display-4">Update Student Profile - <?php nav_bar_id(); ?></h1>
          <hr>
                <?php get_std_data_update(); ?>



    </section>
</div>