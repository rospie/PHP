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
<meta charset="UTF-8">
<title>HALP</title>
</head>

<body>
<?php
		//2. esablishing the connection using a mysql object

		$connection = new MySQLi(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
		//transferring special characters correctly
		$connection->set_charset("utf8");

		//3. connection check

		if($connection->connect_error){
			die($connection->connect_error);
		} else {
			echo '<h1>Succesfull connection to SQL server</h1>';
		};
		
		//4.formulating the SQL query
		$data = $connection->query("SELECT * FROM subjects");
		
		//5. pack and retrieve the data
		
		$result = $data->fetch_array();
		print_r($result);
		
		echo '<hr>';
		
		echo '<ul>';
		// echoing the first tablefield id
		echo '<li>' . $result['id'] . '</li>';
		echo '<li>' . $result['subject'] . '</li>';
		echo '<li>' . $result['description'] . '</li>';
		echo '<li>' . $result['ects'] . '</li>';
		
		echo'</ul>';
?>
	<h2>Dynamically rendered html table</h2>
	<table border="1" bordercolor="#DA1D20">
		<tr><th colspan="5">Subjects from the multimedia design education</th></tr>
		<tr><td>ID</td><td>subject</td><td>description</td><td>ECTS</td><td>image</td></tr>
        <!--- Dynamic part of the table --->
        <?php
		//new query
		$data_1 = $connection->query("SELECT * FROM subjects");
        //as long as there are brackets in the database
		while($result = $data->fetch_array()){
			echo '<tr>';
			echo '<td>' . $result['id'] . '</td>';
			echo '<td>' . $result['subject'] . '</td>';
			echo '<td>' . $result['description'] . '</td>';
			echo '<td>' . $result['ects'] . '</td>';
			// inserting an image if present!
			echo '<td>';
				if($result['img']){
			echo '<img src="' .$result['img'] . '" alt="' . $result['subject'] . '" width="50px">';
				} else {
			echo 'no image'; 
				}
			echo '</td>';
			echo '</tr>';
		}
		?>
	</table>
</body>
</html>



