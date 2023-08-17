<?php
	include("common/connection.php");
	
	if(isset($_POST['save']))
	{
		$name = $_POST['name'];
		$age = $_POST['age'];
		$mobile = $_POST['mobile'];
		$bgrp = $_POST['bgrp'];
		$units= $_POST['units'];
		
			if(!empty($_POST['editid']))
		{
			$id = $_POST['editid'];
			$query = "UPDATE requestform SET name='$name', age='$age', mobile='$mobile', bloodgroup='$bgrp' WHERE Id=$id";
			if($result=mysqli_query($connect, $query))
			{ 
				header('location: bloodrm.php');    
			} 
		}
		else
		{
			$query = "INSERT INTO requestform (name, age, mobile, bloodgroup, units) VALUES ('$name', '$age','$mobile', '$bgrp','$units')";
		}		
		if(mysqli_query($connect, $query))
		{
			?>
			<script>
				alert("Thank You! We will get back to you soon");
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
	
	if(!empty($_GET['eid']))
	{
		$id=$_GET['eid'];
		$query="select * from requestform where Id=$id";
		$result=mysqli_query($connect,$query);
		$row=mysqli_fetch_assoc($result);
	}
?>
<html>
	<head>
		<title>blood_bank</title>
		<link rel="stylesheet" href="css/style.css"/>
		
	</head>
	<!--body begins from here-->
	<body>
		
		<!--head begins from  here-->
			<?php include("common/head.php"); ?>
		<!--head ends here-->
		
		<!--mid-section begins from here-->
		<div class="mid-section">
			
			<!--donor-content begins from here-->
			<div class="donor-content">
				
					<p class="wbd">Welcome To Blood Request</p>
			
					<img class="bb" src="images/precautions.jpg"/>
					
					<!--donorform begins from here-->
					<div class="donorform">
					
						<!--rform begins from here-->
						<form class="rform" method="post">
							<p class="login">Blood Request Form</p>
							
							<input type="hidden" value="<?php if(!empty($row['Id'])) echo $row['Id']?>" name="editid" />
							
							<input type="text" value="<?php if(!empty($row['name'])) echo $row['name']?>" name="name" placeholder="Patient's Name" class="f" /><br>
							
							<input type="text" value="<?php if(!empty($row['age'])) echo $row['age']?>" name="age" placeholder="Patient's Age" class="f" /><br>
							
							<input type="text" value="<?php if(!empty($row['mobile'])) echo $row['mobile']?>" name="mobile" placeholder="Patient's Mobile" class="f" /><br>
							
							<input type="text" value="<?php if(!empty($row['bloodgroup'])) echo $row['bloodgroup']?>" name="bgrp" placeholder="Required Blood Group" class="f" /><br>
							
							<input type="text" value="<?php if(!empty($row['units'])) echo $row['units']?>" name="units" placeholder="No. of Units Required" class="f" /><br>
							
						  <input type="submit" name="save" value="Submit" class="s" />
						</form>
						<!--rform ends here-->
						
				   </div>
				   <!--donorform ends here-->
				   
			</div>
			<!--donor-content ends here-->
			
		</div>
		<!--mid-section ends here-->
		
	</body>
	<!--body ends here-->
</html>