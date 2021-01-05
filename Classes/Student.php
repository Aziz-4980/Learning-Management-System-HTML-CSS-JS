<?php
  
//    include("./DepartManager.php");


     
class Student
{


    //private $StudentNo;
    private $StudentID;
    private    $DeptNo;
    private    $Email;
    private $SemesterID;
    private $StudentName;
    private $Program;
    private $SemesterNo;
   
   
	function __construct($stuId,$no,$mail,$semId,$name,$pro,$semNo)
	{
        $this->StudentID=$stuId;
        $this->DeptNo=$no;
        $this->Email=$mail;
        $this->SemesterID=$semId;
        $this->StudentName=$name;
        $this->Program=$pro;
        $this->SemesterNo=$semNo;

		
	}


/*	function getStudentNo()
	{
		return $this->StudentNo;

	} */

	function setID($iddd){
		$this->SemesterID = $iddd;
	}

	function getStudentName()
	{
		return $this->StudentName;

	}

	function getStudentID()
	{
		return $this->StudentID;

	}

	function getDeptNo()
	{
		return $this->DeptNo;

	}

    
	function getSemesterID()
	{
		return $this->SemesterID;

	}

    
	function getEmail()
	{
		return $this->Email;

	}

    function getProgram()
	{
		return $this->Program;

    }
    
    function getSemesterNo()
	{
		return $this->SemesterNo;

	}
	function Display()
	{
		echo $this->StudentName;
		echo "<br>";
		echo $this->StudentID;
		echo "<br>";
		echo $this->SemesterID;

	}

	// function addNewStudent()
	// {
    //        $db=new DBFacade();
    //        $db->AddStudent($this);

	// }


}
?>