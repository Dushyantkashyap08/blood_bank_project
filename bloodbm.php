<?php
    session_start();
	
	include("common/connection.php");
	
	if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
		$query="delete from bankdetails where id=$id";
		mysqli_query($connect,$query);
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
						<div class="dwidth">Blood Bank Management</div>
						
						<!--dtable starts from here-->
						<table class="dtable" border="2" width="900">
							<tr>
								<th>Id</th>
								<th>Bank Name</th>
								<th>Contact</th>
								<th>City</th>
								<th>Status</th>
								<th>ACTION</th>
							</tr>
							<?php
							$limit=5;
								if(empty($_GET['p']))
								{
									$start=0;
								}
								else
								{
									$pi=$_GET['p'];
									$end=$pi*$limit;
									$start=$end-$limit;
								}
								$query="select * from bankdetails limit $start,$limit";
								$result=mysqli_query($connect,$query);
								$bb=0;
								while($row=mysqli_fetch_assoc($result))		
							{
								$bb++;
								?>
							 <tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['bankname'];?></td>
								<td><?php echo $row['contact'];?></td>
								<td><?php echo $row['city']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<td>
									<a class="del" href="bloodbm.php?did=<?php echo $row['id'] ?>">Delete</a>
									
									<a class="ed" href="bankdetails.php?eid=<?php echo $row['id'] ?>">Edit</a>
								</td>
							</tr>
								<?php
								$_SESSION['bloodbank']=$bb;
								var_dump($_SESSION['bloodbank']);
							}
						?>
							<tr>
								<td colspan="7">
									<?php
										$query="select * from bankdetails";
										  $result=mysqli_query($connect,$query);
										  $count=mysqli_num_rows($result);
										  $pages=ceil($count/$limit);// ceil function takes upper value of a decimal digit eg: 5.72 will be changed to 6
										  // echo $pages;
										  // count will be total no. of rows in table and limit will be how many rows will be shown in each page 
										  for($i=1 ;$i<=$pages; $i++)
										  {
											?>
												<a href="bloodbm.php?p=<?php echo $i;?>"><?php echo $i;?></a>
											<?php
										  }
										?>
								</td>
							</tr>
						</table>
						<!--dtable ends  here-->
						
					</div>
					<!--middlecontainer ends  here-->
					
				</div>
				<!--innercontainer ends  here-->
				
			</div>
			<!--content ends  here-->
	
	</body>
	<!--body ends  here-->
</html>