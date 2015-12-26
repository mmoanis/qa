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
    $result = getAllPendingUsers();
    $body_section_content = '<div><h1>List of pending users</h1><div>Usernames:<select name="pendingDropDownList">';
    foreach ($result as $val) {
        $body_section_content .=  "<option value=" . $val['ID'] . ">" . $val['name'] . "</option>";
    }
    $body_section_content .= '</select></div></div>' ;
    $select_pending_option = $_POST['pendingDropDownList'];
    $body_section_content .= '<a href="user.php?page_user_id="' . $select_pending_option . '""'

    $navbar_content = array(
        array("../index.php", "Home"),
        array("../about.php", "About us."),
        array("../contact.php", "contact us."),
        array("../logout.php", "Sign out.")
    );


    include ("../templates/base.php");
?>
