
<?php
session_start();

if(isset($_SESSION['studentprogrm'])){
session_destroy();
header('location:index.php');
}else{

    echo "<script>alert('logon first!!');</script>";
}
?>
