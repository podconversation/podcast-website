<?php 
include('session.php'); 
if(!isset($_SESSION['userid'])){
  header('location: dashboard.php');
}   
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Podcast - Genre</title>
    <link href="css/style.css" rel="stylesheet">
  </head>
  <style>
    .alert{
      text-align: center;
      color: white;
      font-size: 150%;
    }
  </style>
  <body>
  <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
  <div class="container px-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <!-- Logo Image -->
      <a class="navbar-brand" href="dashboard_user.php">
        <img src="images/logo.png" alt="Logo" style="height: 50px; width: auto;">
      </a>
      <!-- End Logo Image -->

      <a class="navbar-brand" href="genre_user.php">PodConversation</a>
       <!-- Search bar -->
      <form class="d-flex mx-3" action="genre_user.php" method="GET">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard_user.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="genre_user.php">Genre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_user.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comments_user.php">Comments</a>
        </li>
    
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-capitalize" href="profile.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $user['firstname'].' '.$user['lastname']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li class="nav-item"><a href="profile_user.php" class="nav-link"><i class="bi bi-person-lines-fill"></i> Profile</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
    <div class="container-fluid mt-5">
    <div class="container pt-1">
      <div class="row">
        <div class="col-12">
          <div class="row align-items-start">
            <div class="col">
            </div>
          </div>
          <?php
          include 'connect.php';

          // Handling search query
          if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = mysqli_query($con, "SELECT * FROM videos WHERE description LIKE '%$search%'");
          } else {
            $sql = mysqli_query($con, "SELECT * FROM videos");
          }
          $result = mysqli_num_rows($sql); 

          if($result > 0) {
          ?>
            <div class="container pt-2">
              <div class="row">
              <?php while($row = mysqli_fetch_assoc($sql)){ ?>
                <div class="col-4">
                  <div class="card mt-3">
                    <div class="card">
                      <p class="card-header bg-danger text-light"><i class="bi bi-youtube"></i> <?php echo $row["description"]; ?></p>
                      <div class="card-body text-center ratio ratio-16x9">
                        <?php echo $row["link"]; ?>
                      </div>
                    </div>
                  </div>    
                </div>
              <?php } ?>  
              </div>
            </div>
          <?php               
          } else {
            echo '<div class="alert">No video has been embedded.</div>';
          }
          ?>  
        </div>
      </div>
    </div>
  </div>
  
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script type="text/javascript">
  (function () {
    'use strict'

    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
      }, false)
    })
  })()
  </script>
  </body>
</html>
