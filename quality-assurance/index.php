<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'qa_member') != 0 )
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

    // TODO: fill qa_member content when database is ready
    require('../database/models.php');

    $body_section_content = '';
    
    $navbar_signup_login = false;
    $navbar_content = array(
        array("../index.php", "Home"),
        array("../about.php", "About"),
        array("../contact.php", "Contact")
    );


    include ("../templates/base.php");
?>
