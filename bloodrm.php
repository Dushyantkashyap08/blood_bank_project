<?php
	session_start();
	
	include("common/connection.php");
	
	if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
		$query="delete from requestform where id=$id";
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
						<div class="dwidth">Blood Request Management</div>
						
						<!--dtable begins from here-->
						<table class="dtable" border="2" width="900">
							<tr>
								<th>Id</th>
								<th>Patient's Name</th>
								<th>Age</th>
								<th>Mobile no.</th>
								<th>Req. Blood group</th>
								<th>No.of Units</th>
								<th>ACTION</th>
							</tr>
							
							<?php
								$limit=7;
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
								$query="select * from requestform limit $start,$limit";
								$result=mysqli_query($connect,$query);
								$r=0;
								while($row=mysqli_fetch_assoc($result))		
							{
								$r++;
								?>
							 <tr>
								<td><?php echo $row['Id']; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['age'];?></td>
								<td><?php echo $row['mobile'];?></td>
								<td><?php echo $row['bloodgroup']; ?></td>
								<td><?php echo $row['units']; ?></td>
								<td>
									<a class="del" href="bloodrm.php?did=<?php echo $row['Id'] ?>">Delete</a>
									
									<a class="ed" href="index2.php?eid=<?php echo $row['Id'] ?>">Edit</a>
								</td>
							</tr>
							<?php
							$_SESSION['request'] = $r;
							
							var_dump($_SESSION['request']);
							// die();
					
							}
						?>
							<tr>
								<td colspan="7">
									<?php
									  $query="select * from requestform";
									  $result=mysqli_query($connect,$query);
									  $count=mysqli_num_rows($result);
									  $pages=ceil($count/$limit);
									  for($i=1 ;$i<=$pages; $i++)
									  {
										?>
											<a href="bloodrm.php?p=<?php echo $i;?>"><?php echo $i;?></a>
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
