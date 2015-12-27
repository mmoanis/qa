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

    require('../database/models.php');
    $loggedin_user_info = getUserInfoByUserID($_SESSION['user_id']);
    $logged_in_name = "Welcome " . $loggedin_user_info['name'];
    
    $result_allcourses = getAllCoursesByManagerID($_SESSION['user_id']);
    $result_derpartment = getDepartmentByManagerID($_SESSION['user_id']);
    $department_progress = getAvgDepartmentProgess($result_derpartment['ID']);
    $body_section_content = '<h1>List of Courses in ' . $result_derpartment['name'] .' Department</h1>
    <p>The progress of the department: <progress value="'.$department_progress.'" max="1"></progress></p>';
    $body_section_content .= '<ol>';
    foreach ($result_allcourses as $val) {
        $progress = 6 - getCourseProgress($val['ID']);
        $missing_files = getTypesOfMissingFiles($val['ID']);
        $body_section_content .=  '<li><a href="course.php?page_course_id=' . $val['ID'] . '">' . $val['name'] . '</a>
        <progress value="'.$progress.'" max="6"></progress> <p> Missing files: ';
        if (count($missing_files) == 6) {
            $body_section_content .= ' ALL FILES ARE MISSING!!';
        } else {
            foreach ($missing_files as $file) {
                $body_section_content .= str_replace("_", " ", $file) .' --- ';
            }
        }
        '</li>';
    }
    $body_section_content .= '</ol>' ;

    $navbar_signup_login = false;
    $navbar_content = array(
        array("../index.php", "Home"),
        array("index.php", "DashBoard"),
        array("new-course.php", "Add new course"),
        array("../about.php", "About"),
        array("../contact.php", "Contact")
    );


    include ("../templates/base.php");
?>
