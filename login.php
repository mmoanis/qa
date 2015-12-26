<?php session_start(); ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Cairo University, Faculty of Engineering.</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="static-files/css/loginnormalize.css">
    <link rel="stylesheet" href="static-files/css/loginstyle.css">
    <script src="static-files/js/loginprefixfree.min.js"></script>
  </head>

  <body>
      <div class="wrapper">
<?php
  // if user is already loged in, redirect him to the homepage.
  if (isset($_SESSION['user_id']))
  {
      echo "<p>You are already Loged in, you will be redirected to the homepage ...</p>";
      header('refresh:4; url=http://localhost/qa/index.php');
		die();
  }
  else
  {
      // check for login credentials, if user submit login request
      if (isset($_POST['username']) && isset($_POST['password']))
      {
          require("database/selectQuires.php");
          $ret = getUserInfoByCredential($_POST['username'], $_POST['password']);
          if ($ret == false)
          {
              echo "<p>Bad username and password combination, try again!</p>";
              header('refresh:4; url=http://localhost/qa/login.php');
      		die();
          }
          else
          {
              $_SESSION['user_id'] = $ret['ID'];
              $type = getUserTypeByID($ret['ID']);
              $_SESSION['type']  = $type;

              if (strcmp($type, 'qa_member') == 0)
              {
                  echo "<p>Welcome QA Member, you will be redirected to the homepage ...</p>";
                  header('refresh:4; url=http://localhost/qa/quality-assurance/index.php');
          		die();
              }
              else if (strcmp($type, 'admin') == 0)
              {
                  echo "<p>Welcome Admin<p>";
                  header('refresh:4; url=http://localhost/qa/admin/index.php');
          		die();
              }
              else if (strcmp($type, 'instractor') == 0)
              {
                  echo "<p>Welcome Instructor, you will be redirected to the homepage ...</p>";
                  header('refresh:4;url=http://localhost/qa/instructor/index.php');
          		die();
              }
              else if (strcmp($type, 'department_manager') == 0)
              {
                  echo "<p>Welcome Department Manager, you will be redirected to the homepage ...</p>";
                  header('refresh:4; url=http://localhost/qa/department-managment/index.php');
          		die();
              }
              else
              {
                  echo "<p>There was a problem on login, please contact website support!</p>";
                  unset($_SESSION['user_id']);
                  unset($_SESSION['type']);
                  header('refresh:4; url=http://localhost/qa/index.php');
          		die();
              }
          }
      }
      else
      {
             echo ' <form class="login" action="login.php" method="POST">
                <p class="title">Log in</p>
                <input type="text" name="username" placeholder="Username" autofocus required/>
                <i class="fa fa-user"></i>
                <input type="password" name="password" placeholder="Password" required/>

                <i class="fa fa-key"></i>
                <a href="#">Forgot your password?</a>
                <button>
                  <i class="spinner"></i>
                  <span class="state">Log in</span>
                </button>
            </form>';
      }
  }
?>
        <footer><p>Cairo University, Faculty of Engineering.</p></footer>
    </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <!--<script src="static-files/js/loginindex.js"></script>-->
  </body>
</html>
