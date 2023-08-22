<?php
	session_start();
	
	include("common/connection.php");
	 
	 
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
			
			<!--container begins from here-->
			<div class="content">
				
				<!--innercontainer begins from here-->
				<div class="innercontainer">
					
					<!--sidebar begins from here-->
						<?php include("common/sidebar.php")?>
					<!--sidebar ends here-->
					
					<!--middlecontainer begins from here-->
					<div class="middlecontainer">
						<div class="dwidth">Contact Us queries</div>
						
						<!--dtable begins from here-->
						<table class="dtable" border="2" width="900">
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Email</th>
								<th>Contact no.</th>
								<th>Message</th>
							</tr>
							<?php
							$limit=3;
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
								$query="select * from contactus limit $start,$limit";
								$result=mysqli_query($connect,$query);
								$c=0;
								while($row=mysqli_fetch_assoc($result))
							{
								$c++;
							?>
							<tr>
								<td><?php echo $row['Id']; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['contact']; ?></td>
								<td><?php echo $row['message']; ?></td>
							</tr>
							
							<?php
							$_SESSION['contact']=$c;
							
							?>
								<input type="hidden" value="<?phpvar_dump($_SESSION['contact']);?>" />
							<?php
					
							}
						?>
							<tr>
								<td colspan="7">
									<?php
										$query="select * from contactus";
										  $result=mysqli_query($connect,$query);
										  $count=mysqli_num_rows($result);
										  $pages=ceil($count/$limit);
										  for($i=1 ;$i<=$pages; $i++)
										  {
											?>
												<a href="contactus.php?p=<?php echo $i;?>"><?php echo $i;?></a>
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