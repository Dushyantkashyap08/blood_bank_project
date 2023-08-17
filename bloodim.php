<?php 
	session_start();
	include("common/connection.php");
	
	if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
		$query="delete from blooddetails where id=$id";
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
						<div class="dwidth">Blood Inventory Management</div>
						
						<!--dtable begins from here-->
						<table class="dtable" border="2" width="900">
							<tr>
								<th>Sr no.</th>
								<th>Blood Group</th>
								<th>Quantity</th>
								<th>Expiry Date</th>
								<th>Status</th>
								<th>ACTION</th>
							</tr>
						<?php
							$limit=4;
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
								$query="select * from blooddetails limit $start,$limit";
								$result=mysqli_query($connect,$query);
								$bg=0;
								while($row=mysqli_fetch_assoc($result))		
							{
								$bg++;
								?>
							 <tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['bloodgroup'];?></td>
								<td><?php echo $row['expirydate'];?></td>
								<td><?php echo $row['quantity']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<td>
									<a class="del" href="bloodim.php?did=<?php echo $row['id'] ?>">Delete</a>
									
									<a class="ed" href="blooddetails.php?eid=<?php echo $row['id'] ?>">Edit</a>
								</td>
							</tr>
								<?php
								$_SESSION['bloodgroup']=$bg;
								var_dump($_SESSION['bloodgroup']);
							}
						?>
							<tr>
								<td colspan="7">
									<?php
									  $query="select * from blooddetails";
									  $result=mysqli_query($connect,$query);
									  $count=mysqli_num_rows($result);
									  $pages=ceil($count/$limit);
									  for($i=1 ;$i<=$pages; $i++)
									  {
										?>
											<a href="bloodim.php?p=<?php echo $i;?>"><?php echo $i;?></a>
										<?php
									  }
									?>
								</td>
							</tr>
						</table>
						<!--dtable ends here-->
						
					</div>
					<!--middlecontainer ends here-->
					
				</div>
				<!--innercontainer ends here-->
				
			</div>
			<!--content ends here-->
		
	</body>
	<!--body ends here-->
</html>