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
    $LectNo = $_POST['LectureNo'];
    $TechID = $_POST['TeacherID'];
    $course = $_POST['CourseCode'];
    $utime = $_POST['UploadTime'];
    $LecTopic = $_POST['LectureTopic'];

    // $size = $_FILES['myfile']['size'];
    if (!in_array($extenstion, ['zip', 'pdf', 'pptx', 'docx'])) {
        echo "You can only upload zip, pdf!";
    } else {
        if (move_uploaded_file($file, $dest)) {

            // $q = "SELECT * from assignment where  AssignmentNo = $AssNo";
            // $res =  (mysqli_query($con, $q));
            // $row = mysqli_fetch_array($res);

            $q1 = "SELECT * from lecture where CourseCode = $course and LectureNo = $LecNo";
            $res1 = (mysqli_query($con, $q1));

                if (mysqli_num_rows($res1)) {

                    echo "<script>alert('Lecture Already Uploaded');</script>";
                } else {
                    $sql = "INSERT INTO lecture (LectureNo ,CourseCode ,LectureTopic,  UploadDateTime,  lecturefileName) VALUES($AssNo,$course,$LecTopic,$utime,'$filename')";
                    if (mysqli_query($con, $sql)) {
                    } else {
                        echo "<script>alert('Failed to upload File');</script>";
                    }
                }
            
            // }
        }   
    }



}



?>
