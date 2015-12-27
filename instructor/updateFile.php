<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'instractor') != 0  || !isset($_POST['ID']))
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }

    require('../database/models.php');
    $loggedin_user_info = getUserInfoByUserID($_SESSION['user_id']);
    $logged_in_name = "Welcome " . $loggedin_user_info['name'];
    // update course files
    $files = getFilesByCourseID($_POST['ID']);
    foreach ($files as $file)
    {
        updateFileData($file['ID'],$_POST[$file['type']]);
    }

    unset($_POST['type']);
    unset($_POST['type']);
    header('Location: http://localhost/qa/instructor/index.php');
    die();
?>
