<?php 
$_SESSION['verify'] = true; // Initialize the session variable

	include("common/connection.php");
	
	if(!empty($_POST['save']))
{
		$name = $_POST['name'];
		$age = $_POST['age'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$bgrp = $_POST['bgrp'];
		$city = $_POST['city'];
		
		
	if(!empty($_POST['editid']))
	{
        $id = $_POST['editid'];
        $query = "UPDATE donorform SET name='$name', age='$age', mobile='$mobile', bloodgroup='$bgrp', city='$city' WHERE id=$id";
        if($result=mysqli_query($connect, $query))
		{ 
            header('location: donor.php');    
        } 
	}
	else 
	{
        $query = "INSERT INTO donorform (name, age, mobile, email, bloodgroup, city) VALUES('$name','$age','$mobile','$email','$bgrp','$city')";
	}
        if($result=mysqli_query($connect, $query))
		{
            ?>
            <script>
                alert("Thank You! We will get back to you soon");
            </script>
            <?php
			include("send_email.php");
			$_SESSION['verify']="set";
			 
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
	if(!empty($_GET['eid']))
	{
		$id=$_GET['eid'];
		$query="select * from donorform where id=$id";
		$result=mysqli_query($connect,$query);
		$row=mysqli_fetch_assoc($result);
	}
?>
<html>
	<head>
		<title>blood_bank</title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<!--body begins from  here-->
	<body>
	
		<!--head begins from  here-->
			<?php include("common/head.php"); ?>
		<!--head ends here-->
		
		<!--mid-section begins from  here-->
		<div class="mid-section">
		
			<!--donor-content begins from  here-->
			<div class="donor-content">
				
				<marquee><p class="wbd">Welcome To Blood Donation</p></marquee>
			
				<img class="bb" src="images/bloodbenifits.png"/>
					
				<!--donorform begins from  here-->	
				<div class="donorform">
					
					<!--rform begins from  here-->
					<form class="rform" method="POST">
						<p class="login">Donor Form</p>
						<input type="hidden" value="<?php if(!empty($row['Id'])) echo $row['Id']?>" name="editid" />
						
						<input type="text" value="<?php if(!empty($row['name'])) echo $row['name']?>" name="name" placeholder="Volunteer's Name" class="f" /><br>
						
						<input type="text" value="<?php if(!empty($row['age'])) echo $row['age']?>" name="age" placeholder="Volunteer's Age" class="f" /><br>
						
						<input type="text" value="<?php if(!empty($row['mobile'])) echo $row['mobile']?>" name="mobile" placeholder="Volunteer's Mobile No." class="f" /><br>
						
						<input type="text" value="<?php if(!empty($row['email'])) echo $row['email']?>" name="email" placeholder="Volunteer's Email" class="f" /><br>
						
						<input type="text" value="<?php if(!empty($row['bloodgroup'])) echo $row['bloodgroup']?>" name="bgrp" placeholder="Volunteer's Blood Group" class="f" /><br>
						
						<input type="text" value="<?php if(!empty($row['city'])) echo $row['city']?>" name="city" placeholder="Volunteer's City" class="f" /><br>
						
						<input type="submit" name="save" value="Submit" class="s" />
					</form>
					<!--rform ends  here-->
					
				</div>
				<!--donorform ends  here-->
				
			</div>
			<!--donor-content ends  here-->
			
		</div>
		<!--mid-section ends  here-->
		
		<!--footer starts here-->
			<?php include("common/footer.php"); ?>
		<!--footer ends here-->
		
	</body>
	<!--body ends  here-->
</html>

