<?php
    session_start();

    if (isset($_SESSION['user_id']))
    {
        header('Location: http://localhost/qa/index.php');
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
</head>

    <body>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="http://localhost/qa/static-files/css/signupstyle.css">

<?php
    if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']))
    {
        $username  = $_POST['username'];
        $password  = $_POST['password'];
        $name      = $_POST['name'];
        $email     = $_POST['email'];

        $error = false;

        // validate input for duplicates
        require('database/insetQuires.php');
        //require("database/selectQuires.php");

        if (!$error)
        {
            if (insertUser($name,$username,$password,$email))
            {
                echo "<p>Registration is done!, you will be redirected in a second ...</p>";
                header('refresh:1; url=http://localhost/qa/pending.php');
            }
            else
            {
                echo "<p>Oops, Something went wrong! Try again and if you see this message again contact the technical support.</p>";
                header('refresh:3; url=http://localhost/qa/signup.php');
            }
        }
        else
        {
            echo "<h1> The following errors occured, fix them and try again. </h1>";
            echo "<p>" . $error . "</p>";
            header('refresh:3; url=http://localhost/qa/signup.php');
        }

        unset($_POST['email']);
        unset($_POST['username']);
        unset($_POST['name']);
        unset($_POST['password']);
        die();
    }
    else
    {
        echo '<div class="testbox">
          <h1>Registration</h1>

          <form action="signup.php" method="POST">
            <hr>
            <label id="icon" for="name"><i class="icon-envelope "></i></label>
            <input type="text" name="email" placeholder="Email" required/>

            <label id="icon" for="name"><i class="icon-user"></i></label>
            <input type="text" name="name" placeholder="Name" required/>

            <label id="icon" for="username"><i class="icon-user"></i></label>
            <input type="text" name="username" placeholder="Username" required/>

            <label id="icon" for="name"><i class="icon-shield"></i></label>
            <input type="password" name="password" placeholder="Password" required/>

            <p>Once registerd, you will need admin approval to enable your account!</p>
            <!--<a href="#" class="button">Register</a>-->
            <input class="button" type="submit" value="Register" />

          </form>
        </div>';
    }
?>
    </body>
<html>
