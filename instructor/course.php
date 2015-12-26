<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'instractor') != 0  || !isset($_REQUEST['page_course_id']))
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }

    // view course details
    $header_tag_extras = "";
    $header_section_styles = "";
    $header_section_metas = "";
    $header_section_scripts = "";
    $header_section_extras = "";
    $body_tag_extras = "";

    $body_section_styles = "";
    $body_section_scripts = "";

    require('../database/selectQuires.php');
    // get all files
    $files = getFilesByCourseID($_REQUEST['page_course_id']);

    $body_section_content = '<h1> Information About Course: </h1>';
    $body_section_content .= '<form>';

    foreach ($files as $file) {
        $body_section_content .= ''
    }
    $body_section_content .= '</form>';

    $navbar_content = array(
        array("../index.php", "Home"),
        array("index.php", "DashBoard."),
        array("../about.php", "About us."),
        array("../contact.php", "contact us."),
        array("../logout.php", "Sign out.")
    );


    include ("../templates/base.php");

    unset($_REQUEST['page_course_id']);

?>
