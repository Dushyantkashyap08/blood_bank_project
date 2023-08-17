<?php 
	include("common/connection.php");
	
	if(!empty($_POST['save']))
	{
		$fullname=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['pass'];
		
		$email_query="select * from signup where email='$email'";
		
		$email_result=mysqli_query($connect ,$email_query);
		$email_count=mysqli_num_rows($email_result);
		if($email_count)
		{
			echo"this email exist already please try another one";
		}
		else
		{
			$query="insert into signup (fullname,email,password) values ('$fullname','$email','$password')";
			if($result=mysqli_query($connect,$query))
			{
				
				?>
					<script>
						alert("SignUp Successful");
					</script>
				<?php
			}
			else
			{
				?>
					<script>
						alert("SignUp NOT Successful");
					</script>
				<?php
			}
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
				<div class="midd">
				
					<!--form begins from here-->
					<form class="form" method="post">
						<p class="login">Create An Account</p>
						
						<input type="text" name="name" placeholder="Name" class="f" /><br>
						<input type="text" name="email" placeholder="Email Address" class="f" /><br>
						<input type="password" name="pass" placeholder="Password" class="f" /><br>
						<input type="submit" value="Register" name="save" class="Lbutton" /><br>
						<p class="log">Already have an Account?<a href="login.php">        Login now</a></p>
					</form>
					<!--form ends here-->
					
				</div>
				<!--midd ends here-->
				
			</div>
			<!--content ends here-->
	</body>
	<!--body ends here-->
</html>