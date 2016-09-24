<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>
<body>
<?php

	$txt1="Hello World!";
	$txt2="What a nice day!";
	echo $txt1 . " " . $txt2;
	?>
<?php
	
	$petlist = array('dog', 'cat', 'lion', 'horse');
	$r = rand(0,3);
	echo 'pet number '.$r.' is '.$petlist[$r].'<br>';
	
	foreach ($petlist as $pet) {
		echo 'Pet is '.$pet.'<br>';
	}
	?>
    
<hr>

<?php
	function myFunction ($str){
		echo 'Wee - myFuction was called with the parameter '.$str.'<br>'.PHP_EQL;
		}
	?>
</body>
</html>