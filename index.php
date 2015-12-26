<?php
    session_start();

    $header_tag_extras = "";
    $header_section_styles = "";
    $header_section_metas = "";
    $header_section_scripts = "";
    $header_section_extras = "";
    $body_tag_extras = "";

    $body_section_styles = "";
    $body_section_scripts = "";
    $body_section_content = '<p> Welcome to the Quality Assurance Committee website for Cairo University, Faculty of Engineering</p>
    <p>Use the navigation bar to the left to go through the website</p>';

    if (isset($_SESSION['user_id']))
    {
        // check user type
        switch ($_SESSION['type']) {
            case 'qa_member':
                break;

            case 'admin':
                $navbar_content = array(
                    array("#", "Home"),
                    array("admin/index.php", "DashBoard."),
                    array("about.php", "About us."),
                    array("contact.php", "contact us."),
                    array("logout.php", "Sign out.")
                );
                break;

            case 'instractor':
                // TODO: add in Sunday build
                break;

            case 'department_manager':
                // TODO: add in Sunday build
                break;

            case 'waiting user':
                $navbar_content = array(
                    array("#", "Home"),
                    array("about.php", "About us."),
                    array("contact.php", "contact us."),
                    array("logout.php", "Sign out.")
                );
                break;

            default:
                die('unregisterd user managed to get here dfuck!');
                break;
        }
    }
    else
    {// anonymous user
        $navbar_content = array(
            array("#", "Home"),
            array("login.php", "Login."),
            array("signup.php", "Sign up."),
            array("about.php", "About us."),
            array("contact.php", "contact us.")
        );
    }


    include ("templates/base.php");
?>
