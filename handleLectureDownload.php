<?php
ob_start();
$con =  new mysqli("localhost", "root", "", "learning_management_system");



/*if(isset($_GET['id'])){

    $id = $_GET['id'];
    $stat = $con->prepare("SELECT  * from lecture where CourseCode  = ?");
    $stat->bind_param(1,$id);
    $stat->execute();
    $data = $stat->fetch();


    $file = 'upload/'.$data['lecturefileName'];


    if(file_exists($file)){
        // header('Content-Description: '.$data  )
        header('Content-Type: application/octet-stream');

        header('Content-Description: File-Transfer');
         header('Content-Disposition: attachement; filename=' . basename($filepath));

        header('Expires : 0');

        header('Cache-Control: must-revalidate');
         header('Pragma: Public');

         header('Content-Length:' .filesize('upload/' . $file['lecturefileName']));

       readfile('download/' . $file['lecturefileName']);

       
        mysqli_query($con,$updatQuery);
       exit;
    }else{
        echo "<script>alert('error! ');</script>";

    }
}*/










 if(isset($_GET['id']))
 {
     $id = $_GET['id'];
    $sql = "SELECT * FROM lecture WHERE CourseCode = $id";
    $result = mysqli_query($con, $sql) or die( mysqli_error($con));
    $file = mysqli_fetch_assoc($result);
    $filepath = 'upload/' .$file['lecturefileName'];

     if(file_exists($filepath))
    {
        header('Content-Type: application/octet-stream');

        header('Content-Description: File-Transfer');
         header('Content-Disposition: attachement; filename=' . basename($filepath));

        header('Expires : 0');

        header('Cache-Control: must-revalidate');
         header('Pragma: public');

         header('Content-Length:' .filesize('upload/' . $file['lecturefileName']));

       readfile('upload/' . $file['lecturefileName']);

       
        mysqli_query($con,$updatQuery);
       exit;
    }
 }


?>