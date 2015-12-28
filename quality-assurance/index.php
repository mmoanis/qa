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
    $loggedin_user_info = getUserInfoByUserID($_SESSION['user_id']);
    $logged_in_name = "Welcome " . $loggedin_user_info['name'];

    
    $body_section_content = '<h3>Select the year and semster to view the department progress in this year and semster</h3>';
    $body_section_content .= '<form action="view.php">
        Year: <input type="month" required name="year"/><br><br>
        Semester:  <select name="semster">
                        <option value="Fall">Fall</option>
                        <option value="Spring">Spring</option>
                        <option value="Summer">Summer</option>
                    </select><br><br>';
    $body_section_content .= '<button type="submit" name="action" value="show" >Show<br>
    </form>';
    $navbar_signup_login = false;
    $navbar_content = array(
        array("../index.php", "Home"),
        array("http://localhost/qa/quality-assurance/index.php" , "DashBoard"),
        array("../about.php", "About"),
        array("../contact.php", "Contact")
    );


    include ("../templates/base.php");
?>
