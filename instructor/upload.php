<?php
    session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'instractor') != 0  || !isset($_REQUEST['type']))
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }


    // update course files
    $files = getFilesByCourseID($_REQUEST['ID']);
    foreach ($files as $file)
    {
        updateFileData($file['ID'],$_REQUEST[$file['type']])
    }

    unset($_REQUEST['type']);
    header('Location: http://localhost/qa/instructor/index.php');
    die();
?>
