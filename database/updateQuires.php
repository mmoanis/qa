<?php

	$connection_link=NULL;
	function connectTODb(){
		$user="root";
		$password="";
		$database="qadb";
		$GLOBALS['connection_link'] =  mysqli_connect("localhost",$user,$password,'qadb');
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}	
	
	function closeConnection(){	
		if ($GLOBALS['connection_link'] != NULL)
		{
			mysqli_close($GLOBALS['connection_link']);
		}
	}
	
	function checkConnectivity(){
		if ($GLOBALS['connection_link'] == NULL)
		{
				connectTODb();
		}
	}
	
	//update user's name
	function updateUserName($id,$new_name){
	
		checkConnectivity();
		
		$query =sprintf("update user set name = '%s' where ID = %s",$name,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update user's user_name
	function updateUser_Name($id,$new_user_name){
		checkConnectivity();
		
		$query =sprintf("update user set user_name = '%s' where ID = %s",$new_user_name,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	
	}
	
	//update user's password
	function updateUserPassword($id,$new_pass){
		
		checkConnectivity();
		$query =sprintf("update user set password = '%s' where ID = %s",$pass,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update user's email
	function updateUserEmail($id,$new_email){
		
		checkConnectivity();
		$query =sprintf("update user set email = '%s' where ID = %s",$new_email,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update instructor's department_id
	function updateInstructorDepartmentID($id,$new_department_id){
		
		checkConnectivity();
		$query =sprintf("update instractor set department_id = %s where ID = %s",$new_department_id,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update file's type 
	function updateFileType($id,$new_type){
		
		checkConnectivity();
		$query =sprintf("update file set type = '%s' where ID = %s",$new_type,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update file's course_id 
	function updateFileCourseID($id,$new_course_id){
		
		checkConnectivity();
		$query =sprintf("update file set course_id = %s where ID = %s",$new_course_id,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update file's data 
	function updateFileData($id,$new_data){
		
		checkConnectivity();
		$query =sprintf("update file set data = '%s' where ID = %s",$new_data,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update department name
	function updateDepartmentName($id,$new_name){
		checkConnectivity();
		$query =sprintf("update department set name = '%s' where ID = %s",$new_name,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update department manager_id
	function updateDepartmentManagerID($id,$new_manager_id){
		checkConnectivity();
		$query =sprintf("update department set manager_id =  %s where ID = %s",$new_manager_id,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update course code
	function updateCourseCode($id,$new_code){
		checkConnectivity();
		$query =sprintf("update course set code =  '%s' where ID = %s",$new_code,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update course name
	function updateCourseName($id,$new_name){
		checkConnectivity();
		$query =sprintf("update course set name =  '%s' where ID = %s",$new_name,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update course semester
	function updateCourseSemester($id,$new_semester){
		checkConnectivity();
		$query =sprintf("update course set semester =  '%s' where ID = %s",$new_semester,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update course year
	function updateCourseYear($id,$new_year){
		checkConnectivity();
		$query =sprintf("update course set year =  '%s' where ID = %s",$new_year,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	
	//update course instructor_id
	function updateCourseInstructorID($id,$new_instructor_id){
		checkConnectivity();
		$query =sprintf("update course set instructor_id =  %s where ID = %s",$new_instructor_id,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	//update course department_id
	function updateCourseDepartmentID($id,$new_department_id){
		checkConnectivity();
		$query =sprintf("update course set 	department_id =  %s where ID = %s",$new_department_id,$id);
		mysqli_query($GLOBALS['connection_link'],$query);
		return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
	}
	
	
	
	
	
	
	
	
	
	
 ?>