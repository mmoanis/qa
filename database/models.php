<?php
    $connection_link = NULL;
    function connectTODb(){
       $user="root";
       $password="";
       $database="qadb2";
       $GLOBALS['connection_link'] =  mysqli_connect("localhost",$user,$password,'qadb2');
       if (mysqli_connect_errno())
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

    function closeConnection(){
       if ($GLOBALS['connection_link'] != NULL)
           mysqli_close($GLOBALS['connection_link']);
   }

    function checkConnectivity(){
       if ($GLOBALS['connection_link'] == NULL)
               connectTODb();

   }

   //======================================== Login ===========================
   //checks if username exists
   function checkUserNameExists($user_name){
       checkConnectivity();
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
       checkConnectivity();

       $list= array();
       $query =sprintf("select * from user where email = '%s'",$email);
       $result =mysqli_query($GLOBALS['connection_link'],$query);
       if($row = mysqli_fetch_assoc($result)) {
           return true;
       }

       return false;
   }

   //get user info by user_name and password
   //used when user logs in
   function getUserInfoByCredential($user_name,$password){
       checkConnectivity();

       $query =sprintf("select * from user where user_name = '%s' AND password ='%s'",$user_name,$password);
       $result =mysqli_query($GLOBALS['connection_link'],$query);
       if ($row = mysqli_fetch_assoc($result)) {
           return $row;
       }
       return false;

   }
   //======================================= Users =============================
   //return list of all users
   function getAllUsers(){
       checkConnectivity();

       $list= array();
       $query =sprintf("select * from user");
       $result =mysqli_query($GLOBALS['connection_link'],$query);
       while($row = mysqli_fetch_assoc($result)) {
           $list[]=$row;
       }
       return $list;
   }

   // get list of pending users
   function getAllPendingUsers(){
       checkConnectivity();
       $list= array();
       $query =sprintf("select * from user");
       $result =mysqli_query($GLOBALS['connection_link'],$query);
       while($row = mysqli_fetch_assoc($result)){
           if(getUserTypeString($row['type'])=='waiting user'){
                   $list[] = $row;
           }
       }
       return $list;
   }

   //return all user's info by ID
   function getUserInfoByUserID($id){
       checkConnectivity();

       $query =sprintf("select * from user where ID = %s",$id);
       $result =mysqli_query($GLOBALS['connection_link'],$query);
       if ($row = mysqli_fetch_assoc($result)) {
           return $row;
       }
       return false;
   }

   //returns user type as a string
   function getUserTypeString($type){
       switch ($type) {
           case 0:
               return 'admin';
           case 1:
               return 'instractor';
           case 2:
               return 'qa_member';
           case 3:
               return 'department_manager';
           case 4:
                return 'waiting user';
           default:
               return 'non-registered user';
       }
   }

   //returns user type
   function getUserType($type){
       switch ($type) {
           case 'admin':
               return 0;
           case 'instractor':
               return 1;
           case 'qa_member':
               return 2;
           case 'department_manager':
               return 3;
           case 'waiting user':
                return 4;
           default:
               return -1;
       }
   }

   //insert new user - waiting user.
   function insertUser($name,$user_name,$password,$email){
       checkConnectivity();

       $query =sprintf("insert into user(name,user_name,password,email, type) values('%s','%s','%s','%s', %d)",$name,$user_name,$password,$email, 4);
       mysqli_query($GLOBALS['connection_link'],$query);
       return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
   }

   //update user's type
   function updateUserType($id,$type){
       checkConnectivity();
       $type = getUserType($type);
       $query =sprintf("update user set type = %s where ID = %s",$type,$id);
       mysqli_query($GLOBALS['connection_link'],$query);
       return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
   }

   //delete user by id
   //returns true if successful false otherwise
   function deleteUserByID($id){
       checkConnectivity();
       $query =sprintf("delete  from user where ID = %s",$id);
       mysqli_query($GLOBALS['connection_link'],$query);
       return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
   }

   //============================Department =====================================
   //insert new department
   function insertDepartment($name,$manager_id){
       checkConnectivity();
       $query =sprintf("insert into department(name,manager_id	) values('%s',%s)",$name,$manager_id);
       mysqli_query($GLOBALS['connection_link'],$query);
       return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
   }

   // delete department by ID
   //returns true if successful false otherwise
   function deleteDepartmentByID($id){
       checkConnectivity();

       $query =sprintf("delete  from department where ID = %s",$id);
       mysqli_query($GLOBALS['connection_link'],$query);

       return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
   }

   //get list of all departments
   function getAllDepartments(){
       checkConnectivity();

       $list= array();
       $query =sprintf("select * from department");
       $result =mysqli_query($GLOBALS['connection_link'],$query);
       while($row = mysqli_fetch_assoc($result)){
           $list[]=$row;
       }

       return $list;
   }

   // =========================== Course ======================================
   //insert new course
   function insertCourse($code,$name,$semester,$year,$instructor_id,$department_id){
       checkConnectivity();

       $query =sprintf("insert into course(code,name,semster,year,instructor_id,department_id) values('%s','%s','%s','%s',%s,%s)",$code,$name,$semester,$year,$instructor_id,$department_id);
       mysqli_query($GLOBALS['connection_link'],$query);
       //  each course should have 6 files initially
	   $fileTypes=array("Course Specifications","Materials & Labs","Assignments & Project Documents","Midterm Exam","Final Exam","End of Course Report");
       $i = 0;
	   $id = mysqli_insert_id($GLOBALS['connection_link']);
	   $result= mysqli_affected_rows($GLOBALS['connection_link']);
	   for ($i ; $i<6; $i++)
       {
          insertFile($fileTypes[$i],$id);
       }
       return $result>0 ;
   }

   //get course info by course id
   function getInfoByCourseID($id){
       checkConnectivity();

       $query =sprintf("select * from course where ID = %s",$id);
       $result =mysqli_query($GLOBALS['connection_link'],$query);
       if ($row = mysqli_fetch_assoc($result)) {
           return $row;
       }
       return false;
   }

   // get list of all courses given by a certain instructor
   function getAllCoursesByInstructorID($instructor_id){
       checkConnectivity1();

       $list= array();
       $query =sprintf("select * from course where instructor_id = %s order by year DESC",$instructor_id);
       $result =mysqli_query($GLOBALS['connection_link'],$query);
       while($row = mysqli_fetch_assoc($result)){
           $list[]=$row;
       }
       return $list;
   }

   //delete course by id
   //returns true if successful false otherwise
   function deleteCourseByID($id){
       checkConnectivity();

       $query =sprintf("delete  from course where ID = %s",$id);
       mysqli_query($GLOBALS['connection_link'],$query);
       return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
   }

   // ================================ Files ==================================
   //insert new file
   function insertFile($type,$course_id){
       checkConnectivity();

       $query =sprintf("insert into file(type,course_id) values('%s',%s)",$type,$course_id);
       mysqli_query($GLOBALS['connection_link'],$query);
       return mysqli_affected_rows($GLOBALS['connection_link'])>0 ;
   }

   // get all files for a course
   function getFilesByCourseID($id) {
       checkConnectivity();

       $query =sprintf("select * from  file where course_id = %s",$id);
       $result =mysqli_query($GLOBALS['connection_link'],$query);
       if ($row = mysqli_fetch_assoc($result)) {
           return $row;
       }
       return false;
   }

?>
