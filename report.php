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
  <link rel="stylesheet" type="text/css" href="css/departmentmanager.css">
  
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
  
  </div>
  
      <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="manager.php"><i class="glyphicon glyphicon-th-list"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="departmentmanager.php"><i class="glyphicon glyphicon-comment"></i> Departments</a>
                    </li>
                    <li>
                        <a href="categorymanager.php"><i class="glyphicon glyphicon-list-alt"></i> Category</a>
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
					<li>
                        <a href="zipmanager.php"><i class="glyphicon glyphicon-cloud-download"></i> Zip File</a>
                    </li>
                </ul>
				</br></br></br></br></br>	
            </div>
				<div class="helo"> 
			<h3 style="color:#ffffff"><center><b><i>Welcome Back QA Manager!</i></b></center></h3>
	  <br>
    </div>
			
</nav>

	<!-- create a table for show all the user-->
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>                                 
                                        <th>Idea Title</th>
                                        <th>Idea Description</th>
										<th>Post Date</th>
										<th>Post Time</th>
										<th>Comments</th>
										<th>Comment Date</th>
										<th>Comment Time</th>
                                    </tr>
                                </thead>

                                <tbody>
								</br></br>
                                    
                                    <?php 

                                        $query = "SELECT idea.ideaTitle, idea.ideaText, idea.postDate, idea.postTime, comment.commentText, comment.commentDate, comment.commentTime FROM idea JOIN managedata ON idea.ideaID = managedata.ideaID JOIN comment ON comment.commentID = managedata.commentID  ";
										
	
										
                                        $select_users = mysqli_query($conn,$query);

										//retrive all the data of each row in the database
                                        while($row = mysqli_fetch_assoc($select_users)) {
                                          
                                            $ideatitle = $row['ideaTitle'];
                                            $ideaText = $row['ideaText'];
                                            $postDate = $row['postDate'];
											$postTime = $row['postTime'];
											$commentText= $row['commentText'];
											$commentDate= $row['commentDate'];
											$commentTime = $row['commentTime'];
                                     ?>
									 <!-- echo all the data from the database in each row-->
                                    <tr>
                                        
                                        <td><?php echo $ideatitle ?></td>
										<td><?php echo $ideaText ?></td>
                                        <td><?php echo $postDate ?></td>
										<td><?php echo $postTime ?></td>
                                        <td><?php echo $commentText ?></td>
										<td><?php echo $commentDate ?></td>
										<td><?php echo $commentTime ?></td>
                   
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table><?php

                        ?>
						
						<form method="post" action="excel.php">
						<button type="submit " name= "export_excel" class="btn btn-success">Export to Excel</button>
						</form>
						</br>
              
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
	

</body>
</html>
