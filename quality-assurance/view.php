<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'qa_member') != 0 || !isset($_REQUEST['year']) || !isset($_REQUEST['semster']) )
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
    $loggedin_user_info = getUserInfoByUserID($_SESSION['user_id']);
    $logged_in_name = "Welcome " . $loggedin_user_info['name'];

    $result_allDepartments = getAllDepartments();

    $_REQUEST['year'] = substr($_REQUEST['year'], 0 , 4);

    $allDepartmentsTotalAverageProgress = 0;
    $count = 0;
    $body_section_content = '<h1>List of Departments</h1>';
    $body_section_content .= '<ol>';
    foreach ($result_allDepartments as $val) {
        $allDepartmentsTotalAverageProgress += getAvgDepartmentProgessBySemester($val['ID'],$_REQUEST['year'],$_REQUEST['semster']);
        $progress = getAvgDepartmentProgessBySemester($val['ID'],$_REQUEST['year'],$_REQUEST['semster']);
        $body_section_content .=  '<li>' . $val['name'] . '
        <progress value="'. $progress .'" max="1"></progress></li>';
        $count++;
    }
    $body_section_content .= '</ol><br>Total Progress of all departments for semster ' . $_REQUEST['semster'] . ' ' . $_REQUEST['year'] .' is <progress value="' . $allDepartmentsTotalAverageProgress/$count . '" max"1"></progress>';
    $navbar_signup_login = false;
    $navbar_content = array(
        array("../index.php", "Home"),
        array("http://localhost/qa/quality-assurance/index.php" , "DashBoard"),
        array("../about.php", "About"),
        array("../contact.php", "Contact")
    );


    include ("../templates/base.php");
?>