<style>
	#header {
		background: rgba(4, 40, 68, 0.85);
		color:white;
		text-align:center;
		padding:10px;
	}
	#header-inside {
		background-image: url(static-files/images/headerbanner.png);
		background-size: 950px;
		background-repeat: no-repeat;
		width: 1000px;
		height: 100px;
		margin: auto;
		position: relative;
	}
	#logo{
		float: left;
		padding-top: 0px;
		padding-left: 450px;
		position: absolute;
	}
	img {
		border: none;
	}
	#navi {
		height: 67px;
		width: 1024px;
		padding-top: 75px;
		padding-left: 270px;
		position: absolute;
	}

	#navi ul
	{
		text-align: left;
		margin: auto;
		width: 1024px;
	}

	#navi ul li
	{
		display: inline;
		padding: 0px;
		margin: 0px;
	}
		#signout{
		float: left;
		padding-top: 0px;
		padding-left: 700px;
		position: absolute;
	}
	#login{
		float: left;
		padding-top: 0px;
		padding-left: 1000px;
		position: absolute;
	}
	#signup{
		float: left;
		padding-top: 0px;
		padding-left: 1050px;
		position: absolute;
	}
	a:link{color:white;}
	a:visited{color:white;}
</style>

<div id="header">
	<div id="header-inside">
		<div id="logo">
			<a href="#"><img src="static-files/images/cairouniversity.png" width="90" height="80"/></a>
		</div>
		<div id="navi">
			<ul>
				<li><a href="index.php"><img src="static-files/images/home.png" alt="home"/></a></li>
				<li><a href="about.php"><img src="static-files/images/about.png" alt="about"/></a></li>
				<li><a href="contact.php"><img src="static-files/images/contact.png" alt="contact"/></a></li>
			</ul>
		</div>
		<div id="signup">
			<a href="signup.php">SignUp</a>
		</div>
		<div id="login">
			<a href="login.php">SignIn</a>
		</div>
	</div>
</div>
