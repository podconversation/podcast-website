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
      <a class="navbar-brand" href="dashboard.php">
        <img src="images/logo.png" alt="Logo" style="height: 50px; width: auto;">
      </a>
      <!-- End Logo Image -->
      <a class="navbar-brand" href="about.php">PodConversation</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="genre.php">Genre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="about.php">About Us</a>
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
				
      </ul>
    </div>
  </div>
</nav>
    <!-----------Add Video----------------------------------------------------------------------------------------->
	<?php
	 if(isset($_POST['addnow'])){
		$title = $_POST['about_title'];
		$title = trim($title);
		$title = stripcslashes($title);
		$title = mysqli_real_escape_string($con, $title);
		$desc = $_POST['about_description'];
		$desc = trim($desc);
		$desc = stripcslashes($desc);
		$desc = mysqli_real_escape_string($con, $desc);
		$sql= "INSERT INTO about(`title`,`description`)VALUES('$title','$desc')";
		$con->query($sql);
		$_SESSION['success'] = 'About Us has Successfully Added!!';
	 }
	?>	 
<!---------------------------------------------------------------------------------------------------->
		<div class="container-fluid mt-5">
		<div class="container pt-5">
			<div class="row">
				<div class="col-12">
					<div class="row align-items-start">
						<div class="col">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-square"></i> Add About Us</button>
						<!-- Button trigger modal -->
						<hr>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-dark" id="staticBackdropLabel"><i class="bi bi-file-earmark-person-fill"></i> Add About Us</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
	  <form action="" method="POST">
		  <div class="modal-body">
			<div class="form-floating mb-3">
			  <input type="text" name="about_title" class="form-control" id="floatingvideodescription" placeholder="About Us Title">
			  <label for="floatingvideodescription">About Us Title</label>
			</div>
			<div class="form-floating">
			  <textarea class="form-control" name="about_description" placeholder="About Us Description" id="floatingTextarea2" style="height: 100px"></textarea>
			  <label for="floatingTextarea2">About Us Description</label>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" name="addnow" class="btn btn-primary"> <i class="bi bi-plus-square"></i> Add Now</button>
		  </div>
	  </form>
    </div>
  </div>
</div>

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
						</div>
					</div>
	
	
    <!---------------------------------------------------------------------------------------------------->

    <!-----------------------------TABLE----------------------------------------------------------------------->

<?php
include 'connect.php';
$sql = mysqli_query($con,"select * from about"); 
$result = mysqli_num_rows($sql); 

if($result > 0)
{

?>
<div class="card">
  <div class="card-header">
    ABOUT US CONTENT
  </div>
  <div class="card-body">
  <div class="table-responsive">
<table class="table  table-striped table-hover">
			<thead>
			<tr>
			  <th scope="col">ID</th>
			  <th scope="col">TITLE</th>
			  <th scope="col text-justify">DESCRIPTION</th>
			  <th scope="col">ACTION</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php while($row = mysqli_fetch_assoc($sql)){ ?>
			<tr>
			
			  <th scope="row"><?php echo $row["about_id"]; ?></th>
			  <td><?php echo $row["title"]; ?></td>
			  <td style="width:60%; text-align:justify;text-justify: inter-word;"><?php echo $row["description"]; ?></td>
			  <td class="text-center">
				  <form action="about_edit.php" method="POST">
					<input type="hidden" class="form-control" name="id" value="<?php echo $row["about_id"]; ?>">
					<button type="submit" name="edit" class="btn btn-outline-dark mb-2"><i class="bi bi-pencil-square"></i></button><br>
					<button type="submit" name="delete" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>	
				  </form>
			  </td>
			</tr>
			<?php } ?>	
			</tbody>
</table>

	</div>
  </div>
</div>


<?php 						  
}else{
	echo 'No video has embeded.';
}
?>	

	
	
	
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