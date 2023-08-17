<?php
session_start();
include("common/connection.php");

if (!empty($_POST['save'])) {
    $op = $_POST['oldpass'];
    $np = $_POST['newpass'];
    $cp = $_POST['cnewpass'];
    $_SESSION['admin_id'] = 1; 

    if ($np == $cp)
	{
        $admin_id = $_SESSION['admin_id']; 
        
        $query = "SELECT * FROM adminlogin WHERE Id = '$admin_id' AND password = '$op'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        
        if($count > 0)
		{
          $update_query = "UPDATE adminlogin SET password = '$np' WHERE Id = '$admin_id'";
          mysqli_query($connect, $update_query);
          echo "Password updated successfully";
        } 
		else 
		{
            echo "Old Password is incorrect";
        }
    }
	else
	{
        echo "New Password and Confirm Password do not match";
    }
}

if(empty($_SESSION['username'])) 
{
    header('location:login.php');
}
?>
<!-- Rest of your HTML code -->

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
						
							<p class="donor">Change Password</p>
							
							<!--main begins from here-->
							<div class="main">
							
								<!--form begins from here-->
								<form method="post" enctype="multipart/form-data" >
									
									<!--table begins from here-->
									<table>
										
										<tr>
											<td class="right">Enter Old Password*</td>
											<td><input type="text"  name="oldpass" class="text"></td>
										</tr>
										<tr>
											<td class="right">Enter New Password*</td>
											<td><input type="text"  name="newpass" class="text"></td>
										</tr>
										<tr>
											<td class="right">Confirm Password*</td>
											<td><input type="text"  name="cnewpass" class="text"></td>
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