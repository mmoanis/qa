<?php
    session_start();
    $navbar_signup_login = "";

    $logged_in_name ="Site Portal";
    
    $header_tag_extras = "";
    $header_section_styles = "";
    $header_section_metas = "";
    $header_section_scripts = "";
    $header_section_extras = "";
    $body_tag_extras = "";

    $body_section_styles = "";
    $body_section_scripts = "";
    $body_section_content = "<p> We would like to here from you at any time </p>";
    $body_section_content .= '<p>Send us an email for <a href="mailto:technical_support@qa.eng.cu.edu.eg">technical support</a></p>';

    if (isset($_SESSION['user_id']))
    {   
        require('database/models.php');
        $loggedin_user_info = getUserInfoByUserID($_SESSION['user_id']);
        $logged_in_name = "Welcome " . $loggedin_user_info['name'];

        $navbar_signup_login = false;
        if (strcmp($_SESSION['type'], 'admin') != 0)
        {
            $body_section_content .= '<p> Send the site Admin <a href="mailto:admin@qa.eng.cu.edu.eg">email</a> </p>';
        }
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
