<!--
	Benjamin Kosty
	sendBill.php
	8/20/2023
-->

<?php
	include('include/connectDB.php');
	$sql = "SELECT * FROM customer WHERE (customer_ID =" . $_POST['customerID'] . ")";
	$result = mysqli_query($dbConn, $sql);
	$customerRecord = mysqli_fetch_array($result);
	
	if (!$customerRecord)
	{
		die('Error: ' .mysql_error());
	}
	
	$sql = "SELECT * FROM billing WHERE (customer_ID =" . $_POST['customerID'] . ")";
	$result = mysqli_query($dbConn, $sql);
	$billingRecord = mysqli_fetch_array($result);
	
	if (!$billingRecord)
	{
		die('Error: ' .mysql_error());
	}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Lee's Landscape - Sending Bill</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body style="background-color:#486F38;">
		<div align='center' width = '20%' border = '0'>
			<h1>Bill Email</h1>
			
			<?php
				echo "<p>Email = " . $customerRecord['customer_Email'] . "</p>";
				echo "<p>Customer = " .$customerRecord['customer_Title'] . $customerRecord['customer_F_Name'] . " " . $customerRecord['customer_L_Name'] ."</p>";
	
				//sending the email:
				$to = $customerRecord['customer_Email'];
				$from = "lee@leeslandscaping.com";
				$headers = "From: " . $from;
				$subject = "Lee's Landscaping update.";
				
				$remainingBalance = $billingRecord['customer_Bill'] - $billingRecord['amt_Paid'];
				if ($remainingBalance > 0)
				{
					$message = "Hello! \n\nYour remaining balance to pay is: \n" . $remainingBalance . " \n\nThanks\n-Lee (the man himself)";
				}
				else
				{
					$message = "Hello! \n\nThank you for your payment!\nI hope for continued business with you!\n\nThanks\n-Lee (the man himself)";
				}
		
				mail($to, $subject, $message, $headers);
				echo "Email sent.";
				
				include('include/closeDB.php');
			?>
			
		</div>
		
	</body>

</html>
