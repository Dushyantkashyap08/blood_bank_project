<?php
	session_start();
	
	include("common/connection.php");
	
	if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
		$query="delete from donorform where id=$id";
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
				
				<!--innerontainer begins from here-->
				<div class="innercontainer">
					
					<!--sidebar begins from here-->
						<?php include("common/sidebar.php")?>
					<!--sidebar ends here-->
					
					<!--middlecontainer begins from here-->
					<div class="middlecontainer">
						<div class="dwidth">Donor Management</div>
						
						<!--dtable begins from here-->
						<table class="dtable" border="2" width="900">
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Age</th>
								<th>Mobile No.</th>
								<th>Blood Group</th>
								<th>City</th>
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
								$query="select * from donorform limit $start,$limit";
								$result=mysqli_query($connect,$query);
								$n=0;
								while($row=mysqli_fetch_assoc($result))
									
							{
								$n++;
							?>
							<tr>
								
								<td><?php echo $row['Id']; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['age']; ?></td>
								<td><?php echo $row['mobile']; ?></td>
								<td><?php echo $row['bloodgroup']; ?></td>
								<td><?php echo $row['city']; ?></td>
								<td>
									<a class="del" href="donor.php?did=<?php echo $row['Id'] ?>">Delete</a>
									
									<a class="ed" href="index1.php?eid=<?php echo $row['Id'] ?>">Edit</a>
								</td>
							</tr>
							<?php
							$_SESSION['num'] = $n;
							
							?>
							<input type="hidden" value="<?php var_dump($_SESSION['num']);?>" />
							
							<?php
							}
							?>
							<tr>
								<td colspan="7">
									<?php
									  $query="select * from donorform";
									  $result=mysqli_query($connect,$query);
									  $count=mysqli_num_rows($result);
									  $pages=ceil($count/$limit);
									  for($i=1 ;$i<=$pages; $i++)
									  {
										?>
											<a href="donor.php?p=<?php echo $i;?>"><?php echo $i;?></a>
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