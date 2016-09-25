<link rel="stylesheet" type="text/css" href="active_menu.css">

<nav>
	<ul>
		<li><a href="menu_p1.php"<?php if($curpage == 'menu_p1.php') {echo 'class="active"';}?>>home</a></li>
    	<li><a href="menu_p2.php"<?php if($curpage == 'menu_p2.php') {echo 'class="active"';}?>>about</a></li>
    	<li><a href="menu_p3.php"<?php if($curpage == 'menu_p3.php') {echo 'class="active"';}?>>project</a></li>
    	<li><a href="menu_p4.php"<?php if($curpage == 'menu_p4.php') {echo 'class="active"';}?>>contact</a></li>
	</ul>
</nav>