<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'admin') != 0  || !isset($_REQUEST['type'])
    || !isset($_REQUEST['action']) || !isset($_REQUEST['ID']) )
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }

    require('../database/deleteQuires.php');
    require('../database/insetQuires.php');

    // delete the user
    if (strcmp($_REQUEST['action'], 'delete') == 0 )
    {
        deleteUserByID($_REQUEST['ID']);
    }
    else
    {
        // change to new role
        switch ($_REQUEST['type']) {
            case 'department_manager':
                insertDepartmentManager($_REQUEST['ID']);
                break;
            case 'admin':
                insertAdmin($_REQUEST['ID']);
                break;
            case 'instractor':
                // TODO: add instructor
                break;
            case 'qa_member':
                insertQaMember($_REQUEST['ID']);
                break;

            default:
                die('dfuck!');
                break;
        }

        // TODO: remove user from previous role
        if (strcmp($_REQUEST['action'], 'approve') == 0 )
        {

        }
    }

    header('Location: http://localhost/qa/admin/index.php');
    die();
?>
