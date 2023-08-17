<?php 	session_start();
	include("common/connection.php");

	
	if(empty($_SESSION['username']))
	{
		header('location:login.php');
	}
?>
<html>
	<head>
		<title>admin panel</title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<!--body begins from here-->
	<body>
			
			<!--header begins from here-->
				<?php include("common/header.php")?>
			<!--header ends here-->
			
			<!--content begins from here-->
			<div class="content">
				
				<!--innercontainer begins from here-->
				<div class="innercontainer">
					
					<!--sidebar begins from here-->
						<?php include("common/sidebar.php")?>
					<!--sidebar ends here-->
					
					<!--middlecontainer begins from here-->
					<div class="middlecontainer">
						<div class="donor">Dashboard</div>
						
						<?php
							$n = $_SESSION['num'];
						?>
						
							<!--donors begins from here-->
							<div class="dp" id="donors">
								<p>DONORS</p>
								<img class="icon" src="images/donor.jpg"/>
								<p class="countt"><?php echo $n; ?></p>
							</div>
							<!--donors end here-->
							
						<?php
							$r = $_SESSION['request'];
						?>
							
							<!--patients begins from here-->
							<div class="dp" id="patients">
								<p>PATIENTS</p>
								<img class="icon" src="images/patient.jpg"/>
								<p class="countt"><?php echo $r; ?></p>
							</div>
							<!--patients ends here-->
							
						<?php
							$c = $_SESSION['contact'];
						?>	
							
							<!--cqueries begins from here-->
							<div class="dp" id="cqueries">
								<p>QUERIES</p>
								<img class="icon" src="images/form.jpg"/>
								<p class="countt"><?php echo $c; ?></p>
							</div>
							<!--cqueries ends here-->
						
						<?php
							$bg = $_SESSION['bloodgroup'];
						?>
							
							<!--rgb begins from here-->
							<div class="dpp" id="rbg">
								<p>REGISTERED BLOOD GROUPS</p>
								<img class="icon" src="images/registered.jpg"/>
								<p class="count"><?php echo $bg; ?></p>
							</div>
							<!--rgb ends here-->
							
							
						<?php
							$bb = $_SESSION['bloodbank'];
						?>		
							
							<!--rbb begins from here-->
							<div class="dpp" id="rbb">
								<p>REGISTERED BLOOD BANKS</p>
								<img class="icon" src="images/bbank.jpg"/>
								<p class="count"><?php echo $bb; ?></p>
							</div>
							<!--rbb ends here-->
					</div>
					<!--middlecontainer ends here-->
					
				</div>
				<!--innercontainer ends here-->
				
			</div>
			<!--content ends here-->
			
	</body>
	<!--body ends here-->
</html>