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
    $body_section_content = "<p> We would like to here from you at any time </p>";
    $body_section_content .= '<p>Send us an email for <a href="mailto:technical_support@qa.eng.cu.edu.eg">technical support</a></p>';

    if (isset($_SESSION['user_id']))
    {
        if (strcmp($_SESSION['type'], 'admin') != 0)
        {
            $body_section_content .= '<p> Send the site Admin <a href="mailto:admin@qa.eng.cu.edu.eg">email</a> </p>';
        }
        $navbar_content = array(
            array("index.php", "Home"),
            array("about.php", "About us."),
            array("#", "contact us."),
            array("logout.php", "Sign out.")
        );
    }
    else
    {
        $navbar_content = array(
            array("index.php", "Home"),
            array("about.php", "About us."),
            array("#", "contact us.")
        );
    }


    include ("templates/base.php");
?>
