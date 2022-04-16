<?php
	session_start();
	include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Idea Collector</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/index.css">
  
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Idea Collector</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
   
</nav>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-8 text-left"> 
	<h4 style="margin-left:60%;"><b><i>Let's make for a better improvement!</i></b></center></h4>
	<h6 style="margin-left: 50%;"><b><i>Any idea, plan, or purpose may be placed in the mind through repetition of thought.</i></b></center></h6>
	
	<center><img src="images/img2.jpg" alt="img2" width="300" height="300" style="margin-left: 50%;" ></center>
	</br>
	
	<?php
				//Check whether a variable is empty. Also check whether the variable is set/declared for the isset
                    if (!isset($_SESSION['username'])) {
                        ?>
                            <div class="well" style="margin-left: 50%;">                
                                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

										<!-- user enter the username and password retrived from the database -->
										<label for="email"><b>Email:</b></label>
                                        <input name="username" type="text" class="form-control" placeholder="Email"></br>
										<label for="password"><b>Password:</b></label>
                                        <input name="password" type="password" class="form-control" placeholder="Password" style="margin-top: 10px;">

                                        <center><button class="btn btn-primary" name="login" style="margin-left: 10px; margin-top: 10px;">Login</button></center>
										</br>
										<a href="reset-password.php" style="float:right"><u>Forgot password?</u></a>
                                </form>
                               
                            </div>
                        
                <?php } ?>

</div>
	
    
   
 
	
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
						echo"<meta http-equiv='refresh' content='0;url=coordinator.php'>";
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
</div>

    </div>
  </div>
</div>
	
</body>
</html>