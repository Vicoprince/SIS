<?php

    session_start();

	include_once("../dbcon.php");

	$course_title = "";
	$co_code = "";
	$course_unit = "";
	
	if(ISSET($_POST['save'])){
		$course_title = $_POST['course_title'];
		$co_code = $_POST['co_code'];
		$course_unit = $_POST['course_unit'];
		
		$query = mysqli_query($con, "INSERT INTO `data` VALUES('', '$course_title', '$co_code', '$course_unit')") or die(mysqli_error($con));
		header("location: course_add.php");
	}

    if (ISSET($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = mysqli_query($con, "DELETE FROM `data` WHERE id = $id") or die(mysqli_error($con));

        $_SESSION['message'] = "Record as been deleted!";
        $_SESSION['msg_type'] = "danger";

        header("location: course_add.php");
    }


	if (ISSET($_GET['edit'])) {
		$id = $_GET['edit'];
        $query = mysqli_query($con, "SELECT * FROM `data` WHERE id = $id") or die(mysqli_error($con));
		if (count($query)==1){
			$row = $query->fetch_array();
			$course_title = $row['course_title'];
			$co_code = $row['co_code'];
			$course_unit = $row['subject_unit'];
			
			
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<!-- <link rel="stylesheet" type="text/css" href="../css/adminstyle.css"> -->

	</head>
<body>
	<h1>Hello world</h1>
	<div class = "row">
		<form action="" method="post" class = "form-group">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div class="form-group">
					<label>Course_Title</label>
					<input type="text" class="form-control" name="course_title" value="<?php echo $course_title?>" required="required"/>
				</div>
				<div class="form-group">
					<label>Course_Code</label>
					<input type="text"  class="form-control" name="co_code"  value="<?php echo $co_code ?>" required="required"/>
				</div>
				<div class="form-group">
					<label>Course_Unit</label>
					<input type="number"  class="form-control" name="course_unit"  value="<?php echo $course_unit ?>" required="required"/>
				</div>
			</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" name="update"><span class="glyphicon glyphicon-save"></span> Update</button>
			</div>
			</div>
		</form>
	</div>
</body>
</html>


<?php

	if (isset($_POST['update'])){
		$course_title = $_POST['course_title'];
		$co_code = $_POST['co_code'];
		$course_unit = $_POST['course_unit'];				
	
		$query = mysqli_query($con, "UPDATE `data` SET `course_title` = '$course_title', `co_code` = '$co_code', `subject_unit` = '$course_unit'  WHERE id = $id") or die(mysqli_error($con));

		$_SESSION['message'] = "Record as been updated!";
        $_SESSION['msg_type'] = "warning";
		
		header('location: course_add.php');
	}


?>