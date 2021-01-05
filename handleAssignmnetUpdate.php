<?php

// session_start();
// $var = unserialize($_SESSION['']);

// echo '$var';

    $con =  new mysqli("localhost","root","","learning_management_system");
    // if (isset($_GET["data"])) {
    //     $data = $_GET["data"];
    // } else {
    // }

    if(isset($_POST['update']))
    {
        $filename = $_FILES['myfile']['name'];
        $dest = 'upload/' .$filename;
        $extenstion = pathinfo($filename,PATHINFO_EXTENSION);
        $file = $_FILES['myfile']['tmp_name'];
        $AssNo = $_POST['AssignmentNo'];
        $StuID = $_POST['StudentID'];
        // $size = $_FILES['myfile']['size'];
        if(!in_array($extenstion, ['zip', 'pdf']))
        {
            echo "You can only upload zip, pdf!";
        }
        else {
            if(move_uploaded_file($file, $dest))
            {
                $q = "SELECT * FROM uploadassignment where AssignmentNo = $AssNo";
                $res =  mysqli_query($con,$q);
                    
                //     echo '<script>alert("Dear Student Assignment is Already Uploaded")</script>';
                // }else{

                    // $sql = "UPDATE uploadassignment 
                    //         SET Assignmentfile = '$filename'
                    //         ";

                    if(mysqli_num_rows($res)!=0){
                        $query = "DELETE FROM uploadassignment
                        WHERE AssignmentNo = $AssNo";
                        

                    }                    

                    if (mysqli_query($con,$query) )
                    {
                        $query1 = "INSERT INTO uploadassignment (StudentID,AssignmentNo,Assignmentfile) VALUES($StuID,$AssNo,'$filename')";
                        if (mysqli_query($con,$query1) )
                        {
                            
                            
                        }
                        else
                        {
                            echo "Failed to upload file";
                        }
                        
                    }
                    else
                    {
                        echo "Failed to upload file";
                    }
                }

            }
        }
    // }
