<?php
	session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'instractor') != 0  || !isset($_POST['ID']))
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }
    require('../database/models.php');
    echo "Please wait while processing your request";
    
    $course = getInfoByCourseID($_POST['ID']);
    $names  = array('Course_Specifications', 'Materials_&_Labs', 'Assignments_&_Project_Documents',
        'Midterm_Exam', 'Final_Exam', 'End_of_Course_Report');

    $db_files = getFilesByCourseID($_POST['ID']);

    // base directory
    $target_dir = "../uploads/" . $course['code'] . '/';
    $uploadOk = 1;

    foreach ($names as $name) {
        $update_link = $_POST[$name];
        $file = 'upload_'.$name;

        if (!empty($_FILES[$file]["name"])) {
            echo
            $target_file = $target_dir . basename($_FILES[$file]["name"]);

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size, max 32 MB
            if ($_FILES[$file]["size"] > 33554432) {
                echo "Sorry, your file is too large." . $_FILES[$file]["size"];
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } 
            else 
            {
                if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file))
                {
                    echo "The file ". basename( $_FILES[$file]["name"]). " has been uploaded.";
                    $update_link = $target_file;
                } 
                else
                {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        // update file link
        foreach ($db_files as $db_file) {
            if (strcmp($db_file['type'], $name) == 0) {
                updateFileData($db_file['ID'],$update_link);
                break;
            }
        }
    }
    
    header('refresh:3; url=http://localhost/qa/instructor/index.php');
    die();
?>