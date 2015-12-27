<?php
	session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'instractor') != 0  || !isset($_POST['ID']))
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
    
    // update course files
    $files = getFilesByCourseID($_POST['ID']);
    foreach ($files as $file)
    {
        updateFileData($file['ID'],$_POST[$file['type']]);
    }

    $body_section_content = '<p>Please wait while your request is completed....</p>';

    $navbar_signup_login = false;
    $navbar_content = array();


    include ("../templates/base.php");
    header('Location: http://localhost/qa/index.php');
    die();
?>