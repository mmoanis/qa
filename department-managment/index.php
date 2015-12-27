<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'department_manager') != 0 )
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }
    $navbar_signup_login = "";

    $header_tag_extras = "";
    $header_section_styles = "";
    $header_section_metas = "";
    $header_section_scripts = "";
    $header_section_extras = "";
    $body_tag_extras = "";

    $body_section_styles = "";
    $body_section_scripts = "";

    // TODO: fill department_manager content when database is ready
    require('../database/models.php');

    $result_allcourses = getAllCoursesByManagerId($_SESSION['user_id']);
    $result_derpartmentName = getDepartmentName($_SESSION['user_id']);
    
    $body_section_content = '<h1>List of Courses in ' . $result_derpartmentName .' Department</h1>';
    $body_section_content .= '<ol>';
    foreach ($result_allcourses as $val) {
        $body_section_content .=  '<li><a href="course.php?page_course_id=' . $val['ID'] . '">' . $val['name'] . "</a></li>";
    }
    $body_section_content .= '</ol>' ;

    $navbar_signup_login = false;
    $navbar_content = array(
        array("../index.php", "Home"),
        array("new-course.php", "Add new course"),
        array("../about.php", "About"),
        array("../contact.php", "Contact")
    );


    include ("../templates/base.php");
?>
