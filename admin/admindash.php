<?php 
	session_start();
		if(isset($_SESSION['uid'])){
		echo "";
		}

		else{
			header('location:../adminlogin.php');
		}

	include('../assets/adminheader.php');
?>

<div class="content">
  <div class="upper">
  	<h2>Student Info</h2>
  
	<table>
	
  		<form action="admindash.php" method="POST">
  			<tr>
		  		<td><input type="text" name="name" placeholder="Enter Student Name" style="margin-right: 30px; padding: 5px 30px;"></td>
		  		
		  	
		  		<td>
		  			<select name="program" style=" padding: 5px 80px;">
						<option value="">Program</option>
						<option value="CSE">CSE</option>
						<option value="CHE">CHE</option>
						<option value="BOP">BOP</option>
						<option value="DMT">DMT</option>
						<option value="CNSS">CNSS</option>
					</select>
				</td>

		  		<td colspan="2"><input type="submit" name="submit" value="Search" style="margin-left: 30px; padding: 5px 10px;"></td>

		  		<td><input type="submit" name="all" value="View all students" style="margin-left: 245px; padding: 5px 10px;"> <td>
		  	</tr>
		</form>
	</table>
</div>

<table  width="90%" align="center" style="margin-top: 30px; text-align: center;">
	<tr style="background-color: #800000; color: #fff;">
		<th>No</th>
		<th>Image</th>
		<th>Matric No</th>
		<th>Name</th>
		<th>Contact</th>
		<th>Program</th>
		<th></th>

	</tr>

<?php 
	if (isset($_POST['submit']))
	{
		include("../dbcon.php");

		$name = $_POST['name'];
		$program = $_POST['program'];

		$qry = "SELECT * FROM `student2` WHERE `fname` LIKE '%$name%' AND `program` = '$program'";

		$run = mysqli_query($con,$qry);

		if(mysqli_num_rows($run)<1){
			echo "<tr><td colspan = 8>No Record Found<td><tr>";
		}
		else{
			$count = 0;
			while($data = $run->fetch_assoc()){
				$count++;
				$id = $data['id'];
				?>

				<tr>
					<td><?php echo $count; ?></td>
					<td><img src="../dataimg/<?php echo $data['image'];?>" style = "max-width: 70px"/></td>
					<td><?php echo $data['roll_no']; ?></td>
					<td><?php echo $data['fname']." ".$data['lname']; ?></td>
					<td><?php echo $data['mobile']; ?></td>
					<td><?php echo $data['program']; ?></td>
					<td><a href="info.php?id=<?php echo $id ?>">View</a></td>
				</tr>

				<?php
			}
		}
	}

	elseif (isset($_POST['all']))
	{
		include("../dbcon.php");
		$qry = "SELECT * FROM `student2`";

		$run = mysqli_query($con,$qry);
		$count = 0;
		while($data = $run->fetch_assoc()){
				$id = $data['id'];
				$count++;
				?>

				<tr>
					<td><?php echo $count; ?></td>
					<td><img src="../dataimg/<?php echo $data['image'];?>" style = "max-width: 70px"/></td>
					<td><?php echo $data['roll_no']; ?></td>
					<td><?php echo $data['fname']." ".$data['lname']; ?></td>
					<td><?php echo $data['mobile']; ?></td>
					<td><?php echo $data['program']; ?></td>
					<td><a href="info.php?id=<?php echo $id ?>">View</a></td>
				</tr><?php

	}
}

?>


</table>
</div>



 </body>
  </html>