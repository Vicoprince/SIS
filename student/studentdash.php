<?php
		session_start();
				if(isset($_SESSION['sid'])){
					echo "";
				}

				else{
					header('location:../studentlogin.php');
				}

		include('../assets/studentheader.php');		

?>


<div class="content" style="text-align: left;">

<?php
include("../dbcon.php");

		$id = $_SESSION['sid'];

		$qry = "SELECT * FROM `student2` WHERE `id` = '$id'";

		$run = mysqli_query($con,$qry);

		if(mysqli_num_rows($run)<1){
			echo "<tr><td colspan = 8>No Record Found<td><tr>";
		}
		else{
			$count = 0;
			while($data = $run->fetch_assoc()){
				$count++;
				?>

				<table  style="margin-top: 20px; margin-left: 80px;" cellpadding="7px">
					
						
						<tr>
							<td colspan="2"><img src="../dataimg/<?php echo $data['image'];?>" style = "max-width: 150px; margin-top: 30px;"/><br><br></td>
						</tr>

						<tr>
							<th>Registration No.</th>
							<td><?php echo $data['roll_no']; ?></td>
							<th>Name</th>
							<td><?php echo $data['fname']." ".$data['lname']; ?></td>
						</tr>

						<tr>
							<th>Date OF Birth</th>
							<td><?php echo $data['dob']; ?></td>
							<th>Email</th>
							<td><?php echo $data['email']; ?></td>
						</tr>

						<tr><th>Mobile</th><td><?php echo $data['mobile']; ?></td>
							<th>Gender</th><td><?php echo $data['gender']; ?></td></tr>
						<tr> 
							<th>Program</th><td><?php echo $data['program']; ?></td>
						</tr>
						
				</table>
				<?php
			}
		}
?>


</div>
	
</body>
</html>
