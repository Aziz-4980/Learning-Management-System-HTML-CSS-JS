<?php

// session_start();
// $var = unserialize($_SESSION['']);

// echo '$var';

$con =  new mysqli("localhost", "root", "", "learning_management_system");
// if (isset($_GET["data"])) {
//     $data = $_GET["data"];
// } else {
// }

if (isset($_POST['upload'])) {
    $filename = $_FILES['myfile']['name'];
    $dest = 'upload/' . $filename;
    $extenstion = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['myfile']['tmp_name'];
    $AssNo = $_POST['AssignmentNo'];
    $TechID = $_POST['TeacherID'];
    $course = $_POST['CourseCode'];
    // $utime = $_POST['UploadTime'];
    $dtime = $_POST['DueTime'];
    $AssTopic = $_POST['AssignmentTopic'];


    $utime =  date_default_timezone_get();

    // $size = $_FILES['myfile']['size'];
    if (!in_array($extenstion, ['zip', 'pdf'])) {
        echo "You can only upload zip, pdf!";
    } else {
        if (move_uploaded_file($file, $dest)) {

            // $q = "SELECT * from assignment where  AssignmentNo = $AssNo";
            // $res =  (mysqli_query($con, $q));
            // $row = mysqli_fetch_array($res);

            $q1 = "SELECT * from assignment where CourseCode = $course and AssignmentNo = $AssNo";
            $res1 = (mysqli_query($con, $q1));

                if ( mysqli_num_rows($res1) > 0) {

                    echo "<script>alert('Assignment Already Uploaded');</script>";
                } else {

                    $sql = "INSERT INTO assignment (AssignmentNo,CourseCode,AssignmentTopic,UploadDateTime,DueDateTime,SubmissionDateTime,AssignmentFile) VALUES($AssNo,$course,$AssTopic,$utime,$dtime,'','$filename')";
                    
                    // echo $sql;
                    mysqli_query($con, $sql);    
                
                }
            }
        
            
        }   
    }



?>
