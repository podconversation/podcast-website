<?php 
include('session.php'); 
if(!isset($_SESSION['userid'])){
    header('location: dashboard.php');
}

// Check if the form is submitted
if(isset($_POST['update'])){
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $userid = $_SESSION['userid'];
    
    // Update the user's profile information in the database
    $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id='$userid'";
    $result = mysqli_query($con, $sql);
    
    if($result){
        // Update session variables with new values
        $_SESSION['user']['firstname'] = $firstname;
        $_SESSION['user']['lastname'] = $lastname;
        $_SESSION['user']['email'] = $email;
        
        // Redirect to profile page with success message
        header('location: profile.php?success=Profile updated successfully');
    } else {
        // Redirect to profile page with error message
        header('location: profile.php?error=Error updating profile');
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

    <title>Edit Profile</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body">
                        <?php if(isset($_GET['success'])): ?>
                            <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
                        <?php elseif(isset($_GET['error'])): ?>
                            <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $_SESSION['user']['firstname']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $_SESSION['user']['lastname']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
