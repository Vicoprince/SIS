<?php
session_start();

include('../assets/studentheader.php');
include_once("../dbcon.php");

if(isset($_SESSION['sid'])){

	$subject_title = "";

	$sql = "SELECT * FROM `data`";
	$result = mysqli_query($con , $sql)->fetch_assoc();

	$co_code 		= $result['co_code'];

	// $subject_title 	= $result['subject_title'];
	$subject_unit 	= $result['subject_unit'];

	$_SESSION['co_code'] 			= $co_code;
	$_SESSION['subject_title'] 		= $subject_title;

    $_SESSION['subject_unit'] 		= $subject_unit;



} 
// else {
// 	header('Location: logout.php');
//     exit(); 
// }

?>
<!-- <link rel="stylesheet" href="../css/adminstyle.css"> -->

<div class="content">

	<div>
	<div class="upper">
		<h2>Course Info</h2>
	
		<table>
		
			<form action="user_subject.php" method="POST">
				<tr>
					<td><input type="text" name="name" placeholder="Enter Course Name" style="margin-right: 30px; padding: 5px 30px;"></td>
					
				
					<td>
						<select name="unit" style=" padding: 5px 80px;">
							<option value="">Units</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</td>

					<td colspan="2"><input type="submit" name="submit" value="Search" style="margin-left: 30px; padding: 5px 10px;"></td>

					<td><input type="submit" name="all" value="View all courses" style="margin-left: 245px; padding: 5px 10px;"> <td>
				</tr>
			</form>
		</table>
	</div>



		
	<div class="header">
		<h2>My Courses</span></h2>
	</div>

	<table  width="90%" align="center" style="margin-top: 30px; text-align: center;">
	<tr style="background-color: #800000; color: #fff;">
		<th>#</th>
		<th>Course Code</th>
		<th>Course Title</th>
		<th>Course Unit</th>
		<th></th>

	</tr>

	<?php 
	if (isset($_POST['submit']))
	{
		include("../dbcon.php");

		$name = $_POST['name'];
		$unit = $_POST['unit'];

		$qry = "SELECT * FROM `data` WHERE `subject_title` LIKE '%$name%' AND `unit` = '$subject_unit'";

		$run = mysqli_query($con,$qry);

		if(mysqli_num_rows($run)<1){
			echo "<tr><td colspan = 5>No Record Found<td><tr>";
		}
		
		else{
			$count = 0;
			while($data = $run->fetch_assoc()){
				$count++;
				$id = $data['id'];
				?>

				<tr>
					<td><?php echo $count; ?></td>
					<td><?php echo $data['co_code']; ?></td>
					<td><?php echo $data['subject_title']; ?></td>
					<td><?php echo $data['subject_unit']; ?></td>
				</tr>

				<?php
			}
		}
	}

	elseif (isset($_POST['all']))
	{
		include("../dbcon.php");
		$qry = "SELECT * FROM `data`";

		$run = mysqli_query($con,$qry);
		$count = 0;
		while($data = $run->fetch_assoc()){
				$id = $data['id'];
				$count++;
				?>

				<tr>
				<td><?php echo $count; ?></td>
					<td><?php echo $data['co_code']; ?></td>
					<td><?php echo $data['subject_title']; ?></td>
					<td><?php echo $data['subject_unit']; ?></td>
				</tr><?php

	}
}

?>



</div>
</html>