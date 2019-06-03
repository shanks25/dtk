<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Mail Send</title>
	</head>
	<body>
			
			<h3>You Have Received Catering Enquiry From Website</h3>
	
		<ul>
			
			<li>Name=<?php echo e($name); ?></li>
		        <li>Mobile=<?php echo e($mobile); ?></li>
			<li>Email=<?php echo e($email); ?></li>
			<li>Address:<?php echo e($address); ?></li>
                       	<li>Message=<?php echo e($msg); ?></li>


		</ul>


	</body>
	</html>	