<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Podcast - Login</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

<!-- PHP Functions -->
<?php

include('connect.php'); 
if(isset($_POST['login'])){
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $secretKey = '6Lfm3PApAAAAAG7etHWDPLlHB668sIWwl7lVW_3E'; // replace with your actual secret key
    $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
    $response = json_decode($request);

    if ($response->success) {
        $username = $_POST['username'];  
        $password = $_POST['password']; 
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  

        $sql = mysqli_query($con,"select * from user where username = '$username' and password = '$password'"); 
        $result = mysqli_num_rows($sql); 

        if($result > 0) {
            while($row = mysqli_fetch_array($sql)){
                $_SESSION['userid']=$row['id'];
                $_SESSION['logged']="true";
                if($row['id'] == 1){
                    header('location: dashboard.php');
                } else {
                    header('location: dashboard_user.php');
                }
            }
        } else {
            $_SESSION['error'] = 'Username and Password incorrect!';
        }
    } else {
        $_SESSION['error'] = 'Please fill everything';
    }
}
?>
<!------------------------------------------------>
  <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
  <div class="container px-5">    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <!-- Logo Image -->
      <a class="navbar-brand" href="login.php">
        <img src="images/logo.png" alt="Logo" style="height: 50px; width: auto;">
      </a>
      <!-- End Logo Image -->
      <a class="navbar-brand" href="login.php">PodConversation</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    

<!------------------------------------------------>
<!--Login form starts-->
<section class="container-fluid pt-5">
    <!--row justify-content-center is used for centering the login form-->
    <section class="row justify-content-center pt-5">
      <!--Making the form responsive-->
        <section class="col-12 col-sm-6 col-md-8 col-lg-4 border rounded bg-light pt-3 shadow-sm">
          <form action="" method="POST" class="form-container needs-validation" id="loginForm" novalidate>
            <!--Binding the label and input together-->
            <div class="form-group">
                <h3 class="text-center font-weight-bold"> Login </h3>
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
               <div class="g-recaptcha" data-sitekey="6Lfm3PApAAAAAE0VMZKa4wAwfr2doPgc5lbmIen6"></div>
               <div class="invalid-feedback d-block" id="recaptcha-error" style="display: none;">
                    Please fill everything
                </div>
            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
            <div class="form-footer text-center">
                <?php
                    if(isset($_SESSION['error'])){
                      echo "                    
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['error']."
                          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                      ";
                      unset($_SESSION['error']);
                    }
                ?>
                <p class="fst-italic"> Don't have an account? <a href="register.php" class="text-decoration-none">Sign Up</a></p>
                <p><a href="index.php" class="text-decoration-none">Back to Home</a></p>
            </div>
            
            </div>
          </form>
        </section>
    </section>
</section>
  
    <!---------------------------------------------------------------------------------------------------->


    <!-- Option 2: Separate Popper and Bootstrap JS -->
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
        var recaptchaResponse = grecaptcha.getResponse();
        if (!form.checkValidity() || recaptchaResponse.length === 0) {
          event.preventDefault()
          event.stopPropagation()
          document.getElementById('recaptcha-error').style.display = 'block';
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
  </script>
  </body>
</html>
