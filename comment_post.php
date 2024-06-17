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

    <title>Podcast - Posting</title>
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
  <div class="container px-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <!-- Logo Image -->
      <a class="navbar-brand" href="dashboard.php">
        <img src="images/logo.png" alt="Logo" style="height: 50px; width: auto;">
      </a>
      <!-- End Logo Image -->
      <a class="navbar-brand" href="index.php">PodConversation</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="genre.php">Genre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="comments.php">Comments</a>
        </li>
		
		
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-capitalize" href="profile.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $user['firstname'].' '.$user['lastname']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" data-bs-toggle="dropdown" aria-labelledby="navbarDarkDropdownMenuLink">
            <li class="nav-item"><a class="dropdown-item" class="nav-link" href="profile.php"><i class="bi bi-person-lines-fill"></i> Profile</a></li>
            <li class="nav-item"><a class="dropdown-item" class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
				
      </ul>
    </div>
  </div>
</nav>
    
	

    <!--------------------COMMENTS-------------------------------------------------------------------------------->
	
<div class="container pt-5 mt-5">
	<div class="row mt-5 pt-5">

	<?php
if(isset($_POST['post_user'])){
	$id = $_POST['id'];
	$id = stripcslashes($id); 
	$comment = $_POST['comment'];
	date_default_timezone_set('Asia/Manila');
	$date = date("h:i:sa");
	$t = date('F d Y', strtotime($date)).' '.date("h:i:a");
	$ins = "INSERT INTO comment (`id`,`comment`,`date`) VALUES ('".$id."','".$comment."','".$t."')";
	$con->query($ins);
	$_SESSION['success'] = 'Comment has Successfully Added!!';
	//header('location: comments.php');
	//header("refresh: 2;"); 
	echo'
	<div class="col-4">
	</div>
	<div class="col-4">
<button class="btn btn-primary" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Please wait while loading...
</button>
	</div>
	<div class="col-4">
	</div>
	';
	header("refresh: 1; url = comments_user.php"); 
    
	//exit;
    
}if(isset($_POST['post'])){
	$id = $_POST['id'];
	$id = stripcslashes($id); 
	$comment = $_POST['comment'];
	date_default_timezone_set('Asia/Manila');
	$date = date("h:i:sa");
	$t = date('F d Y', strtotime($date)).' '.date("h:i:a");
	$ins = "INSERT INTO comment (`id`,`comment`,`date`) VALUES ('".$id."','".$comment."','".$t."')";
	$con->query($ins);
	$_SESSION['success'] = 'Comment has Successfully Added!!';
	//header('location: comments.php');
	//header("refresh: 2;"); 
	echo'
	<div class="col-4">
	</div>
	<div class="col-4">
<button class="btn btn-primary" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Please wait while loading...
</button>
	</div>
	<div class="col-4">
	</div>
	';
	header("refresh: 1; url = comments.php"); 
    
	//exit;
    
}
?>
	</div>
</div>
	
    <!---------------------------------------------------------------------------------------------------->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script type="text/javascript">
       // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
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