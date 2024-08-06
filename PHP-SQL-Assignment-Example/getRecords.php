<!--
	Benjamin Kosty
	getRecords.php
	8/13/2023
-->
<?php
	include('include/connectDB.php');
	
	$tableName = $_POST['tablename'];
	$sql = "SELECT * FROM " . $tableName;
	$qresult = mysqli_query($dbConn, $sql);
	
	
	
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Get Records</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body style="background-color:#b070d9;">
		<h1 align='center' width = '20%' border = '0'>Records: </h1>
		
			<?php
				if (mysqli_num_rows($qresult) > 0)
				{
					while ($table = mysqli_fetch_assoc($qresult))
					{
						echo "<table align = 'center' width = '20%' border = '5'>";
						foreach ($table as $key => $value)
							echo "<tr> <td>" . $key . ": </td> <td>" . $value . "</td> </tr>";
							
						echo "</table>";
					}
				}
			?>
		
	</body>

</html>