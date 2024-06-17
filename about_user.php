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

    <title>Podcast - About</title>
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
      <a class="navbar-brand" href="dashboard_user.php">
        <img src="images/logo.png" alt="Logo" style="height: 50px; width: auto;">
      </a>
      <!-- End Logo Image -->
      <a class="navbar-brand" href="about_user.php">PodConversation</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="about_user.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="genre_user.php">Genre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="about_user.php">About Us</a>
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
 
<!---------------------------------------------------------------------------------------------------->
		<div class="container-fluid mt-5">
		<div class="container pt-5">
			<div class="row">
				<div class="col-12">
					<div class="row align-items-start">
		<div class="col-2">
		</div>
		<div class="col-8">

<?php
if(isset($_SESSION['success'])){
  echo "					
	<div class='alert alert-success alert-dismissible fade show' role='alert'>".$_SESSION['success']."
	  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
	</div>
  ";
  unset($_SESSION['success']);
}
?>
					
	
	
    <!---------------------------------------------------------------------------------------------------->

    <!-----------------------------TABLE----------------------------------------------------------------------->

<?php
include 'connect.php';
$sql = mysqli_query($con,"select * from about"); 
$result = mysqli_num_rows($sql); 

if($result > 0)
{

?>	
<?php while($row = mysqli_fetch_assoc($sql)){ ?>
<div class="card mb-3">
  <div class="card-header bg-primary text-light">
    <h5><?php echo $row["title"]; ?></h5>
  </div>


	<div class="card-body">
		<p class="card-text">
	  <?php echo $row["description"]; ?>
	

	</div>
</div>

	<?php } ?>	
<?php 						  
}else{
	echo 'No video has embeded.';
}
?>	

		</div>
		<div class="col-2">
		</div>
</div>
	
	
    <!----------------TABLE END------------------------------------------------------------------------------------>
    <!---------------------------------------------------------------------------------------------------->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script type="text/javascript">

 
 //=====================================================================================================
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