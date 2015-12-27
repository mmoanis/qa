<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'department_manager') != 0 )
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }

    require('../database/models.php');

    // check if form submitted
    if (isset($_POST['code']) && isset($_POST['name']) &&
     isset($_POST['semester']) && isset($_POST['year']) && isset($_POST['instructor']) )
    {
    	$department = getDepartmentByManagerID($_SESSION['user_id']);
    	if ($department == false)
    		die('D\'oh!');

    	insertCourse($_POST['code'],$_POST['name'],$_POST['semester'],substr($_POST['year'], 0, 4),$_POST['instructor'],$department['ID']);

    	unset($_POST['code']);
    	unset($_POST['name']);
    	unset($_POST['semester']);
    	unset($_POST['year']);
    	unset($_POST['instructor']);

    	// redirect to homepage
        header('Location: http://localhost/qa/department-managment/index.php');
        die();
    }
    else
    {
    	$navbar_signup_login = "";

	    $header_tag_extras = "";
	    $header_section_styles = "";
	    $header_section_metas = "";
	    $header_section_scripts = "";
	    $header_section_extras = "";
	    $body_tag_extras = "";

	    $body_section_styles = "";
	    $body_section_scripts = "";

	    $body_section_content = '<h1>Add new course in the Department.</h1>';
	    $body_section_content .= '<form method="POST" action="new-course.php">
	    	Code: <input type="text" size="10" required name="code" /> <br>
	    	Name: <input type="text" size="30" required name="name" /> <br>
	    	Semester: <select name="semester">
	    				<option value="Fall">Fall</option>
	    				<option value="Spring">Spring</option>
	    				<option value="Summer">Summer</option>
	    			 </select><br>
	        Year: <input type="month" required name="year" /><br>
	        Instructor: <select name="instructor">
	        				<option value="NULL"></option><br>';
	    $instructors = getAllInstructors();
	    foreach ($instructors as $instructor)
	    {
	    	$body_section_content .= '<option value="'.$instructor['ID']. '">'.$instructor['name'].'</option><br>';
	    }
	    $body_section_content .= '</select><br><input type="submit" value="Add" /> <input type="reset" value="clear"/></form>';

	    $navbar_signup_login = false;
	    $navbar_content = array(
	        array("../index.php", "Home"),
	        array("new-course.php", "Add new course"),
	        array("../about.php", "About"),
	        array("../contact.php", "Contact")
	    );


	    include ("../templates/base.php");
    }
?>