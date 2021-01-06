<?php
    $con =  new mysqli("localhost","root","","learning_management_system");
    if(isset($_POST['save']))
    {
        $filename = $_FILES['myfile']['name'];
        $dest = 'upload/' .$filename;
        $extenstion = pathinfo($filename,PATHINFO_EXTENSION);
        $file = $_FILES['myfile']['tmp_name'];
        if(!in_array($extenstion, ['zip', 'pdf']))
        {
            echo "You can only upload zip, pdf!";
        }
        else {
            if(move_uploaded_file($file, $dest))
            {
                $sql = "INSERT INTO lecture (lecturefileName) VALUES('$filename')";
                if (mysqli_query($con,$sql))
                {
                    echo "file uploaded succesfully";
                    
                }
                else
                {
                    echo "Failed to upload file";
                }
            }
        }
    }

?>