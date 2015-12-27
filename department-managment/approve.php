<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'department_manager') != 0   || !isset($_REQUEST['instructor'])
    || !isset($_REQUEST['action']) || !isset($_REQUEST['ID']) )
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }

    require('../database/models.php');
    
    // delete the course
    if (strcmp($_REQUEST['action'], 'delete') == 0 )
    {
        deleteCourseByID($_REQUEST['ID']);
    }
    elseif(strcmp($_REQUEST['action'], 'change') == 0 )
    {
        if (!updateCourseInstructorID($_REQUEST['ID'], $_REQUEST['instructor']))
        {
            die("Failed to update!");
        }
    }

    header('Location: http://localhost/qa/admin/index.php');
    die();
?>
