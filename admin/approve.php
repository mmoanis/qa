<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'admin') != 0  || !isset($_REQUEST['type'])
    || !isset($_REQUEST['action']) || !isset($_REQUEST['ID']) )
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }
    require('../database/models.php');
    
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
