<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'instractor') != 0  || !isset($_REQUEST['page_course_id']))
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }

    // view course details
    $header_tag_extras = "";
    $header_section_styles = "";
    $header_section_metas = "";
    $header_section_scripts = "";
    $header_section_extras = "";
    $body_tag_extras = "";

    $body_section_styles = "";
    $body_section_scripts = "";

    $navbar_signup_login = "";
    require('../database/selectQuires.php');
    // get all files
    $course = getInfoByCourseID($_REQUEST['page_course_id']);
    $files = getFilesByCourseID($_REQUEST['page_course_id']);

    $body_section_content = '<h1> Information About Course: </h1><p>You can add links to files, remove links or update links</p>';
    $body_section_content .= '<form action="POST" action="upload.php">
        ID: <input type="text" readonly name="ID" value="'. $course['ID']  .'"><br>
        Name: <input type="text" readonly name="name" value="'.$course['name'].'"><br>
        Code: <input type="text" readonly name="code" value="'.  $course['code'] .'"><br>
        Semester: <input type="text" readonly name="semester" value="'. $course['semstr'] .'"><br>
        Year: <input type="text" readonly name="year" value="'. $course['year'] .'"><br>';
    // add information about the 6 files of the Course
    for ($i=0; $i < 6; $i++)
    {
        $body_section_content .= $files[$i]['type'] .': <input type="text" name="'.$files[$i]['type'].'" value="';
        if ($files[$i]['data'] == NULL)
            $body_section_content .= '"/><br>'
        else
            $body_section_content .= $files[$i]['data'] . '"/><br>'
    }
    $body_section_content .= '<button type="submit" value="confirm"  onclick="return confirm(\'Are you sure?\')">Confirm</button>
        </form>';

    $navbar_signup_login = false;
    $navbar_content = array(
        array("../index.php" , "Home"),
        array("index.php" , "DashBoard"),
        array("../about.php", "About"),
        array("../contact.php", "ContacT")
    );


    include ("../templates/base.php");

    unset($_REQUEST['page_course_id']);

?>
