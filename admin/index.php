<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'admin') != 0 )
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

    $body_section_styles = "";
    $body_section_scripts = "";

    require('../database/selectQuires.php');
    // TODO: fill admin content when database is ready
    $result_pending = getAllPendingUsers();
    $body_section_content = '<h1>List of pending users</h1>';
    $body_section_content .= '<ol>';
    foreach ($result_pending as $val) {
        $body_section_content .=  '<li><a href="user.php?page_user_id=' . $val['ID'] . '">' . $val['name'] . "</a></li>";
    }
    $body_section_content .= '</ol>' ;
    // Selected value in pending drop down

    $result_allusers = getAllUsers();
    $body_section_content .= '<h1>List of all users</h1>';
    $body_section_content .= '<ol>';
    foreach ($result_allusers as $val) {
        $body_section_content .=  '<li><a href="user.php?page_user_id=' . $val['ID'] . '">' . $val['name'] . "</a></li>";
    }
    $body_section_content .= '</ol>' ;

    $navbar_content = array(
        array("../index.php", "Home"),
        array("../about.php", "About us."),
        array("../contact.php", "contact us."),
        array("../logout.php", "Sign out.")
    );


    include ("../templates/base.php");
?>
