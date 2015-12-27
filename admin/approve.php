<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'admin') != 0  || !isset($_REQUEST['type'])
    || !isset($_REQUEST['action']) || !isset($_REQUEST['ID']) )
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }

    //require('../database/deleteQuires.php');
    //require('../database/insetQuires.php');
    require('../database/models.php');
    $loggedin_user_info = getUserInfoByUserID($_SESSION['user_id']);
    $logged_in_name = "Welcome " . $loggedin_user_info['name'];
    
    // delete the user
    if (strcmp($_REQUEST['action'], 'delete') == 0 )
    {
        deleteUserByID($_REQUEST['ID']);
    }
    else
    {
        if (!updateUserType($_REQUEST['ID'], $_REQUEST['type']))
        {
            die("Failed to update!");
        }
    }

    header('Location: http://localhost/qa/admin/index.php');
    die();
?>
