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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/registration.css">
</head>
<body>

			
			<?php
			//$_POST used to pass variables to login.php
				if (isset($_POST['register']))
				{
					$username = $_POST['username'];
					$fName = $_POST['fName'];
					$lName = $_POST['lName'];
					//$password = mysqli_real_escape_string($conn, $_POST['password']);
					//$password = password_hash($password,PASSWORD_DEFAULT);
					$gender = $_POST['gender'];
					$phoneNo = $_POST['phoneNo'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					$department= $_POST['department'];
					
	
					$image = $_FILES['image']['name'];
					$tmp_image = $_FILES['image']['tmp_name'];
	
					move_uploaded_file($tmp_image, "images/$image");
					if ($image == "") 
					{
						$image = "user.png";
					}
  
					if ( $username=="" || $fName=="" || $lName=="" || $gender=="" || $email=="" || $phoneNo=="" || $image=="" || $password=="" || $department=="" ) 
					{
						//all the information must be enter by the user if not will prompt out this message
						echo "**ALL FIELDS MANDATORY";
					}
					elseif (strlen($phoneNo)!=10) 
					{
						//the phone number must be in 10 digits if not will prompt out this message
						echo "**PhoneNo Must Contain Of 10 bits";
					}

					else
					{
						// generate a unique random token of length 100

						//$hash = password_hash($password, PASSWORD_DEFAULT);
						//insert the information to the database
						$options = array("cost"=>4);
						//$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
					$query = "INSERT INTO staff (username, fName, lName, gender, phoneNo, email, password, image, role, departmentID) VALUES( '$username', '$fName', '$lName', '$gender',  '+6".$phoneNo."', '$email', '$password', 'user.png', 'staff','$department') ";
					    $result = mysqli_query($conn,$query);
						//$register_user = mysqli_query($conn, $query);

						//if(!$register_user) {
						// die("Query Failed" . mysqli_error($conn));
						//}

						//header("Location: index.php");
						if($result)
						{
							echo"<script>alert('Successfully Registered an account');</script>";
				
						}
						else
						{
							echo"ERROR:" .$query."<br>".$conn->error;
						}

					}
				}
			?>
			
		
			
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="#">Idea Collector</a>
					<a class="navbar-brand" href="manager.php">Home</a>
				</div>
			
				<ul class="nav navbar-nav navbar-right">
						<?php 
                        if (isset($_SESSION['username'])) {   
                        ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php 
								
                                if(isset($_SESSION['username']))
								//ucfirst is to convert the fist character to uppercase
                                echo ucfirst($_SESSION['username']); ?> <b class="caret"></b></a>
								<!-- create a dropdownlist -->
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            
						<?php    
						}
						?>
						<li><a href="registration.php"><span class="glyphicon glyphicon-list-alt"></span> Register Here!</a></li>
				</ul>
		</div>
	</nav>

                 
		<div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="images/logo.png" style="margin-top: 30%;">
            </div>
            <div class="col-lg-6">
 
              <h2>Registration</h2>
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" required>
                </div>

                <div class="form-group">
                  <label for="fName">Firstname:</label>
                  <input type="text" class="form-control" id="fName" placeholder="Enter Firstname" name="fName" required>
                </div>

                <div class="form-group">
                  <label for="lName">Lastname:</label>
                  <input type="text" class="form-control" id="lName" placeholder="Enter Lastname" name="lName" required>
                </div>
				
				<div class="form-group" required>
                  <label for="gender">Gender:</label></br>
                   <input type="radio" id="gender1" name="gender" value="Male">
				   <label for="gender1">Male</label><br>
				   <input type="radio" id="gender2" name="gender" value="Female">
					<label for="gender2">Female</label>
                </div>
				
				<div class="form-group">
                  <label for="phoneNo">Phone No:</label>
                  <input type="text" class="form-control" id="phoneNo" placeholder="Enter phone " name="phoneNo" required>
                </div>
				
				 <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
                

                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                </div>
				
				<div class="form-group">
                    <label for="image">UserImage</label>
                    <input type="file" name="image" >
                </div>
	
			
			<div class="form-group">
			<label for="category">Departments</label></br>
			<select name="department">
			
			<!-- select the department which start from which source -->
			<?php 

			$query = "SELECT * FROM department";
			$select_department = mysqli_query($conn,$query);

			if (!$select_department) {
				die("Query Failed" . mysqli_error($conn));
			}

			while ($row = mysqli_fetch_assoc($select_department)) {
				$departmentID = $row['departmentID'];
				$departmentName = $row['departmentName'];
			
				echo "<option value='$departmentID'>$departmentName</option>";
			}

			?>

		</select>
		</div>		
                <button type="submit" class="btn btn-primary" name="register" >Register</button>

				</br></br>	  
				<p style="margin-left: 20%;">Already have an account? <a href="index.php">Sign in</a></p>
			  </form>
            

            </div>
        </div>

    </div>
        <hr>

   <footer id="myFooter" >
        <div class="co">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="registration.php">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
</footer>

</body>
</html>