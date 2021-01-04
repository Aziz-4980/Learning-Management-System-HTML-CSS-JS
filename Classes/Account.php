<?php
  
  //include("./Classes/DBFacade.php");
  //$db=new DBFacade();
  // $db->makeConnection();

     
class Account
{


	private $email;
	private $password;
      
	function __construct($m,$p)
	{
		$this->email=$m;
		$this->password=$p;
		

	}

	function getMail()
	{
		return $this->email;

	}

	function getPassword()
	{
		return $this->password;

	}

	function adminAccount()
	{

		  $db=new DBFacade();
          $db->AdminLogIn($this);
	}

	function managerAccount()
	{

		  $db=new DBFacadeManager();
          $db->ManagerLogIn($this);
	}

	function studentAccount()
	{

		  $db=new DBFacadeStudent();
          $db->StudentLogIn($this);
	}
	function teacherAccount()
	{
		$db = new DBFacadeTeacher();
		$db->TeacherLogIn($this);
	}

}
?>