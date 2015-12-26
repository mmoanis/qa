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

	//insert new user
	function insertUser($name,$user_name,$password,$email){
		checkConnectivity();

		$query =sprintf("insert into user(name,user_name,password,email) values('%s','%s','%s','%s')",$name,$user_name,$password,$email);
		mysql_query($query);
		return mysql_affected_rows()>0 ;

	}

	//insert new admin by user ID
	function insertAdmin($id){
		checkConnectivity();

		$query =sprintf("insert into admin(ID) values(%s)",$id);
		mysql_query($query);
		return mysql_affected_rows()>0 ;

	}
	//insert new instractor	 by user ID and department id
	function insertInstractour($id,$d_id){
		checkConnectivity();

		$query =sprintf("insert into instractor(ID) values(%s,%s)",$id,$d_id);
		mysql_query($query);
		return mysql_affected_rows()>0 ;

	}
	//insert new qa_member by user ID
	function insertQaMember($id){
		checkConnectivity();

		$query =sprintf("insert into qa_member(ID) values(%s)",$id);
		mysql_query($query);
		return mysql_affected_rows()>0 ;
	}

	//insert new course
	function insertCourse($code,$name,$semester,$year,$instructor_id,$department_id){
		checkConnectivity();

		$query =sprintf("insert into course(code,name,semester,year,instructor_id,department_id) values('%s','%s','%s','%s',%s,%s)",$code,$name,$semester,$year,$instructor_id,$department_id);
		mysql_query($query);
		return mysql_affected_rows()>0 ;
	}

	//insert new department
	function insertDepartment($name,$manager_id){
		checkConnectivity();

		$query =sprintf("insert into department(name,manager_id	) values('%s',%s)",$name,$manager_id);
		mysql_query($query);
		return mysql_affected_rows()>0 ;

	}
	//insert new department manager
	function insertDepartmentManager($id){
		checkConnectivity();

		$query =sprintf("insert into department_manager(ID) values(%s)",$id);
		mysql_query($query);
		return mysql_affected_rows()>0 ;
	}

	//insert new file
	function insertFile($type,$course_id,$data){
		checkConnectivity();

		$query =sprintf("insert into file(type,course_id,data) values('%s',%s,'%s')",$type,$course_id,$data);
		mysql_query($query);
		return mysql_affected_rows()>0 ;
	}

	//insert new instructor
	function insertInstructor($id,$department_id){
		checkConnectivity();

		$query =sprintf("insert into instractor(ID,department_id) values(%s,%s)",$id,$department_id);
		mysql_query($query);
		return mysql_affected_rows()>0 ;
	}



 ?>
