<?php

    session_start();

	include_once("../dbcon.php");
	
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



?>