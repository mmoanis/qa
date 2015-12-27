<?php
    session_start();

    $header_tag_extras = "";
    $header_section_styles = "";
    $header_section_metas = "";
    $header_section_scripts = "";
    $header_section_extras = "";
    $body_tag_extras = "";
    $navbar_signup_login = "";
    $body_section_styles = "";
    $body_section_scripts = "";
    $body_section_content = '<p> Welcome to the Quality Assurance Committee website for Cairo University, Faculty of Engineering</p>
    <p>Use the navigation bar to the left to go through the website</p>';

    if (isset($_SESSION['user_id']))
    {
        $navbar_signup_login = false;
        // check user type
        switch ($_SESSION['type']) {
            case 'qa_member':
                break;

            case 'admin':
                $navbar_content = array(
                    array("index.php" , "Home"),
                    array("http://localhost/qa/admin/index.php" , "DashBoard"),
                    array("about.php", "About"),
                    array("contact.php", "Contact")
                );
                break;

            case 'instractor':
                $navbar_content = array(
                    array("index.php" , "Home"),
                    array("http://localhost/qa/instructor/index.php" , "DashBoard"),
                    array("about.php", "About"),
                    array("contact.php", "Contact")
                );
                break;

            case 'department_manager':
                $navbar_content = array(
                    array("index.php" , "Home"),
                    array("http://localhost/qa/department-managment/index.php" , "DashBoard"),
                    array("http://localhost/qa/department-managment/new-course.php" , "New Course"),
                    array("about.php", "About"),
                    array("contact.php", "Contact")
                );
                break;

            case 'waiting user':
                $navbar_content = array(
                    array("index.php" , "Home"),
                    array("about.php", "About"),
                    array("contact.php", "Contact")
                );
                break;

            default:
                die('unregisterd user managed to get here dfuck!');
                break;
        }
    }
    else
    {// anonymous user
        $navbar_signup_login = true;
        $navbar_content = array(
            array("index.php" , "Home"),
            array("about.php", "About"),
            array("contact.php", "Contact")
        );
    }


    include ("templates/base.php");
?>
