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

          <div class="row">
            <div class="col-md-3">
              <div class="card bg-success text-white">
                <div class="card-body">
                  <h4><i class='fas fa-user-graduate' style='font-size:40px'></i>&nbsp;All Students</h4>
                  <hr style="background-color:white">
                  <h5>
                    <b>45</b>
                  </h5>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card bg-danger text-white">
                <div class="card-body">
                  <h4><i class='fas fa-user-alt-slash' style='font-size:40px'></i>&nbsp;Deactivate</h4>
                  <hr style="background-color:white">
                  <h5>
                    <b>45</b>
                  </h5>
                </div>
              </div>
            </div>
        </div>

        <br><br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Roll</th>
                    <th scope="col">Status</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                <?php all_student(); ?>
            </tbody>
        </table>


    </section>
</div>