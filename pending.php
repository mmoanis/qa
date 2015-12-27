<?php
    session_start();
    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'waiting user') != 0)
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }
    require('database/models.php');
    $loggedin_user_info = getUserInfoByUserID($_SESSION['user_id']);
    $logged_in_name = $loggedin_user_info['name'];
    $header_tag_extras = "";
    $header_section_styles = "";
    $header_section_metas = "";
    $header_section_scripts = "";
    $header_section_extras = "";
    $body_tag_extras = "";

    $body_section_styles = "";
    $body_section_scripts = "";
    $body_section_content = "<p1>Your request is pending, please contact the site Admin to approve your request</p1>";

    $navbar_signup_login = false;
    $navbar_content = array(
        array("index.php", "Home"),
        array("about.php", "About us."),
        array("contact.php", "contact us.")
    );

    include ("templates/base.php");
?>
