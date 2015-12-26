<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'admin') != 0  || !isset($_REQUEST['page_user_id']))
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
    $type = getUserTypeByID($_REQUEST['page_user_id']);
    $info = getUserInfoByUserID($_REQUEST['page_user_id']);

    $body_section_content = '<h1> Information About User: </h1>';
    $body_section_content .= '
    <table border="1">
        <tr>
            <td> username </td>
            <td> email </td>
            <td> name </td>
            <td> type </td>
        </tr>
        <tr>
            <td>' . $info['user_name'] . ' </td>
            <td>' . $info['email']    . ' </td>
            <td>' . $info['name']     . ' </td>
            <td>' . $type             . ' </td>
    </table>';

    $body_section_content .= '<p>you can change the user\'s role, approve or delete the user.</p>
     <form action="approve.php">
        User Role:<select name="type">
            <option value="instructor">Instructor</option>
            <option value="admin">Admin</option>
            <option value="qa-member">QA member</option>
            <option value="department">Department Manager</option>
        </select><br>
        Action:<select name="action">
            <option value="approve">Approve</option>
            <option value="admin">Delete</option>
        </select><br>
        <button type="submit" value="confirm"  onclick="return confirm(\'Are you sure?\')">Confirm</button>
    </form>';

    $navbar_content = array(
        array("../index.php", "Home"),
        array("index.php", "DashBoard."),
        array("../about.php", "About us."),
        array("../contact.php", "contact us."),
        array("../logout.php", "Sign out.")
    );


    include ("../templates/base.php");

    unset($_REQUEST['page_user_id']);
?>
