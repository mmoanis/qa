<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'instractor') != 0 )
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }

    $header_tag_extras = "";
    $header_section_styles = "";
    $header_section_metas = "";
    $header_section_scripts = "";
    $header_section_extras = "";
    $body_tag_extras = "";

    $navbar_signup_login = "";

    $body_section_styles = "";
    $body_section_scripts = "";

    require('../database/models.php');

    $courses_result = getAllCoursesByInstructorID($_SESSION['user_id']);
    $body_section_content = '<h1>List of courses: </h1>';

    $body_section_content .= '<ol>';
    foreach ($courses_result as $val) {
        $body_section_content .=  '<li><a href="course.php?page_course_id=' . $val['ID'] . '">' . $val['name'] . "</a></li>";
    }
    $body_section_content .= '</ol>' ;

    $navbar_signup_login = false;
    $navbar_content = array(
        array("../index.php" , "Home"),
        array("index.php" , "DashBoard"),
        array("upload.php", "Upload File"),
        array("../about.php", "About"),
        array("../contact.php", "Contact")
    );


    include ("../templates/base.php");
?>
