

<?php

session_start();

include("./Student.php");
  
  
class DBFacadeStudent
{
    
    function getConnection()
    {

        $con =  new mysqli("localhost","root","","learning_management_system");

       if($con == false)
       die ("\n  Database not connected successfully ...");
             
             return $con;

    }


    function StudentLogIn($account)
    {
         $mail=$account->getMail();
         $pwd=$account->getPassword();

         $conn = $this->getConnection();


       $query = " SELECT * FROM Account WHERE Email =  '$mail'AND Type='Student' ";
       $result = mysqli_query($conn,$query);

       if(mysqli_num_rows($result)!= 0 )
       {

           $row = mysqli_fetch_assoc($result);

           if($row['Password']== "$pwd")
           {
              $query2 = " SELECT * FROM student WHERE Email =  '$mail' ";
              $res = mysqli_query($conn,$query2);

              $row = mysqli_fetch_assoc($res);

               $student = new Student($row['StudentID'], $row['DeptNo'], $row['Email'], $row['SemesterID'] ,$row['StudentName'],$row['Program'],$row['SemesterNo']);
            //   $student->get;

            // echo $row['StudentID'];
            // $student->Display();
            // $prog = $student->getProgram();
            // $deptNo = $student->getDeptNo();             
               // $student->setID($mail);
            $id = $student->getStudentID();
            //    echo "$id";
            // session_destroy();

               $_SESSION['studentProgram'] = serialize($id);
               // $_SESSION['studentDept'] = serialize($deptNo);




                              
               // $cookie_name = "id";
               // $cookie_value = "$id";
               // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

            
            
             header("location: ../student.php");
                    

           }


           else
           {
                 echo "Incorrect Password.........!!<br>";

           }


       }


       else
       {
          echo "Invalid Account.........!!<br>";
       }
        
    }

   

}
  




?>


