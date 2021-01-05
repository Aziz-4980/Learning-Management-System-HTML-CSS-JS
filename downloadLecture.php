<?php

$con =  new mysqli("localhost","root","","learning_management_system");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = " SELECT * FROM lecture WHERE CourseCode = $id ";
        $result = mysqli_query($conn,$query);
        
        $row = mysqli_fetch_array($result);

        
        header ("content-type: ".$row['LectureFile']);
        echo $row['LectureFile'];

        // $stat = $con->prepare("select * from lecture where CourseCode = ?");
        // $stat->bind_param(1,$id);
        // $stat->execute();

        // $data = $stat->fetch();

        // $file = 'media/'/.$data['LecturefFile'];


    }


?>
