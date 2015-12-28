<?php
    session_start();

    $logged_in_name ="Site Portal";
    
    $header_tag_extras = "";
    $header_section_styles = "";
    $header_section_metas = "";
    $header_section_scripts = "";
    $header_section_extras = "";
    $body_tag_extras = "";

    $body_section_styles = "";
    $body_section_scripts = "";
    $body_section_content = "<p>Cairo University, Faculty of Engineering QA committe website.<br>All Rights Reserved.</p>";

    $navbar_signup_login = "";

    if (isset($_SESSION['user_id']))
    {   
        require('database/models.php');
        $loggedin_user_info = getUserInfoByUserID($_SESSION['user_id']);
        $logged_in_name = "Welcome " . $loggedin_user_info['name'];

        $navbar_signup_login = false;
        $navbar_content = array(
            array("index.php" , "Home"),
            array("about.php", "About"),
            array("contact.php", "Contact")
        );
    }
    else
    {   
        $navbar_signup_login = true;
        $navbar_content = array(
            array("index.php" , "Home"),
            array("about.php", "About"),
            array("contact.php", "Contact")
        );
    }
    include ("templates/base.php");
?>
