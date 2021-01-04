<?php
  

     
class Teacher
{
   
   
	private $TeacherID;
	private $DeptNo;
	private $Email;
	private $TeacherName;
    private $Designation;
      
	function __construct($teachID,$no,$mail,$teachName,$des)
	{
		$this->TeacherID=$teachID;
        $this->DeptNo=$no;
		$this->email=$mail;
		$this->TeacherName=$teachName;
		$this->Designation=$des;
		 
	}


	function getTeacherID()
	{
		return $this->TeacherID;

	}

	function getTeacherName()
	{
		return $this->TeacherName;

	}

    function getTeacherDesignation()
    {
        return $this->Designation;
	}

	function getDeptNo(){
		return $this->DeptNo;
	}
	
	function getEmail()
	{
		return $this->Email;
	}

	function Display()
	{
		echo $this->TeacherName;
		echo "<br>";
		echo $this->TeacherID;
		echo "<br>";
		echo $this->Designation;
		echo "<br";
		echo $this->Email;

	}
}
?>