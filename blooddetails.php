<?php
	session_start();
	
	include("common/connection.php");
	
	
	if(!empty($_POST['save']))
	{
		$bloodgroup = $_POST['bg'];
		$quantity = $_POST['eq'];
		$expiry = $_POST['ed'];
		$status = $_POST['status'];
		
		if(!empty($_POST['editid']))
		{
		   $id = $_POST['editid'];
		   $query="update blooddetails set bloodgroup='$bloodgroup', quantity='$quantity', expirydate='$expiry', status='$status' where id=$id";
			if($result=mysqli_query($connect, $query))
			{ 
				header('location: bloodim.php');    
			} 
		}
		else
		{
		$query = "INSERT INTO blooddetails (bloodgroup, quantity, expirydate, status) VALUES ('$bloodgroup', '$quantity','$expiry','$status')";
		}
		
		if(mysqli_query($connect, $query))
		{
			header('location: bloodim.php');  
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
		$query="select * from blooddetails where id=$id";
		$result=mysqli_query($connect,$query);
		$r=mysqli_fetch_assoc($result);
	}
	
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
						
						<div class="donor">Add Blood Details</div>
							
						<!--main begins from here-->	
						<div class="main">
									
							<!--form begins from here-->		
							<form method="post">
							<input type="hidden" name="editid" value="<?php if(!empty($r['id'])) echo $r['id'];?>" />
								<!--table begins from here-->
								<table>
										
									<tr>
										<td class="right">Enter Blood Group*</td>
										<td><input type="text"  value="<?php if(!empty($r['bloodgroup'])) echo $r['bloodgroup'];?>"name="bg" class="text"></td>
									</tr>
									<tr>
										<td class="right">Enter Quantity*</td>
										<td><input type="text" value="<?php if(!empty($r['quantity'])) echo $r['quantity'];?>" name="eq" class="text"></td>
									</tr>
									<tr>
										<td class="right">Expiry Date*</td>
										<td><input type="text" value="<?php if(!empty($r['expirydate'])) echo $r['expirydate'];?>" name="ed" class="text"></td>
									</tr>
									<tr>
										<td class="right">Status*</td>
										<td><input type="text" value="<?php if(!empty($r['status'])) echo $r['status'];?>" name="status" class="text"></td>
									</tr>
									
								</table>
								<!--table ends here-->
								
								<input type="submit" name="save" class="B" id="save" value="Save"/>
								<input type="button"  class="B" id="cancel" value="Cancel"/>
							</form>
							<!--form ends here-->
						</div>
						<!--main ends here-->		
						
					</div>
					<!--middlecontainer ends here-->
					
				</div>
				<!--innercontainer ends here-->
				
			</div>
			<!--content ends here-->
			
	</body>
	<!--body ends here-->
</html>