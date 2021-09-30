<?php

include('../assets/studentheader.php');

$course_title = "";
$co_code = "";
$course_unit = "";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<!-- <link rel="stylesheet" type="text/css" href="../css/adminstyle.css"> -->

	</head>
<body>

	<?php

	if (isset($_SESSION['message'])):
		

	?>

	<div class="alert alert-<?=$_SESSION['msg_type']?>">

	<?php
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	?>

	</div>
	<?php endif ?>

	<!-- <nav class="navbar navbar-default">
		<div class="container-fluid">
		</div>
	</nav> -->
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">My Courses</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add Course</button>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>Course_Title</th>
					<th>Course_Code</th>
					<th>Course_Unit</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include_once("../dbcon.php");


					$query = mysqli_query($con, "SELECT * FROM `data`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
					
				?>
				<tr>
					<td><?php echo $fetch['course_title']?></td>
					<td><?php echo $fetch['co_code']?></td>
					<td><?php echo $fetch['subject_unit']?></td>
					<td><a href="save_course.php?edit=<?php echo $fetch['id']; ?>" class="btn btn-info" >Edit</a> / <a href="delete_course.php?delete=<?php echo $fetch['id']; ?>" class="btn btn-danger" >Drop</a></td>
					
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
<div class="modal fade" id="form_modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="save_course.php">
				<div class="modal-header">
					<h3 class="modal-title">Add Course</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Course_Title</label>
							<input type="text" class="form-control" name="course_title"  required="required"/>
						</div>
						<div class="form-group">
							<label>Course_Code</label>
							<input type="text"  class="form-control" name="co_code"  required="required"/>
						</div>
						<div class="form-group">
							<label>Course_Unit</label>
							<input type="number"  class="form-control" name="course_unit"  required="required"/>
						</div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="../js/jquery-3.2.1.min.js"></script>	
<script src="../js/bootstrap.js"></script>	
</body>	
</html>