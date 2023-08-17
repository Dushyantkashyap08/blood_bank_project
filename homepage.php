<?php
	session_start();
	include("common/connection.php");
	
	if(empty($_SESSION['username']))
	{
		header('location:login.php');
	}
	
?>
<html>
	<head>
		<title>homepage</title>
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
		
		<!--mid-section begins from here-->
		<div class="mid-section">
			
			<!--homepage begins from here-->
			<div class="homepage">
				<img class="homepage" src="images/homepage.jpg"/>
					
					<!--support begins from here-->
					<p class="support">
						Support the needy ones today,
						and become a part of this campaign !!
					</p>
					<!--support ends here-->
					
					<?php 
						 if(!empty($_SESSION['username']))
						{
							?>
							<a href="index1.php"><input type="submit" name="donor"  value="Become A Donor" class="donor-opt" /></a>
							<?php		
							
						}
						else
						{
							?>
							<a href="login.php"><input type="submit" class="donor-opt" name="loginnow" value="click here to login"></a>
							<?php	
						}
					?>
					<br>
				<img class="b1" src="images/b1.jpg" />
			</div>
			<!--homepage ends here-->
			
		</div>
		<!--mid-section ends here-->
		
	</body>
	<!--body ends here-->
</html>