<?php 
include('session.php'); 
if(!isset($_SESSION['userid'])){
    header('location: dashboard.php');
    exit;
}	  
include 'connect.php'; // Include database connection
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null; // Ensure $user is set

if (!$user || !is_array($user)) {
    // Handle the case where $user is not set or not an array
    $user = ['firstname' => 'Guest', 'lastname' => '']; // Default values
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Podcast - Genre</title>
    <link href="css/style.css" rel="stylesheet">
    <style>
    	.alert{
    		color: white;
    		text-align: center;
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
      <a class="navbar-brand" href="dashboard.php">
        <img src="images/logo.png" alt="Logo" style="height: 50px; width: auto;">
      </a>
      <a class="navbar-brand" href="genre.php">PodConversation</a>
      <form class="d-flex mx-3" method="GET" action="">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="genre.php">Genre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comments.php">Comments</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-capitalize" href="profile.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo htmlspecialchars($user['firstname'].' '.$user['lastname']); ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li class="nav-item"><a href="profile.php" class="nav-link"><i class="bi bi-person-lines-fill"></i> Profile</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid mt-5">
  <div class="container pt-5">
    <div class="row">
      <div class="col-12">
        <div class="row align-items-start">
          <div class="col">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-square"></i> Add video</button>
            <hr>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-danger">
                    <h5 class="modal-title text-light" id="staticBackdropLabel"><i class="bi bi-youtube"></i> Add Video from Youtube</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="" method="POST">
                    <div class="modal-body">
                      <div class="form-floating mb-3">
                        <input type="text" name="videodesc" class="form-control" id="floatingvideodescription" placeholder="Video Description">
                        <label for="floatingvideodescription">Title</label>
                      </div>
                      <div class="form-floating">
                        <input type="text" name="videoembed" class="form-control" id="floatingembedcode" placeholder="Video Embed Code">
                        <label for="floatingembedcode">Video Embed Code</label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="addvideo" class="btn btn-success"> <i class="bi bi-plus-square"></i> Add video</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <?php
            if(isset($_SESSION['success'])){
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>".$_SESSION['success']."
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
              unset($_SESSION['success']);
            }

            // Handling search query
            if (isset($_GET['search'])) {
              $search = $_GET['search'];
              $sql = mysqli_query($con, "SELECT * FROM videos WHERE description LIKE '%$search%'");
            } else {
              $sql = mysqli_query($con, "SELECT * FROM videos");
            }
            $result = mysqli_num_rows($sql); 

            if($result > 0) {
              echo "<div class='container pt-2'><div class='row'>";
              while($row = mysqli_fetch_assoc($sql)){
                echo "<div class='col-4'><div class='card mt-3'><div class='card'><div class='row'>
                <div class='col-8'><p class='card-header'>".$row['description']."</p></div>
                <div class='col-4 text-end'><form action='video_delete.php' method='POST'>
                <input type='hidden' class='form-control' name='id' value='".$row['video_id']."'>
                <button type='submit' name='edit' class='btn btn-outline-dark'><i class='bi bi-pencil-square'></i></button>
                <button type='submit' name='delete' class='btn btn-outline-danger'><i class='bi bi-trash'></i></button></form></div></div>
                <div class='card-body text-center ratio ratio-16x9'>".$row['link']."</div></div></div></div>";
              }
              echo "</div></div>";
            } else {
              echo '<div class="alert"> No video has embeded.</div>';
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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

<?php
if(isset($_POST['addvideo'])){
  $desc = $_POST['videodesc'];
  $embed = $_POST['videoembed'];
  $sql= "INSERT INTO videos(`description`,`link`)VALUES('$desc','$embed')";
  $con->query($sql);
  $_SESSION['success'] = 'Video has Successfully Added!!';
}
?>
