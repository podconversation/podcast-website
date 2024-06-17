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
  <body>
  <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
  <div class="container px-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    	<!-- Logo Image -->
      <a class="navbar-brand" href="comments.php">
        <img src="images/logo.png" alt="Logo" style="height: 35px; width: 10;">
      </a>
      <!-- End Logo Image -->
      <a class="navbar-brand" href="comments_user.php">PodConversation</a>
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
          <a class="nav-link active" href="comments_user.php">Comments</a>
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
 
    
	

    <!--------------------COMMENTS-------------------------------------------------------------------------------->
	
	<div class="container mt-5">
		

		<div class="row">
		<h1 class="text-light">COMMENTS</h1><hr>
			<div class="col-8">
				<div class="card border-dark">
				  <h5 class="card-header text-white bg-primary">News Feed for Comment's</h5>
				  <div class="card-body" style="max-height:75vh; overflow:auto;">
					<!-----------------user comment------------------------------------------------------------>
	<?php

	//$sql = mysqli_query($con,"SELECT user.id,user.firstname,user.lastname,comment.id,comment.comment,comment.date FROM `user` INNER JOIN `comment` ON user.id=comment.id");
	$sql = mysqli_query($con,"SELECT * FROM `user` INNER JOIN `comment` ON user.id=comment.id ORDER	BY comment_id DESC");
	$result = mysqli_num_rows($sql); 

		if($result > 0)
		{
		  while($row = mysqli_fetch_array($sql)){

	?>
<div class="card shadow-sm mt-2">
  <div class="card-header text-capitalize fw-bold bg-dark text-light">
	<div class="container">
		<div class="row">
			<div class="col-8 text-start"><?php echo $row['firstname'].' '.$row['lastname']; ?></div>
			<div class="col-4 text-end">	
				<?php
				$id = $row['id'];
				$userid = $_SESSION['userid'];
				if($id == $userid){
					//echo 'delete';
				echo'
				<form action="" method="POST">
				<input type="hidden" class="form-control" name="id" value="'.$row["comment_id"].'">
				<button type="submit" name="delete" class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>	
				</form>
				
				';		
				}
if(isset($_POST['delete'])){
$id = $_POST['id']; 
$que="DELETE FROM comment WHERE comment_id='".$id."'";
	if($con->query($que)){
		$_SESSION['success'] = 'Comment Successfully Deleted! '.$title;
	}
	header('location: comments_user.php');

}


				?>
			</div>
		</div>
	</div>
	
	
  </div>
  <div class="card-body">
	<blockquote class="blockquote mb-0">
	  <p class="text-capitalize"><?php echo $row['comment']; ?>
	  </p>
	  <footer class="blockquote-footer text-capitalize">Posted: <cite title="Source Title">
	  <?php 
		//date_default_timezone_set('Asia/Manila');
		//$date = date("h:i:sa");
		//echo date('F d, Y', strtotime($date)).' '.date("h:i:a");
		?>
		<?php echo $row['date'];
	  ?></cite></footer>
	  
	</blockquote>
	
  </div>
</div>
<?php
	  }	}
?>
					<!----------------------------------------------------------------------------->

				  </div>
				</div>
			</div>
			<div class="col-4">
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
			<form action="comment_post.php" method="POST">
				<div class="card border-dark">
				  <h5 class="card-header">Leave a comment</h5>
				  <div class="card-body">
					<h5 class="card-title text-capitalize text-primary"><i class="bi bi-person-circle"></i> 
					<?php echo $user['firstname'].' '.$user['lastname']; ?></h5>
					<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
					<p class="card-text">
					<div class="form-floating">
					  <textarea class="form-control" placeholder="Leave a comment here" name="comment" id="floatingTextarea"></textarea>
					  <label for="floatingTextarea">Message</label>
					</div>
					<div class="d-grid gap-2 ms-0 pt-3">
					  <button type="submit" name="post_user" class="btn btn-primary">Post a Comment</button>
					</div>
					</p>
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