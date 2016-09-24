<?php
//connecting to a MySQL server using the mysqli method

//1.setting the connection CONSTANTS

define("HOSTNAME", "localhost");
define("MYSQLUSER", "root");
define("MYSQLPASS", "root");
define("MYSQLDB", "mil_r");


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Interface to Database</title>
</head>

<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
<p>Subject:</p>
<p><input type="text" name="subject" required></p>
<p>Description:</p>
<p><textarea name="description" rows="4" cols="50" required></textarea></p>
<p>ECTS:</p>
<p><input type="number" name="ects" required></p>
<p>Choose image (optional):</p>
<p><input type="file" name="fileToUpload"></p>
<input type="submit" name="addSubject" value="Add a new subject">
</form>
<?php 
// check if submit button was used:
if(isset($_POST['addSubject'])){
	// acquiring connection data
	require_once('database_cn.php');
	$connection = new MySQLi(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
	// transferring "special" characters correctly
	$connection->set_charset("utf8");
	// grabbing user input:
	$subject = mysqli_real_escape_string($connection, $_POST['subject']);
	$description = mysqli_real_escape_string($connection, $_POST['description']);
	$ects = $_POST['ects'];
	/////////////////////////
	///// Image upload  /////
	/////////////////////////

	$uploadOk = 0;

	if(!empty($_FILES['fileToUpload']['name'])) {
 
	$target_dir = "images/"; //specifies the directory where the file is going to be placed
	$target_file = $target_dir . basename($_FILES['fileToUpload']['name']); //specifies the path of the file to be uploaded
	$uploadOk = 1;
	move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file); //tmp_name contains the actual copy of your file content on the server
	echo "The image ". basename( $_FILES['fileToUpload']['name']). " has been uploaded - ";
		} else {
    		echo "No image uploaded. ";
    			}
 
	/////////// END image upload ////////////
	
	if($uploadOk == 1){
$sqlUpdate = "INSERT INTO subjects (subject, description, ects, img) VALUES ('$subject', '$description', '$ects', '$target_file')";
} else {
$sqlUpdate = "INSERT INTO subjects (subject, descritpion, ects) VALUES ('$subject', '$description', '$ects')"; 
}
	
	// "old" SQL query, inserting values into the table
	// $update = $connection->query("INSERT INTO subjects (subject, description, ects) VALUES ('$subject', '$description', '$ects')");
	// is $update true? Is the query executing correctly?
	if(mysqli_query($connection, $sqlUpdate)){
		echo 'New Subject added to database!';
	}else {
		echo 'Oooops - I did it again...';
	}
	//close connection:
	mysqli_close($connection);
///////////////////
//// end if isset:	
}
?>
</body>
</html>






