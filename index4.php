<?php
	include("common/connection.php");
	
	if(!empty($_POST['save']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$message = $_POST['message'];
		
		$query = "INSERT INTO contactus (name, email, contact, message) VALUES ('$name', '$email', '$contact', '$message')";
		
		if(mysqli_query($connect, $query))
		{
			?>
			<script>
				alert("Thanks for submitting your query! We will get back to you soon");
			</script>	
			<?php
		}
        else
		{
			?>
			<script>
				alert("Record not inserted");
			</script>	
			<?php
		}
	}
?>
<html>
	<head>
		<title>admin panel</title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<!--body begins from here-->	
	<body>
		
		<!--head begins from here-->
		<div class="head">
			
			<!--B begins from here-->
			<div class="B">
				<img class="blood" src="images/blooddonation.jpg"/>
			</div>
			<!--B ends here-->
				
			<!--nav begins from here-->	
			<div class="nav">
				<ul>
					<li><a href="homepage.php">Home</a></li>
					
					<?php
					
						if(empty($_SESSION['username']))
						{
					?>
							<li><a href="login.php">Login</a></li>
					<?php	
						}
						else
						{
					?>
							<li><a href="login.php?log=1">Logout</a></li>
					<?php		
						}
					?>
					<li><a href="signup.php">Sign Up</a></li>
					<li><a href="">Support Us</a></li>
					<li><a href="index4.php">Contact Us</a></li>
				</ul>
			</div>
			<!--nav ends here-->
			
		</div>
		<!--head ends here-->
		
			<!--content begins from here-->
			<div class="content">
			
				<!--midd begins from here-->
				<div class="mid">
				
					<!--form begins from here-->
					<form class="form" method="post">
						<p class="login">Contact-Us</p>
						
						<input type="text" name="name" placeholder="Enter Your Name" class="f" /><br>
						<input type="text" name="email" placeholder="Enter Email" class="f" /><br>
						<input type="text" name="contact" placeholder="Contact no." class="f" /><br>
						<input type="textarea" name="message" placeholder="Your Message..." class="msg" id="textarea" /><br>
										   
					  <input type="submit" name="save" value="Submit" class="s" />
					</form>
					<!--form ends here-->
					
				</div>
				<!--midd ends here-->
				
			</div>
			<!--content ends here-->
	
	</body>
	<!--body ends here-->
</html>
