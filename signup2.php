<?php 
ob_start();
 ?>
<DOCTYPE!>
	<html>

	<head>
		<title>Student Regtion Form</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/signup2.css">
	</head>

	<body>
	<script src="sweetalert/jquery-3.6.0.min.js"></script>
	<script src="sweetalert/sweetalert2.all.min.js"></script>


		<div class="topnav">
			<a href="index.php" id="s">Student Management</a>
			<a href="signup2.php">Signup</a>
			<a href="adminlogin.php">Admin</a>
			<a href="studentlogin.php">Student</a>
		</div>


		<div class="wrap">


			<div class="container">
				<form action="signup2.php" method="post" enctype="multipart/form-data">
					<h3 align="center"
						style="color: #fff; background-color: #800000; padding: 7px 200px; border-radius: 15px;">STUDENT
						REGISTRATION</h3>


					<label>First Name</label>
					<input type="text" name="fname" maxlength="30" placeholder="First Name" required>

					<label>Last Name</label>
					<input type="text" name="lname" maxlength="30" placeholder="Last Name" required>



					<!----- Date Of Birth ---------------- Gender---------------------------------------->


					<label>Date OF Birth</label>
					<input type="date" name="dob">
					<br>

					<label>Gender</label>
					Male <input type="radio" name="gender" value="Male" required>
					Female <input type="radio" name="gender" value="Female" required>
					<br>


					<!----- Email Id -----------------------Mobile Number----------------------------------->


					<label>Email</label>
					<input type="text" name="email" maxlength="100" placeholder="Email" required>

					<LABEL>Contact</LABEL>

					<input type="text" name="mobile" maxlength="11" placeholder="Mobile Number" required>


					<!----- Program ---------------------------------------------------------->



					<label>Program</label>

					<select name="program">
						<option value="">Program</option>
						<option value="CSE">CSE</option>
						<option value="CHE">CHE</option>
						<option value="BOP">BOP</option>
						<option value="DMT">DMT</option>
						<option value="CNSS">CNSS</option>
					</select>




					<!-- Roll No. -->
					<label>Registration No.</label>
					<input type="text" name="roll_no" maxlength="6" placeholder="Registration No." required>



					<!-- ------------image---------------- -->

					<label>Image</label>
					<input type="file" name="image">

					<br><br>
					<!----- Submit and Reset ------------------------------------------------->
					<center><input type="submit" name="submit" id="btn" value="Register" href="password.php"></center>
					<!-- <input type="reset" value="Reset"> -->


				</form>

			</div>
		</div>

		<script>
            $('#btn').on('click', function() {

                Swal.fire
                ({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Account Created!'
                })

            })

        </script>
	</body>

	</html>

	<?php 
	if (isset($_POST['submit'])){

		include('dbcon.php');


		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$dob = $_POST['dob'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$gender = $_POST['gender'];
		$program = $_POST['program'];
		$roll_no = $_POST['roll_no'];

		$imgname = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];


		move_uploaded_file($tempname, "dataimg/$imgname");

		$qry = "SELECT * FROM `student2` WHERE `roll_no` = '$roll_no'";
		 
		$result = mysqli_query($con,$qry);
		$row = mysqli_num_rows($result);

		if($row > 0){

			echo '<script type="text/javascript">alert("Registration No. already exists!");</script>';
		
		}

		else{

			$qry = "INSERT INTO `student2`(`fname`, `lname`, `dob`, `email`, `mobile`, `gender`, `program`, `roll_no`, `image`, `password`, `ques`, `answer`)


				VALUES  ('$fname', '$lname', '$dob', '$email', '$mobile', '$gender', '$program', '$roll_no','$imgname','','','')";
		
			$run = mysqli_query($con,$qry);


			if($run == true){

				header('location:password.php/?roll_no='.$roll_no);
			
			
			}
		
			else{
				die ("Error fetching file".mysqli_errno($con));
			
		}
	}
}

	ob_flush();
 ?>