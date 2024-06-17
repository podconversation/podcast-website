<?php
if(isset($_POST['delete'])){
$id = $_POST['id']; 
$sql="DELETE FROM about WHERE id=".$_GET['archiveAdmin'];
	if($con->query($que)){
		$_SESSION['success'] = 'Successfully Deleted! '.$title;
	}
		header('location: about.php?Deleted_Successfully');
}
?>