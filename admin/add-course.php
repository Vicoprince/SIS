

<?php 
	session_start();
		if(isset($_SESSION['uid'])){
		echo "";
		}

		else{
			header('location:../adminlogin.php');
		}

	include('../assets/adminheader.php');
    include_once("../dbcon.php");


    $box1 = "";
    $box2 = "";
    $box3 = "";
    $box4 = "";
    $box5 = "";
    $ctitle = "";
    $c_code = "";
    $msg = "";

    if (isset($_POST["submit"]))
    {
        $box1 =  $_POST["box1"];
        $box2 =  $_POST["box2"];
        $box3 =  $_POST["box3"];
        $box4 =  $_POST["box4"];
        $box5 =  $_POST["box5"];
        $ctitle = $_POST["ctitle"];
        $c_code = $_POST["c_code"];


        if($box4 == "First Semester")
        {
            $sqlquery = "INSERT INTO `first_semester_courses`(`session`, `term`, `coursetitle`, `course_id`, `c_unit`, `semester`, `level`) VALUES ( '$box1', '$box2', '$ctitle', '$c_code', '$box3', '$box4', '$box5')";
            if (!mysqli_query($con, $sqlquery)){
                die ("Error fetching file".mysqli_errno($con));
            }
            $msg = "Course has been successfully added";
        }
        else
        {
            $sqlquery = "INSERT INTO `course`(`session`, `programme`, `course_title`, `course_code`, `course_unit`, `semester`, `level`) VALUES ( '$box1', '$box2', '$ctitle', '$c_code', '$box3', '$box4', '$box5')";
            if (!mysqli_query($con, $sqlquery)){
                die ("Error fetching file".mysqli_errno($con));
            }
            $msg = "Course has been successfully added";
        }

       

    }

?>

<link rel="stylesheet" href="../css/adminstyle.css">
<script src="sweetalert/jquery-3.6.0.min.js"></script>
<script src="sweetalert/sweetalert2.all.min.js"></script>




<div class="content">
   
    <div class="header">
        <h1>Add Courses</h1>
    </div>

    <hr>
    <br>
    <br>

    <form action="add-course.php" method="post">
        <div class="input-group">
            <select name="box1" >
                <option value="">Choose A Session </option>
                <option value="2021/2022">2021/2022</option>
                <option value="2020/2021">2020/2021</option>
                <option value="2019/2020">2019/2020</option>
                <option value="2018/2019">2018/2019</option>
            </select>
        </div>

        <div class="input-group">
            <select name="box2" >
                <option value="">Choose A Programme </option>
                <option value="Full-Time">Full-Time</option>
                <option value="Part-Time">Part-Time</option>
            </select>
        </div>

        <div>
            <input type="text" name="ctitle" placeholder="  Course Title" >
        </div>

        <div>
            <input type="text" name="c_code" placeholder="  Course Code" >
        </div>

        <div class="input-group">
            <select name="box3" >
                <option value="">Choose Course Unit</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="input-group">
            <select name="box4" >

                <option value="">Choose A Semester </option>
                <option value="First Semester">First Semester</option>
                <option value="Second Semester">Second Semester</option>
            </select>
        </div>

        <div class="input-group">
            <select name="box5" >
                <option value="">Choose A Level </option>
                <option value="ND 1">ND 1</option>
                <option value="ND 2">ND 2</option>
            </select>
        </div>

        <button name="submit" id="btn">Submit</button>


        <script>
            $('#btn').on('click', function() {

                Swal.fire
                ({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Course Added!'
                })

            })

        </script>

    </form>
</div>


</html>