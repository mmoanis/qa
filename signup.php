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
        require('database/models.php');
        

        if (strlen($username) > 30)
        {
            $error = '<li>Username must be less than 30 characters.</li>';
        }
        else if (checkUserNameExists($username))
        {
            $error = '<li>Username already exists.</li>';
        }

        if (strlen($name) > 30)
        {
            $error .= '<li>Name must be less than 30 characters.</li>';
        }

        if (strlen($password) > 30)
        {
            $error .= '<li>Password must be less than 30 characters.</li>';
        }

        // TODO: uncomment on deploy, and check email not used before
        //if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
        //{
        //  $error .= 'Not Valide Email Address.\n';
        //}
        if (checkEmailExists($email))
        {
            $error .= '<li>User email already exists.</li>';
        }

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
            echo '<div style="color:white;">';
            echo "<h1> The following errors occured, fix them and try again. </h1>";
            echo '<ol>' . $error . "</ol></div>";
            header('refresh:5; url=http://localhost/qa/signup.php');
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
