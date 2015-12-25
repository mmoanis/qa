<style>
	#nav {
	    line-height:40px;
	    background-color:grey;
	    height:462px;
	    width:100px;
	    float:left;
	    padding:5px;
	}
</style>

<div id="nav">
	<?php
		foreach ($navbar_content as $value)
		{
			echo "<a href=" . $value[0] . ">". $value[1] . "</a><br>";
		}
	?>
</div>
