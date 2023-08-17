<?php
 session_start();
	include("common/connection.php");
	
	if(!empty($_POST['lsave']))
	{
		$admin="Admin";
		$user="User";
		$email=$_POST['email'];
		$password=$_POST['pass'];
		$role=$_POST['role'];
		
		$query2="select * from adminlogin where email='$email' and password='$password'";
		$result2=mysqli_query($connect,$query2);
		$count2=mysqli_num_rows($result2);
		
		$query="select * from signup where email='$email' and password='$password'";
		$result=mysqli_query($connect,$query);
		$count=mysqli_num_rows($result);
		if($count=mysqli_num_rows($result) || $count2=mysqli_num_rows($result2))
		{
			if($role==$admin && $count2==true)
			{
				?>
					<script>
						alert("Login Successful");
					</script>
					
				<?php
				$_SESSION['username']="set";
				header('location: dashboard.php');
			}
			else
			{
				?>
				<script>
					alert("Sorry you are not an admin");
				</script>
				
				<?php
			}
			if($role==$user && $count==true)
			{
				?>
				<script>
					alert("Login Successful");
				</script>
				
				<?php
				$_SESSION['username']="set";
				// $_SESSION['user']=$username;
				header('location: homepage.php');
			}
		}
		else
		{
			?>
				<script>
					alert("Login NOT Successful");
				</script>
			<?php
		}
	}
	if(!empty($_GET['log']))
		{
			session_destroy();
		}
?>

<?php		
	require_once 'vendor/autoload.php'; // Include Google Client Library
	

	//google part starts here
	$google_client = new Google_Client();
	$google_client->setClientId('816319585351-c915huo2fign5a13644s94hf5a1djnrv.apps.googleusercontent.com'); // Replace with your Client ID
	$google_client->setClientSecret('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'); // Replace with your Client Secret
	$google_client->setRedirectUri('http://localhost/phpproject/homepage.php'); // Replace with your Redirect URI
	$google_client->addScope("email");
	$google_client->addScope("profile");
	$_SESSION['username']="set";
	//google part ends here

	// facebook part starts here
	$fb = new Facebook\Facebook([
	  'app_id' => '2252264314973450',
	  'app_secret' => 'e08aff4ef25d51bbedc2cac1562e2683',
	  'default_graph_version' => 'v2.10',
	]);	
	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email']; 
	$loginUrl = $helper->getLoginUrl('http://localhost/phpproject/homepage.php', $permissions);
	// facebook part ends here
?>	

<html>
	<head>
		<title>admin panel</title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<!--boddy begins from here-->
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
		
			<!--mid begins from here-->
			<div class="mid">
			
				<!--form begins here-->
				<form class="form" method="post">
					<p class="login">Login</p>
					
					<input type="text" placeholder="Email Address"  name="email"class="f" /><br>
					<input type="password" placeholder="Password" name="pass"class="f " /><br>
					<p class="role">Select your Role:
						<select class="ropt" name="role">
							<option>Select</option>
							<option>Admin</option>
							<option>User</option>
						</select>
					</p>
					<input type="submit" value="Log In" name="lsave" class="Lbutton" /><br>
					<p class="log">Don't have an Account?<a href="signup.php">       Signup now</a></p>
					
					 
					<hr>
					<p class="or">Or</p>
					<hr class="line">
					
					<button class="google">
						<a href="<?php echo $google_client->createAuthUrl(); ?>">
							<img src="images/google.png" class="googleicon"/>LOGIN WITH GOOGLE
						</a>
					</button>
					
					<button class="facebook">
						<a href="<?php echo $loginUrl; ?>">
						<img src="images/fb.png" class="fbicon" />LOGIN WITH FACEBOOK
					</button>
					
				</form>
				<!--form ends here-->
				
			</div>
			<!--mid ends here-->
			
		</div>
		<!--content ends here-->
		
	</body>
	<!--body ends here-->
</html>