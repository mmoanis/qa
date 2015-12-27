<?php
	session_start();

    if (!isset($_SESSION['user_id']) || strcmp($_SESSION['type'], 'instractor') != 0  || !isset($_POST['ID']))
    {
        // redirect unauthorized user at once to homepage
        header('Location: http://localhost/qa/index.php');
        die();
    }

    require('../database/models.php');

    $course = getInfoByCourseID($_POST['ID']);
    $files  = array('upload_Course_Specifications', 'upload_Materials_&_Labs', 'upload_Assignments_&_Project_Documents',
        'upload_Midterm_Exam', 'upload_Final_Exam', 'upload_End_of_Course_Report');

    $db_files = getFilesByCourseID($_POST['ID']);

    // base directory
    $target_dir = "../uploads/" . $course['code'];
    $uploadOk = 1;

    foreach ($files as $file)
    {
        if (empty($_FILES[$file]["name"]))
        {
            // no file to upload, update file link only
            // update course files
            
            foreach ($files as $file)
            {
                updateFileData($file['ID'],$_POST[$file['type']]);
            }
        }
        else
        {
            $target_file = $target_dir . basename($_FILES[$file]["name"]);

            // Check if file already exists
            if (file_exists($target_file) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES[$file]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } 
            else 
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
                {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } 
                else
                {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        
    }
    
    header('Location: http://localhost/qa/index.php');
    die();
?>