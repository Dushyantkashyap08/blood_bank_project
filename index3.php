<?php include("common/connection.php"); ?>

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
		
			<!--find begins from here-->
			<div class="find">
				<p class="fb">Find Blood Bank</p>
				
				<!--form begins from here-->
				<form method="GET"> 
					<input type="text" placeholder="Search By City.." class="fbb" name="searchname" />
					<input type="submit" value="Search" class="search" name="s" /><br><br>
				</form>
				<!--form ends here-->

				<!--searchtable begins from here-->
				<table class="searchtable" border="2">
					<tr>
						<th>Sr no.</th>
						<th>Bank Name</th>
						<th>Contact</th>
						<th>City</th>
						<th>Status</th>
					</tr>
					<?php
					if(isset($_GET['s'])) 
					{ 
						if (!empty($_GET['searchname'])) 
						{
							$searchname = $_GET['searchname'];
							$query = "select * from bankdetails where city like '%$searchname%'";
						} 
						else 
						{
							$query = "select * from bankdetails";
						}
						$result = mysqli_query($connect, $query);
						while ($row = mysqli_fetch_assoc($result))
							{
							?>
							<tr>
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['bankname'] ?></td>
								<td><?php echo $row['contact'] ?></td>
								<td><?php echo $row['city'] ?></td>
								<td><?php echo $row['status'] ?></td>
							</tr>
							<?php
						}
					}
					?>
				</table>
				<!--searchtable ends here-->
				<img class="searchimg" src="images/search.jpg"/>
				<img class="searchimg2" src="images/search2.jpg"/>
			</div>
			<!--find ends here-->
			
		</div>
		<!--mid-section ends here-->
		
	</body>
	<!--body ends here-->
</html>
