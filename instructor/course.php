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

    require('../database/selectQuires.php');
    // get all files
    $course = getInfoByCourseID($_REQUEST['page_course_id']);
    $files = getFilesByCourseID($_REQUEST['page_course_id']);
    $_files = array("type1" => "", "type2" => "", "type3" => "", "type4" => "", "type5" => "", "type6" => "" );
    foreach ($files as $file) {
        $_files[$file['type']] = $file['link'];
    }

    $body_section_content = '<h1> Information About Course: </h1><p>You can add links to files, remove links or update links</p>';
    $body_section_content .= '<table border=1>
            <tr>
                <td>Course Name</td>
                <td>Course Code</td>
                <td>Semester</td>
                <td>Year</td>
            </tr>
            <tr>
                <td>'. $course['name'] .'</td>
                <td>'. $course['code'] .'</td>
                <td>'. $course['semster'] .'</td>
                <td>'. $course['year'] .'</td>
            </tr>
        </table>';
    $body_section_content .= '<form action="post" action="upload.php">
        Type1: <input type="text" name="type1" value="'. $_files['type1'] .'"><br>
        Type2: <input type="text" name="type2" value="'. $_files['type2'] .'"><br>
        Type3: <input type="text" name="type3" value="'. $_files['type3'] .'"><br>
        Type4: <input type="text" name="type4" value="'. $_files['type4'] .'"><br>
        Type5: <input type="text" name="type5" value="'. $_files['type5'] .'"><br>
        Type6: <input type="text" name="type6" value="'. $_files['type6'] .'"><br>
        <button type="submit" value="confirm"  onclick="return confirm(\'Are you sure?\')">Confirm</button>
        </form>'

    $navbar_content = array(
        array("../index.php", "Home"),
        array("index.php", "DashBoard."),
        array("../about.php", "About us."),
        array("../contact.php", "contact us."),
        array("../logout.php", "Sign out.")
    );


    include ("../templates/base.php");

    unset($_REQUEST['page_course_id']);

?>
