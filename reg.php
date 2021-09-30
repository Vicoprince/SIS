<DOCTYPE!>
<html>
<head>
<title>Student Registration Form</title>
</head>
 
<body>
	<h3 align="center">STUDENT REGISTRATION</h3>


<form action="reg.php" method="post" enctype="multipart/form-data">

 
			First Name
			<input type="text" name="fname" maxlength="30"> <br>

			Last Name<
			<input type="text" name="lname" maxlength="30"> <br>
		

 
<!----- Date Of Birth ---------------- Gender---------------------------------------->
		
			Date Of Birth
		 
			<input type="date" name="dob"> <br>

			
			
			Male <input type="radio" name="gender" value="Male"> <br>
			Female <input type="radio" name="gender" value="Female"> <br>
			
 
<!----- Email Id -----------------------Mobile Number----------------------------------->
		
			Email Id
			<input type="text" name="email" maxlength="100" > <br>

			Mobile Number
			
			<input type="text" name="mobile" maxlength="11" > <br>
		

<!----- Program ---------------------------------------------------------->
		
			Program
			
			CSE
			<input type="radio" name="program" value="BBA">
			BOP
			<input type="radio" name="program" value="BSCS">
			CHE
			<input type="radio" name="program" value="ACF">
			DMT
			<input type="radio" name="program" value="AML">
			
			<br>

<!-- ------------image---------------- -->

<input type="file" name="image""> <br>

<!----- Submit and Reset ------------------------------------------------->
			<input type="submit" name = "submit"value="Submit">
			<input type="reset" value="Reset">
			
</form>

 
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
		$address = $_POST['address'];
		$cnic = $_POST['cnic'];
		$zip = $_POST['zip'];
		$country = $_POST['country'];
		$domicile = $_POST['domicile'];
		$ssc_board = $_POST['ssc_board'];
		$ssc_perc = $_POST['ssc_perc'];
		$ssc_year = $_POST['ssc_year'];
		$hsc_board = $_POST['hsc_board'];
		$hsc_perc = $_POST['hsc_perc'];
		$hsc_year = $_POST['hsc_year'];
		$program = $_POST['program'];
		$roll_no = $_POST['roll_no'];

		$imgname = $_FILES['image']['name'];
		$tempname = $_FILES['image']['tmp_name'];

		move_uploaded_file($tempname, "dataimg/$imgname");


		$qry = "INSERT INTO `student2`(`id`, `fname`, `lname`, `dob`, `email`, `mobile`, `gender`, `program`, `image`, `password`)


				VALUES  ('','$fname', '$lname', '$dob', '$email', '$mobile', '$gender', '$program','$imgname','student')" ;
		
		$run = mysqli_query($con,$qry);

		if($run==true){
			
			header('location:studentlogin.php');
			
		}
		
		else{
			?><script>alert('Failed');</script>
			<?php
		}
		
	}
 ?>