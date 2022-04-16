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
  <link rel="stylesheet" type="text/css" href="css/update_department.css">
  
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="">Idea Collector</a>
    </div>
	  
      <ul class="nav navbar-nav navbar-right">
							<!--create the dropdown list  -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?php 

                                if(isset($_SESSION['fName']))
                                echo ucfirst($_SESSION['fName']); ?> <b class="caret"></b></a>
							<!-- dropdown list menu for the user click -->
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.php"><i class="glyphicon glyphicon-user"></i> Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="logout.php"><i class="glyphicon glyphicon-off"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                         
		<li><a href="registration.php"><span class="glyphicon glyphicon-list-alt"></span> Register Here!</a></li>
      </ul>
  
      <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="manager.php"><i class="glyphicon glyphicon-th-list"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="departmentmanager.php"><i class="glyphicon glyphicon-comment"></i> Departments</a>
                    </li>
                    <li>
                        <a href="categorymanager.php"><i class="glyphicon glyphicon-list-alt"></i> Comments</a>
                    </li>
					<li>
                        <a href="users.php"><i class="glyphicon glyphicon-user"></i> Users</a>
                    </li>
                    <li>
                        <a href="profile.php"><i class="glyphicon glyphicon-inbox"></i> Profile</a>
                    </li>
                    <li>
                        <a href="report.php"><i class="glyphicon glyphicon-file"></i> Reports</a>
                    </li>
                </ul>
				</br></br></br></br></br>	
            </div>
				<div class="helo"> 
			<h3 style="color:#ffffff"><center><b><i>Welcome Back QA Manager!</i></b></center></h3>
	  <br>
    </div>
			
</nav>

	 <div id="Edit Details" class="tabcontent">
          <br>
          <?php
            if (isset($_GET['categoryID'])) 
			{
				$edit_cat = $_GET['categoryID'];
				
			}

            $query = "SELECT *  FROM  category WHERE categoryID=$edit_cat";
			$select_posts = mysqli_query($conn,$query);


            while($row = mysqli_fetch_assoc($select_posts)) 
			{
				$categoryName = $row['categoryName'];
				
			}
			//update the department
            if (isset($_POST['update_user'])) 
			{
				
					$categoryName = $_POST['categoryName'];
					
			

			$query = "UPDATE category SET categoryName = '$categoryName' WHERE categoryID = $edit_cat ";
			
			if($conn->query($query)==TRUE)
			{
				echo"<script>alert('Updated Selected Category Successfully');</script>";
			}
			else
			{
				echo"ERROR:" .$query."<br>".$conn->error;
			}
	

		}

	?>

	<div class="container">
	<div class="row">
	<h3>Edit Departments Details</h3>
    <form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="categoryName">Category Name</label>
		<input value="<?php echo $categoryName; ?>" class="form-control" name="categoryName">
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="update_user" value="Update">
	</div>
</form>

	
        </div>
        </div>

    </div>

</body>
</html>

