<?php

		$connection_link=NULL;
	 function connectTODb1(){
		$user="root";
		$password="";
		$database="qadb";
		$GLOBALS['connection_link'] =  mysqli_connect("localhost",$user,$password,'qadb');
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}	
	
	 function closeConnection1(){	
		if ($GLOBALS['connection_link'] != NULL)
		{
			mysqli_close($GLOBALS['connection_link']);
		}
	}
	
	 function checkConnectivity1(){
		if ($GLOBALS['connection_link'] == NULL)
		{
				connectTODb1();
		}
	}
	
	//checks if username exists
	function checkUserNameExists($user_name){
		checkConnectivity1();
		
		$list= array();
		$query =sprintf("select * from user where user_name = '%s'",$user_name);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if($row = mysqli_fetch_assoc($result)) {
			return true;			
		}
		
		return false;
	}
	
	//checks if email exists
	function checkEmailExists($email){
		checkConnectivity1();
		
		$list= array();
		$query =sprintf("select * from user where email = '%s'",$email);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if($row = mysqli_fetch_assoc($result)) {
			return true;			
		}
		
		return false;
	}
	
	//return list of all users
	function getAllUsers(){
		checkConnectivity1();
		
		$list= array();
		$query =sprintf("select * from user");
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		while($row = mysqli_fetch_assoc($result)) {
			$list[]=$row;			
		}
		
		return $list;
	}
	
	//get list of all admins
	function getAllAdmins(){
		checkConnectivity1();
		
		$list= array();
		$query =sprintf("select * from admin");
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		while($row = mysqli_fetch_assoc($result)){
			$list[]= getUserInfoByUserID($row['ID']);
		}
		
		return $list;
	}
	
	// get list of pending users
	function getAllPendingUsers(){
		checkConnectivity1();
		
		$list= array();
		$query =sprintf("select ID from user");
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		while($row = mysqli_fetch_assoc($result)){
			if(getUserTypeByID($row['ID'])=='waiting user'){
					$list[] = getUserInfoByUserID($row['ID']);
			}
		}
		
		return $list;
	
	}
	
	//get list of all departments
	function getAllDepartments(){
		checkConnectivity1();
		
		$list= array();
		$query =sprintf("select * from department");
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		while($row = mysqli_fetch_assoc($result)){
			$list[]=$row;
		}
		
		return $list;
	}
	
	//get list of all courses
	function getAllCourses(){
	
		checkConnectivity1();
		
		$list= array();
		$query =sprintf("select * from course");
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		while($row = mysqli_fetch_assoc($result)){
			$list[]=$row;
		}
		
		return $list;
	
	}

	//get list of courses in a certain department
	function getAllCoursesByDepartmentID($department_id){
		checkConnectivity1();
		
		$list= array();
		$query =sprintf("select * from course where department_id = %s",$department_id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		while($row = mysqli_fetch_assoc($result)){
			$list[]=$row;
		}
		
		return $list;
	}
	
	// get list of all courses given by a certain instructor
	function getAllCoursesByInstructorID($instructor_id){
		checkConnectivity1();
		
		$list= array();
		$query =sprintf("select * from course where instructor_id = %s",$instructor_id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		while($row = mysqli_fetch_assoc($result)){
			$list[]=$row;
		}
		
		return $list;
		
	}
	
	
	//return all user's info by ID
	function getUserInfoByUserID($id){
		checkConnectivity1();
		
		$query =sprintf("select * from user where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row;			
		}
		return false;
	}	
	
	// return user's name by ID 
	function getNameByUserID($id){
		checkConnectivity1();
		
		$query =sprintf("select name from user where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['name'];			
		}
		return false;
	}	
	
	//return user's userName by ID 
	function getUserNameByUserID($id){
		checkConnectivity1();
		
		$query =sprintf("select user_name from user where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if($row = mysqli_fetch_assoc($result)) {
			return $row['user_name'];			
		}
		return false;
	}
	// return user email by ID
	function getEmailByUserID($id){
		checkConnectivity1();
		
		$query =sprintf("select email from user where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['email'];			
		}
		return false;
	}
	
	//get user info by user_name and password 
	//used when user logs in
	function getUserInfoByCredential($user_name,$password){
		checkConnectivity1();
		
		$query =sprintf("select * from user where user_name = '%s' AND password ='%s'",$user_name,$password);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row;			
		}
		return false;
	
	}
	
	//returns user type as a string 
	function getUserTypeByID($id){
		checkConnectivity1();
		
		$query =sprintf("select * from qa_member where ID = '%s'",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return 'qa_member';			
		}
		$query =sprintf("select * from admin where ID = '%s'",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return 'admin';			
		}
		
		$query =sprintf("select * from instractor where ID = '%s'",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return 'instractor';			
		}
		
		$query =sprintf("select * from department_manager where ID = '%s'",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return 'department_manager';			
		}
		
		$query =sprintf("select * from user where ID = '%s'",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return 'waiting user';			
		}
		
		return 'non-registered user';
	
	}
	
	//get department info by department ID
	function getInfoByDepartmentID($id){
		checkConnectivity1();
		
		$query =sprintf("select * from department where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row;			
		}
		return false;
	}
	
	//get department name by id
	function getNameByDepartmentID($id){
		checkConnectivity1();
		
		$query =sprintf("select name from department where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['name'];			
		}
		return false;
	}
	
	// get department manager_id by department name
	function getManagerIDByDepartmentID($id){
		checkConnectivity1();
		
		$query =sprintf("select manager_id from department where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)){
			return $row['manager_id'];			
		}
		return false;
	}
	
	//get file info by file ID
	function getInfoByFileID($id){
		checkConnectivity1();
		
		$query =sprintf("select * from  file where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row;			
		}
		return false;
	}	
	// get file course ID by file ID
	function getCourseIDByFileID($id){
		checkConnectivity1();
		
		$query =sprintf("select course_id from  file where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['course_id'];			
		}
		return false;
	}
	//get file type by file ID
	function getTypeByFileID($id){
		checkConnectivity1();
		
		$query =sprintf("select type from file where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['type'];			
		}
		return false;
	}
	
	//get course info by course id
	function getInfoByCourseID($id){
		checkConnectivity1();
		
		$query =sprintf("select * from course where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row;			
		}
		return false;
	
	}
	
	//get course code by course id
	function getCodeByCourseID($id){
		checkConnectivity1();
		
		$query =sprintf("select code from course where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['code'];			
		}
		return false;
	}
	
	//get course name by course id
	function getNameByCourseID($id){
		checkConnectivity1();
		
		$query =sprintf("select name from course where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['name'];			
		}
		return false;
	}
	 
	//get course semester by course id
	function getSemesterByCourseID($id){
		checkConnectivity1();
		
		$query =sprintf("select semester from course where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['semester'];			
		}
		return false;
	}
	
	//get course year by course id
	function getYearByCourseID($id){
		checkConnectivity1();
		
		$query =sprintf("select year from course where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['year'];			
		}
		return false;
	}
	
	//get instructor_id  by course id
	function getInstructorIDByCourseID($id){
		checkConnectivity1();
		
		$query =sprintf("select instructor_id from course where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['instructor_id'];			
		}
		return false;
	}
	
	//get department_id  by course id
	function getDepartmentIDByCourseID($id){
		checkConnectivity1();
		
		$query =sprintf("select department_id from course where ID = %s",$id);
		$result =mysqli_query($GLOBALS['connection_link'],$query);
		if ($row = mysqli_fetch_assoc($result)) {
			return $row['department_id'];			
		}
		return false;
	}
	
	
	
	
	
	
	
 ?>