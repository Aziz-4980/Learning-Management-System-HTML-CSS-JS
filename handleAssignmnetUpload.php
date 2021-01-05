<?php

// session_start();
// $var = unserialize($_SESSION['']);

// echo '$var';

$con =  new mysqli("localhost", "root", "", "learning_management_system");
// if (isset($_GET["data"])) {
//     $data = $_GET["data"];
// } else {
// }

if (isset($_POST['save'])) {
    $filename = $_FILES['myfile']['name'];
    $dest = 'upload/' . $filename;
    $extenstion = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['myfile']['tmp_name'];
    $AssNo = $_POST['AssignmentNo'];
    $StuID = $_POST['StudentID'];
    // $size = $_FILES['myfile']['size'];
    if (!in_array($extenstion, ['zip', 'pdf'])) {
        echo "You can only upload zip, pdf!";
    } else {
        if (move_uploaded_file($file, $dest)) {

            $q = "SELECT * from assignment where  AssignmentNo = $AssNo";
            $res =  (mysqli_query($con, $q));
            $row = mysqli_fetch_array($res);

            $q1 = "SELECT * from uploadassignment where StudentID = $StuID and AssignmentNo = $AssNo";
            $res1 = (mysqli_query($con, $q1));

            if (strtotime((new DateTime())->format("Y-m-d H:i:s")) < strtotime($row['DueDateTime'])) {
                if (mysqli_num_rows($res1) != 0) {

                    echo "<script>alert('Assignment Already Uploaded');</script>";
                } else {
                    $sql = "INSERT INTO uploadassignment (StudentID,AssignmentNo,Assignmentfile) VALUES($StuID,$AssNo,'$filename')";
                    if (mysqli_query($con, $sql)) {
                    } else {
                        echo "<script>alert('Failed to upload File');</script>";
                    }
                }
            } else {

                echo "<script>alert('late submission not allowed    ');</script>";
            }
            // }
        }
    }



}



?>
