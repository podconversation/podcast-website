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

    <title>Podcast - About_edit</title>
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>
<?php
include 'connect.php';
if(isset($_POST['delete'])){
$id = $_POST['id']; 
$delq="DELETE FROM videos WHERE video_id='".$id."'";
	if($con->query($delq)){
		$_SESSION['success'] = 'Video has Successfully Deleted!';
	}
		header('location: genre.php');
}


if(isset($_POST['edit'])){
$id = $_POST['id'];  
$sql = mysqli_query($con,"select * from videos where video_id = '$id'"); 
$result = mysqli_num_rows($sql); 

	if($result > 0)
	{
	  while($row = mysqli_fetch_array($sql)){

		echo '
		
		<form action="" method="POST">
		<input type="hidden" name="id" value="'.$id.'">';
		echo'
		  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-light	">
        <h5 class="modal-title text-light" id="staticBackdropLabel"><i class="bi bi-youtube"></i> Edit Video</h5>
      </div>
		  <div class="modal-body">
		  
		  
			<div class="form-floating mb-3">
			  <input type="text" name="about_title" class="form-control" id="floatingvideodescription" value="'.$row['description'].'">
			  <label for="floatingvideodescription">Title</label>
			</div>
			<div class="form-floating">
			  <textarea class="form-control" placeholder="Leave a comment here" name="link" id="floatingTextarea" style="height: 200px">'.$row['link'].'</textarea>
			  <label for="floatingTextarea">Description</label>
			</div>
			
			
		  </div>
		  <div class="modal-footer">
			<a href="genre.php" class="btn btn-secondary"> <i class="bi bi-arrow-left-circle"></i> Back</a>
			<button type="submit" name="update" class="btn btn-dark"> <i class="bi bi-pencil-square"></i> Update</button>
		  </div>
	  </form>
    </div>
  </div>
		
		';
		
		}
	}
}

if(isset($_POST['update'])){

		$id = $_POST['id'];
		$title = $_POST['about_title'];
		$title = trim($title);
		$title = stripcslashes($title);
		$title = mysqli_real_escape_string($con, $title);
		
		$link = $_POST['link'];  
		$link = trim($link);
		$link = stripcslashes($link);
		$link = mysqli_real_escape_string($con, $link);
		
$que= "UPDATE `videos` SET description='".$title."',link='".$link."' WHERE video_id='".$id."'";
	if($con->query($que)){
		$_SESSION['success'] = 'Video Successfully Updated!';
	}
		header('location: genre.php');
}
?>
    

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