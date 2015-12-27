<?php
    session_start();
    
    $header_tag_extras = "";
    $header_section_styles = "";
    $header_section_metas = "";
    $header_section_scripts = "";
    $header_section_extras = "";
    $body_tag_extras = "";

    $body_section_styles = "";
    $body_section_scripts = "";
    $body_section_content = "";

    $navbar_signup_login = "";

    if (isset($_SESSION['user_id']))
    {   
        $navbar_signup_login = false;
        $navbar_content = array(
            array("index.php" , "Home"),
            array("http://localhost/qa/admin/index.php" , "DashBoard"),
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
