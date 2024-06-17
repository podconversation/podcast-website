<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Podcast - Register</title>
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
      <a class="navbar-brand" href="register.php">
        <img src="images/logo.png" alt="Logo" style="height: 50px; width: auto;">
      </a>
      <!-- End Logo Image -->
      <a class="navbar-brand" href="register.php">PodConversation</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="register.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="register.php">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
    <!-----------Add Video----------------------------------------------------------------------------------------->
	<?php
	include('connect.php'); 
	 if(isset($_POST['register'])){
		$lastname = $_POST['lastname'];
		$lastname = trim($lastname);
		$lastname = stripcslashes($lastname);
		$lastname = mysqli_real_escape_string($con, $lastname);
		$firstname = $_POST['firstname'];
		$firstname = trim($firstname);
		$firstname = stripcslashes($firstname);
		$firstname = mysqli_real_escape_string($con, $firstname);
		$username = $_POST['username'];
		$username = trim($username);
		$username = stripcslashes($username);
		$username = mysqli_real_escape_string($con, $username);
		$password = $_POST['password'];
		$password = trim($password);
		$password = stripcslashes($password);
		$password = mysqli_real_escape_string($con, $password);
		$sql= "INSERT INTO user(`firstname`,`lastname`,`username`,`password`)VALUES('$firstname','$lastname','$username','$password')";
		$con->query($sql);
		$_SESSION['success'] = 'Registered Successfully!!';
		header('location: login.php');
	 }
	?>	 
<!---------------------------------------------------------------------------------------------------->
<!------------------------------------------------>
<!--Login form starts-->
<section class="container-fluid pt-5">
    <!--row justify-content-center is used for centering the login form-->
    <section class="row justify-content-center pt-5">
      <!--Making the form responsive-->
        <section class="col-12 col-sm-6 col-md-8 col-lg-4 border rounded bg-light pt-3 shadow-sm">
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
          <form action="" method="POST" class="form-container needs-validation" novalidate>
		  <h3 class="text-center font-weight-bold"> Register </h3>
			<!--Binding the label and input together-->
            <div class="form-group">
                <label for="validationCustomUsername" class="form-label">Lastname</label>
                <div class="input-group has-validation">	
                    <input type="text" name="lastname" placeholder="Enter Lastname" class="form-control" id="validationCustomLastname" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Lastname is Required.
                    </div>
                </div>
            </div>
			<!--Binding the label and input together-->
            <div class="form-group">
                <label for="validationCustomUsername" class="form-label">Firstname</label>
                <div class="input-group has-validation">
                    <input type="text" name="firstname" placeholder="Enter Firstname" class="form-control" id="validationCustomFirstname" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Firstname is Required.
                    </div>
                </div>
            </div>
            <!--Binding the label and input together-->
            <div class="form-group">
                
                <label for="validationCustomUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <input type="text" name="username" placeholder="Enter username" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                        Username is Required.
                    </div>
                </div>
            </div>
            <!--Binding the label and input together-->
            <div class="form-group">
                <label for="InputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password" required>
                <div class="invalid-feedback">
                    Password is Required.
                </div>
            </div>
            <div class="d-grid gap-4 col-12 mx-auto mt-4">
            <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
            <div class="form-footer text-center">
                <p class="fst-italic"> Already have account? <a href="login.php" class="text-decoration-none">Login</a></p>
                <p><a href="index.php" class="text-decoration-none">Back to Home</a></p>
            </div>
            
            </div>
          </form>
        </section>
    </section>
</section>
  
    <!---------------------------------------------------------------------------------------------------->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript">
      window.onload = () => {
        const myModal = new bootstrap.Modal('#staticBackdrop');
        myModal.show();
      }

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