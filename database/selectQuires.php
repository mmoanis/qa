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

	//return all user's info by ID
	function getUserInfoByUserID($id){
		checkConnectivity();

		$query =sprintf("select * from user where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}

	// return user's name by ID
	function getNameByUserID($id){
		checkConnectivity();

		$query =sprintf("select name from user where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row['name'];
		}
		return false;
	}

	//return user's userName by ID
	function getUserNameByUserID($id){
		checkConnectivity();

		$query =sprintf("select user_name from user where ID = %s",$id);
		$result =mysql_query($query);
		if($row = mysql_fetch_assoc($result)) {
			return $row['user_name'];
		}
		return false;
	}
	// return user email by ID
	function getEmailByUserID($id){
		checkConnectivity();

		$query =sprintf("select email from user where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row['email'];
		}
		return false;
	}

	//get user info by user_name and password
	//used when user logs in
	function getUserInfoByCredential($user_name,$password){
		checkConnectivity();

		$query =sprintf("select * from user where user_name = '%s' AND password ='%s'",$user_name,$password);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;

	}

	//returns user type as a string
	function getUserTypeByID($id){
		checkConnectivity();

		$query =sprintf("select * from qa_member where ID = '%s'",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return 'qa_member';
		}
		$query =sprintf("select * from admin where ID = '%s'",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return 'admin';
		}

		$query =sprintf("select * from instractor where ID = '%s'",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return 'instractor';
		}

		$query =sprintf("select * from department_manager where ID = '%s'",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return 'department_manager';
		}

		return false;

	}

	//get department info by department ID
	function getInfoByDepartmentID($id){
		checkConnectivity();

		$query =sprintf("select * from department where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}

	//get department name by id
	function getNameByDepartmentID($id){
		checkConnectivity();

		$query =sprintf("select name from department where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}

	// get department manager_id by department name
	function getManagerIDByDepartmentID($id){
		checkConnectivity();

		$query =sprintf("select manager_id from department where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)){
			return $row;
		}
		return false;
	}

	//get file info by file ID
	function getInfoByFileID($id){
		checkConnectivity();

		$query =sprintf("select * from  file where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}
	// get file course ID by file ID
	function getCourseIDByFileID($id){
		checkConnectivity();

		$query =sprintf("select course_id from  file where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}
	//get file type by file ID
	function getTypeByFileID($id){
		checkConnectivity();

		$query =sprintf("select type from file where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}

	//get course info by course id
	function getInfoByCourseID($id){
		checkConnectivity();

		$query =sprintf("select * from course where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;

	}

	//get course code by course id
	function getCodeByCourseID($id){
		checkConnectivity();

		$query =sprintf("select code from course where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}

	//get course name by course id
	function getNameByCourseID($id){
		checkConnectivity();

		$query =sprintf("select name from course where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}

	//get course semester by course id
	function getSemesterByCourseID($id){
		checkConnectivity();

		$query =sprintf("select semester from course where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}

	//get course year by course id
	function getYearByCourseID($id){
		checkConnectivity();

		$query =sprintf("select year from course where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}

	//get instructor_id  by course id
	function getInstructorIDByCourseID($id){
		checkConnectivity();

		$query =sprintf("select instructor_id from course where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}

	//get department_id  by course id
	function getDepartmentIDByCourseID($id){
		checkConnectivity();

		$query =sprintf("select department_id from course where ID = %s",$id);
		$result =mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			return $row;
		}
		return false;
	}




 ?>
