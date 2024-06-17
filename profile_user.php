<?php 
include('session.php'); 
if(!isset($_SESSION['userid'])){
    header('location: dashboard.php');
}  

// Fetch user data from the database
$user_id = $_SESSION['userid'];
$sql = mysqli_query($con, "SELECT * FROM `user` WHERE id='$user_id'");
$user = mysqli_fetch_assoc($sql);

if(isset($_POST['update_profile'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update user data in the database
    $update_sql = "UPDATE `user` SET firstname='$firstname', lastname='$lastname', username='$username', password='$password' WHERE id='$user_id'";
    if(mysqli_query($con, $update_sql)){
        $_SESSION['success'] = 'Profile updated successfully!';
        header('location: profile_user.php');
    } else {
        $_SESSION['error'] = 'Failed to update profile!';
    }
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

    <title>Podcast - Profile</title>
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
      <a class="navbar-brand" href="profile_user.php">
        <img src="images/logo.png" alt="Logo" style="height: 35px; width: auto;">
      </a>
      <!-- End Logo Image -->
      <a class="navbar-brand" href="profile_user.php">PodConversation</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard_user.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="genre_user.php">Genre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_user.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comments_user.php">Comments</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-capitalize active" href="profile.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    
    

 <!--------------------PROFILE-------------------------------------------------------------------------------->
    
    <div class="container mt-5 pt-2">
        <div class="row">

        <h1 class="text-light">Profile Information</h1><hr>
            <div class="col-4">
                <div class="card border-dark">
                  <h5 class="card-header text-white bg-primary">PROFILE</h5>
                  <div class="card-body text-center" style="max-height:75vh; overflow:auto;">
                    <!-----------------user comment------------------------------------------------------------>
    <?php

    //$sql = mysqli_query($con,"SELECT user.id,user.firstname,user.lastname,comment.id,comment.comment,comment.date FROM `user` INNER JOIN `comment` ON user.id=comment.id");
    $sql = mysqli_query($con,"SELECT * FROM `user` INNER JOIN `comment` ON user.id=comment.id");
    $result = mysqli_num_rows($sql); 

        if($result > 0)
        {
          while($row = mysqli_fetch_array($sql)){

    ?>

<?php
      }    }
?>
<i class="bi bi-person-circle text-primary" style="font-size: 6rem;"></i>
<h1 class="text-capitalize"><?php echo $user['firstname'].' '.$user['lastname']; ?></h1>
                    <!----------------------------------------------------------------------------->
<!-----------------post comment------------------------------------------------------------>
<?php
if(isset($_POST['post'])){
    $id = $_POST['id'];
    $id = stripcslashes($id); 
    $comment = $_POST['comment'];
    date_default_timezone_set('Asia/Manila');
    $date = date("h:i:sa");
    $t = date('F d Y', strtotime($date)).' '.date("h:i:a");
    $ins = "INSERT INTO comment (`id`,`comment`,`date`) VALUES ('".$id."','".$comment."','".$t."')";
    $con->query($ins);
    $_SESSION['success'] = 'Comment has Successfully Added!!';
    //header('location: comments.php?comment_posted');
}
?>
                  </div>
                </div>
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
            if(isset($_SESSION['error'])){
              echo "                    
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['error']."
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
              ";
              unset($_SESSION['error']);
            }
            ?>
            <form action="" method="POST">
                <div class="card border-dark">
                  <h3 class="card-header bg-primary text-light">Personal Details</h3>
                  <div class="card-body">
                    <table class="table" style="min-height:60vh;">
                    <tr>
                        <td class="col-4">
                            <h5 class="card-title text-capitalize text-dark">
                            Firstname:
                            </h5>
                        </td>
                        <td class="col-8">
                            <input type="text" class="form-control" name="firstname" value="<?php echo $user['firstname']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-4">
                            <h5 class="card-title text-capitalize text-dark">
                            Lastname:
                            </h5>
                        </td>
                        <td class="col-8">
                            <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-4">
                            <h5 class="card-title text-capitalize text-dark">
                            Username:
                            </h5>
                        </td>
                        <td class="col-8">
                            <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-4">
                            <h5 class="card-title text-capitalize text-dark">
                            Password:
                            </h5>
                        </td>
                        <td class="col-8">
                            <input type="password" class="form-control" name="password" value="<?php echo $user['password']; ?>" required>
                        </td>
                    </tr>
                    
                    </table>
                    <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
                  </div>
                </div>
            </form>
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
  </script>
  </body>
</html>
