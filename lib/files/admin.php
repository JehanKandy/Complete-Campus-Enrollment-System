<?php 
  include_once("../function/function.php");

  if(empty($_SESSION['loginSession'])){
      header('location:../auth/login.php');
  }

  include_once("../views/header.php");
  include_once("../views/nav_loged.php");
?>

<div class="admin-content">
    <section class="sidebar">
        <ul class="nav-bar">
            <li><a href="#"><i class='fas fa-tachometer-alt' style='font-size:20px'></i>&nbsp;&nbsp;Dashboard</a></li>
            <li><a href="admin/student.php"><i class='fas fa-user-graduate' style='font-size:20px'></i>&nbsp;&nbsp;Student</a></li>
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
          <h1 class="display-4">Welcome to Dashboard</h1>
          <hr>

          <div class="row">
            <div class="col-md-3">
              <div class="card bg-primary text-white">
                <div class="card-body">
                  <h4><i class='fas fa-user-graduate' style='font-size:40px'></i>&nbsp;Students</h4>
                  <hr style="background-color:white">
                  <h5>
                    <b><?php count_student(); ?></b>
                  </h5>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card bg-success text-white">
                <div class="card-body">
                  <h4><i class='fas fa-chalkboard-teacher' style='font-size:40px'></i>&nbsp;Lecturers</h4>
                  <hr style="background-color:white">
                  <h5>
                    <b><?php count_teacher(); ?></b>
                  </h5>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card bg-warning text-white">
                <div class="card-body">
                  <h4><i class='fas fa-user-tag' style='font-size:40px'></i>&nbsp;Staff</h4>
                  <hr style="background-color:white">
                  <h5>
                    <b><?php count_staff(); ?></b>
                  </h5>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="card bg-info text-white">
                <div class="card-body">
                  <h4><i class='fas fa-user-tie' style='font-size:40px'></i>&nbsp;Admins</h4>
                  <hr style="background-color:white">
                  <h5>
                    <b><?php count_admin(); ?></b>
                  </h5>
                </div>
              </div>
            </div>
          </div>          
        </div>

        <div class="sub-row2">
          <div class="row">
              <div class="col-md-3">
                <div class="card bg-success text-white">
                  <div class="card-body">
                    <h4><i class='fas fa-school' style='font-size:40px'></i>&nbsp;Faculties</h4>
                    <hr style="background-color:white">
                    <h5>
                      <b>10</b>
                    </h5>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="card bg-primary text-white">
                  <div class="card-body">
                    <h4><i class='fas fa-book-open' style='font-size:40px'></i>&nbsp;Subjects</h4>
                    <hr style="background-color:white">
                    <h5>
                      <b>95</b>
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
                        <?php admin_deactive_users(); ?>
                    </h5>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </section>
</div>
