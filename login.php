<?php 
	//check the variable has been declared
		if (isset($_POST['login']) )
		{
			//echo "hello";
			//pass the variable from the database
			$email = $_POST['username'];
			$password = $_POST['password'];

			$query = mysqli_query($conn,"select * from staff where email='$email' && password='$password'");
			
			if (mysqli_num_rows($query) != 0)
			{
					$row = mysqli_fetch_array($query);
					$staffID = $row['staffID'];
					//$dbusername = $row['username'];
					$dbpassword = $row['password'];
					$fName = $row['fName'];
					$lName = $row['lName'];
					$role = $row['role'];
					
					//$_SESSION['username'] = $dbusername;
					$_SESSION['fName'] = $fName;
					$_SESSION['lName'] = $lName;
					$_SESSION['role'] = $role;
					$_SESSION['staffID'] = $staffID;
				
					if ($role == 'manager')
					{
						echo"<meta http-equiv='refresh' content='0;url= manager.php'>";
						exit;			
					}
					//if the user login and it's role is subscriber it will directly show to index home page
					else if ($role == 'staff')
					{
						echo"<meta http-equiv='refresh' content='0;url=department.php'>";
						exit;			
					}
					else if ($role == 'coordinator')
					{
						echo"<meta http-equiv='refresh' content='0;url=index.php'>";
						exit;			
					}
			}
			else
			{
				echo '<script>alert("Username and/or Password incorrect.\\nTry again.")</script>';
				//if the user insert wrong username or password it will prompt out this message and maintain on the index page
				echo '<script>alert("Username and/or Password incorrect.\\nTry again.")</script>';
				echo"<meta http-equiv='refresh' content='0;url=index.php'>";
			}
		
		}

?>    