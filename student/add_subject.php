<?php
session_start();

include_once("../dbcon.php");

$co_code = "";
$subject_title = "";
$subject_unit = "";

if (isset($_POST["submit"])) {
    $co_code =  $_POST["co_code"];
    $subject_title =  $_POST["subject_title"];
    $subject_unit =  $_POST["subject_unit"];

    $sqlquery = "INSERT INTO `data`(`co_code`, ` subject_title`, `subject_unit`) VALUES ('$co_code', '$subject_title', '$subject_unit')";
        if (!mysqli_query($con, $sqlquery))
        {
            die ("Error fetching file".mysqli_errno($con));
        }
        else{
            $msg = "Course has been successfully added";
        }
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | Add subject</title>

<link rel="stylesheet" href="../css/student.css">

</head>

<body>

<script src="../sweetalert/jquery-3.6.0.min.js"></script>
<script src="../sweetalert/sweetalert2.all.min.js"></script>


    <div class="content">
        <form action="add_subject.php" method="post">
            <div class="input-group">
                <input type="text" name="co_code" placeholder="Course Code" maxlenght="6" required>
            </div>

            <div class="input-group">
                <input type="text" name="subject_title" placeholder="Course Title" required>
            </div>

            <div class="input-group">
                <input type="number" name="subject_unit" placeholder="Course Unit" maxlenght="1" required>
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
</body>

</html>