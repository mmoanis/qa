<?php

	$connection_link=NULL;
	 function connectTODb4(){
		$user="root";
		$password="";
		$database="qadb";
		$GLOBALS['connection_link'] =  mysqli_connect("localhost",$user,$password,'qadb');
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}	
	
	function closeConnection4(){	
		if ($GLOBALS['connection_link'] != NULL)
		{
			mysqli_close($GLOBALS['connection_link']);
		}
	}
	
	function checkConnectivity4(){
		if ($GLOBALS['connection_link'] == NULL)
		{
				connectTODb4();
		}
	}
	
	//delete user by id
	//returns true if successful false otherwise 
	function deleteUserByID($id){
		checkConnectivity4();
		
		$query =sprintf("delete  from user where ID = %s",$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ; 
	}
	
	//delete file by id
	//returns true if successful false otherwise 
	function deleteFileByID($id){
		checkConnectivity4();
		
		$query =sprintf("delete  from file where ID = %s",$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ; 
	}
	
	// delete department by ID
	//returns true if successful false otherwise 
	function deleteDepartmentByID($id){
		checkConnectivity4();
		
		$query =sprintf("delete  from department where ID = %s",$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ; 
	}
	
	//delete course by id
	//returns true if successful false otherwise 
	function deleteCourseByID($id){
		checkConnectivity4();
		
		$query =sprintf("delete  from course where ID = %s",$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ; 
	}
	
	//delete admin by id 
	//returns true if successful false otherwise 
	function deleteAdminByID($id){
		checkConnectivity4();
		
		$query =sprintf("delete  from admin where ID = %s",$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ; 
	}
	
	
	
	
 ?>