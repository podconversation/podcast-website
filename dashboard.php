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

    <title>Podcast - Dashboard</title>
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
      <a class="navbar-brand" href="dashboard.php">PodConversation</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="genre.php">Genre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comments.php">Comments</a>
        </li>
		
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-capitalize" href="profile.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $user['firstname'].' '.$user['lastname']; ?>
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
    

    <!---------------------------------------------------------------------------------------------------->
		<div class="container-fluid mt-5">
		<div class="container pt-5">
			<div class="row">
				<div class="col-12">
				<div class="row"><h1 class="text-center text-light large-text"><b>WELCOME TO</b></h1></div>
          <div class="row"><h1 class="text-center text-light large-text"><b>PODCONVERSATION!</b></h1></div><br>

			<div class="row">
   <h5 class="text-light lh-base text-center">
        
        Welcome to our immersive sanctuary of audio exploration, where every click unlocks a gateway to boundless realms of storytelling brilliance. Whether you're a seasoned enthusiast or a curious novice, join our community of avid listeners and passionate creators, as we celebrate the art of storytelling in all its breathtaking glory. So, sit back, plug in your headphones, and prepare to lose yourself in the symphony of voices that grace our digital stage. Welcome to the journey. Welcome to our podcast family.
    </h5>
</div>

				<hr>
					<div class="row">
						<div class="col-12">
							<div class="row">
							  <div class="col-sm-4">
								<div class="card">
								  <div class="card">
									  <h5 class="card-header bg-success text-light">Number of User's</h5>
									  <div class="card-body text-center">
										<h2 class="card-title"> 
<?php
$result1=mysqli_query($con, "SELECT count(*) as u from user");
$data=mysqli_fetch_assoc($result1);
?>	
<button type="button" class="btn btn-success">
 <i class="bi bi-person-check-fill"></i>  User <span class="badge bg-danger"><?php echo $data['u']; ?></span>
</button>
										
										</h2>
									  </div>
									</div>
								</div>
							  </div>
							  <div class="col-sm-4">
								<div class="card">
								  <div class="card">
									  <h5 class="card-header bg-primary text-light">Number of Comment's</h5>
									  <div class="card-body text-center">
										<h2 class="card-title">
<?php
$result1=mysqli_query($con, "SELECT count(*) as t from comment");
$data=mysqli_fetch_assoc($result1);



?>	
<button type="button" class="btn btn-primary">
 <i class="bi bi-chat-dots-fill"></i>  Comments <span class="badge bg-danger"><?php echo $data['t']; ?></span>
</button>
										</h2>
									  </div>
									</div>
								</div>
							  </div>
							  <div class="col-sm-4">
								<div class="card">
								  <div class="card">
									  <h5 class="card-header bg-danger text-light">Number of Video's</h5>
									  <div class="card-body text-center">
										<h2 class="card-title">
<?php
$result1=mysqli_query($con, "SELECT count(*) as v from videos");
$data=mysqli_fetch_assoc($result1);
?>	
<button type="button" class="btn btn-danger">
 <i class="bi bi-youtube"></i>  Video <span class="badge bg-light text-dark"><?php echo $data['v']; ?></span>
</button>
										</h2>
									  </div>
									</div>
								</div>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
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

//-----------------------------------------------------------------------------

var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
  return new bootstrap.Dropdown(dropdownToggleEl)
})
  </script>
  
  
  </body>
</html>