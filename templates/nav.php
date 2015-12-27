<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >Site Portal</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        	<?php
				foreach ($navbar_content as $value)
				{
					echo "<li><a href=" . $value[0] . ">". $value[1] . "</a></li>";
				}
			?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<?php
      		if($navbar_signup_login == true){
		        echo '<li><a href="http://localhost/qa/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		        <li><a href="http://localhost/qa/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
	    	}
	    	elseif($navbar_signup_login == false)
	    	{
	    		echo '<li><a href="http://localhost/qa/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
	    	}
        ?>
      </ul>
    </div>
  </div>
</nav>
