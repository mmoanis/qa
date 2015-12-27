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

    $body_section_styles = "";
    $body_section_scripts = "";

    require('../database/selectQuires.php');
    // TODO: fill instractor content when database is ready
    $courses_result = AllCoursesByInstructorID($_SESSION['user_id']);
    $instructor_name_result = getNameByUserID($_SESSION['user_id']);
    $body_section_content = '<h1>List of coursess given by ' . $instructor_name_result . ' </h1>';

    $body_section_content .= '<ol>';
    foreach ($courses_result as $val) {
        $body_section_content .=  '<li><a href="course.php?page_course_id=' . $val['ID'] . '">' . $val['name'] . "</a></li>";
    }
    $body_section_content .= '</ol>' ;

    $navbar_content = array(
        array("../index.php", "Home"),
        ay("upload.php", "Upload file."),
        array("../about.php", "About us."),
        array("../contact.php", "contact us."),
        array("../logout.php", "Sign out.")
    );


    include ("../templates/base.php");
?>
