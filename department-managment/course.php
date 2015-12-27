<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'department_manager') != 0  || !isset($_REQUEST['page_course_id']))
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

    //require('../database/selectQuires.php');
    require('../database/models.php');

    $info = getInfoByCourseID($_REQUEST['page_course_id']);
    $result_derpartment = getDepartmentByManagerID($_SESSION['user_id']);
    $result_getAllInstructors = getAllInstructors();
    $current_instructor = getUserInfoByUserID($info['instructor_id']);
    $body_section_content = '<h1> Information About Course: </h1>';
    $body_section_content .= '<form action="approve.php">
        ID: <input type="text" name="ID" readonly value="'. $info['ID'] .'"/><br>
        Code: <input type="text" name="code" readonly value="'. $info['code'] .'"/><br>
        Name: <input type="text" name="name" readonly value="'. $info['name'] .'"/><br>
        semster: <input type="text" name="semster" readonly value="'. $info['semster'] .'"/><br>
        year: <input type="text" name="year" readonly value="'. $info['year'] .'"/><br>
        department: <input type="text" name="department" readonly value="'. $result_derpartment['name'] .'"/><br>
        instructor name: <input type="text" name="current_instructor" readonly value="'.$current_instructor['name'].'"/><br>
        <button type="submit" value="delete"  name="action" onclick="return confirm(\'Are you sure that you want to delete this course?\')">Delete</button>
        <br><br><p>You can assign a new instructor to the course</p>
        Assign new instructor: <select name="instructor">';
    foreach ($result_getAllInstructors as $val) {
        $body_section_content .=  '<option value="' . $val['ID'] . '">' . $val['name'] . "</option>";
    }

    $body_section_content .= '</select>
        <button type="submit" value="change"  name="action" onclick="return confirm(\'Are you sure that you want to change the instructor?\')">Change</button><br>';
    $body_section_content .= '</form>';
    $navbar_signup_login = false;
    $navbar_content = array(
        array("../index.php" , "Home"),
        array("index.php", "DashBoard"),
        array("new-course.php", "Add new course"),
        array("../about.php", "About"),
        array("../contact.php", "Contact")
    );


    include ("../templates/base.php");

    unset($_REQUEST['page_course_id']);
?>
