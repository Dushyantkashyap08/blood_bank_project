<?php session_start(); 

	include("common/connection.php");
	
	if(!empty($_POST['save']))
{
		$bankname = $_POST['bn'];
		$contact = $_POST['econ'];
		$city = $_POST['ec'];
		$status = $_POST['status'];
		
	if(!empty($_POST['editid']))
	{
        $id = $_POST['editid'];
        $query = "update bankdetails set bankname='$bankname', contact=$contact, city='$city', status='$status' where id=$id";
        if($result=mysqli_query($connect, $query))
		{ 
            header('location: bloodbm.php');    
        } 
	}
	else 
	{
        $query = "insert into bankdetails (bankname, contact, city, status) VALUES('$bankname','$contact','$city','$status')";
	}
        if($result=mysqli_query($connect, $query))
		{
			header('location: bloodbm.php');  
		}
}
	
	if(!empty($_GET['eid']))
	{
		$id=$_GET['eid'];
		$query="select * from bankdetails where id=$id";
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
	<!--body starts from here-->
	<body>
	
		<!--header begins from here-->
			<?php include("common/header.php")?>
		<!--header ends here-->
			
			<!--content starts from here-->
			<div class="content">
				
				<!--innercontainer starts from here-->
				<div class="innercontainer">
					
					<!--sidebar begins from here-->
						<?php include("common/sidebar.php")?>
					<!--sidebar ends here-->
					
					<!--middlecontainer starts from here-->
					<div class="middlecontainer">
						
							<div class="donor">Add Blood Bank</div>
							
							<!--main starts from here-->
							<div class="main">
									
								<!--form starts from here-->
								<form method="post" enctype="multipart/form-data" >
									<input type="hidden" name="editid" value="<?php if(!empty($r['id'])) echo $r['id'];?>" />
									
									<!--table starts from here-->
										<table>
											
											<tr>
												<td class="right">Enter Blood Bank Name*</td>
												<td><input type="text" value="<?php if(!empty($r['bankname'])) echo $r['bankname'];?>" name="bn" class="text"></td>
											</tr>
											<tr>
												<td class="right">Enter Contact*</td>
												<td><input type="text" value="<?php if(!empty($r['contact'])) echo $r['contact'];?>" name="econ" class="text"></td>
											</tr>
											<tr>
												<td class="right">Enter City*</td>
												<td><input type="text" value="<?php if(!empty($r['city'])) echo $r['city'];?>"  name="ec" class="text"></td>
											</tr>
											<tr>
												<td class="right">Status*</td>
												<td><input type="text" value="<?php if(!empty($r['status'])) echo $r['status'];?>"  name="status" class="text"></td>
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
			<!--conainer ends here-->	
			
	</body>
	<!--body ends here-->
</html>