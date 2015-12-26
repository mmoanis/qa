<?php

	$connection_link=false;
	function connectTODb(){
		$user="root";
		$password="";
		$database="qadb";
		$GLOBALS['connection_link'] = mysql_connect('localhost',$user,$password);
		@mysql_select_db($database) or die( "Unable to select database");
	}

	function closeConnection(){
		if(is_resource($GLOBALS['connection_link'])){
			mysql_close($GLOBALS['connection_link']);
			echo 'out';
		}
	}

	function checkConnectivity(){
		if(!is_resource($GLOBALS['connection_link'])){
			connectTODb();
		}
	}

	//delete user by id
	//returns true if successful false otherwise
	function deleteUserByID($id){
		checkConnectivity();

		$query =sprintf("delete  from user where ID = %s",$id);
		mysql_query($query);
		return mysql_affected_rows()>0 ;
	}

	//delete file by id
	//returns true if successful false otherwise
	function deleteFileByID($id){
		checkConnectivity();

		$query =sprintf("delete  from file where ID = %s",$id);
		mysql_query($query);

		return mysql_affected_rows()>0 ;
	}

	// delete department by ID
	//returns true if successful false otherwise
	function deleteDepartmentByID($id){
		checkConnectivity();

		$query =sprintf("delete  from department where ID = %s",$id);
		mysql_query($query);

		return mysql_affected_rows()>0 ;
	}

	//delete course by id
	//returns true if successful false otherwise
	function deleteCourseByID($id){
		checkConnectivity();

		$query =sprintf("delete  from course where ID = %s",$id);
		mysql_query($query);
		return mysql_affected_rows()>0 ;
	}

	//delete admin by id
	//returns true if successful false otherwise
	function deleteAdminByID($id){
		checkConnectivity();

		$query =sprintf("delete  from admin where ID = %s",$id);
		mysql_query($query);
		return mysql_affected_rows()>0 ;
	}




 ?>
