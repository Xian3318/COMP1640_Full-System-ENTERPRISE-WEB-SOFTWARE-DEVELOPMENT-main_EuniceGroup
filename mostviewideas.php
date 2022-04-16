<?php
	session_start();
	include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://use.fontawesome.com/fe459689b4.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	
	</head>
	
	<style>
	body {
	margin: 0px;
	font-family: 'segoe ui';
	background-color:#e0ebeb;
	}
	
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    

    .row.content {height: 450px}
    
 
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    

    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
		
      }
      .row.content {height:auto;} 
    }
	.dropdown {
float:right;
}


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-backdrop {
  z-index: -1;
}

    .show-read-more .more-text{
        display: none;
    }

.dropdown a {
  padding: 1em 1.5em;
  text-decoration: none;
  text-transform: uppercase;

}

.card{ background-color: #fff; border: 1px solid transparent; border-radius: 6px; }
.card > .card-link{ color: #333; }
.card > .card-link:hover{  text-decoration: none; }
.card > .card-link .card-img img{ border-radius: 6px 6px 0 0; }
.card .card-img{ position: relative; padding: 0; display: table; }
.card .card-img .card-caption{
  position: absolute;
  right: 0;
  bottom: 16px;
  left: 0;
}
.card .card-body{ display: table; width: 100%; padding: 12px; }
.card .card-header{ border-radius: 6px 6px 0 0; padding: 8px; }
.card .card-footer{ border-radius: 0 0 6px 6px; padding: 8px; }
.card .card-left{ position: relative; float: left; padding: 0 0 8px 0; }
.card .card-right{ position: relative; float: left; padding: 8px 0 0 0; }
.card .card-body h1:first-child,
.card .card-body h2:first-child,
.card .card-body h3:first-child, 
.card .card-body h4:first-child,
.card .card-body .h1,
.card .card-body .h2,
.card .card-body .h3, 
.card .card-body .h4{ margin-top: 0; }
.card .card-body .heading{ display: block;  }
.card .card-body .heading:last-child{ margin-bottom: 0; }

.card .card-body .lead{ text-align: center; }

@media( min-width: 768px ){
  .card .card-left{ float: left; padding: 0 8px 0 0; }
  .card .card-right{ float: left; padding: 0 0 0 8px; }
    
  .card .card-4-8 .card-left{ width: 33.33333333%; }
  .card .card-4-8 .card-right{ width: 66.66666667%; }

  .card .card-5-7 .card-left{ width: 41.66666667%; }
  .card .card-5-7 .card-right{ width: 58.33333333%; }
  
  .card .card-6-6 .card-left{ width: 50%; }
  .card .card-6-6 .card-right{ width: 50%; }
  
  .card .card-7-5 .card-left{ width: 58.33333333%; }
  .card .card-7-5 .card-right{ width: 41.66666667%; }
  
  .card .card-8-4 .card-left{ width: 66.66666667%; }
  .card .card-8-4 .card-right{ width: 33.33333333%; }
}

/* -- default theme ------ */
.card-default{ 
  border-color: #ddd;
  background-color: #fff;
  margin-bottom: 24px;
}

.card-default > .card-header{ 
color: #333; background-color: #ddd; 
}
.card-default > .card-header{ border-bottom: 1px solid #ddd; padding: 8px; text-align:right;}
.card-default > .card-footer{ padding: 8px; }
.card-default > .card-body{ color: #333;}
.card-default > .card-img:first-child img{ border-radius: 6px 6px 0 0; }
.card-default > .card-left{ padding-right: 4px; }
.card-default > .card-right{ padding-left: 4px; }
.card-default p:last-child{ margin-bottom: 0; }
.card-default .card-caption { color: #fff; text-align: center; text-transform: uppercase; }

ul {
	background-color:navy;
}
	</style>
	
	<body>
	<?php 
			$staffID = $_SESSION['staffID'] ;
			
			$list = mysqli_query($conn,"SELECT * FROM staff WHERE staffID = '$staffID'");  
			while($row_list = mysqli_fetch_array($list))
			{  
				$fName = $row_list['fName'];
		?>	
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="department.php">Idea Collector</a>
				</div>
	  
				<ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?php  echo $fName; ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
                            <li>
								<a href="profile.php"><i class="glyphicon glyphicon-user"></i>Profile</a>
                            </li>
							<li class="divider"></li>
                            <li>
								<a href="logout.php"><i class="glyphicon glyphicon-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
				</ul>
			</div>
		</nav>
		<?php
			}
		?>
		
		
			<br>
		<?php
	
		if(isset($_GET['department']))
		{
			$_SESSION['department'] = $_GET['department'];
		}
		?>
					
					
							<br><br><br>
							
							<!-- Most viewed idea-->
						
                              <div class="col-xs-6">
							
                            <?php 
                            $query = "SELECT * FROM idea WHERE view=(SELECT MAX(view) FROM idea)";
                            $select_department = mysqli_query($conn,$query);
							
							
                            ?>

							</br></br>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Idea Title</th>
										<th>Idea Description</th>
										<th>Total View</th>
                                    </tr>
                                </thead>
                                <tbody>

									<h5><b> Most Viewed Ideas</b></h5>
                                    <?php  
										// show the categories 
                                        while($row = mysqli_fetch_assoc($select_department)) {
                                        $ideaID = $row['ideaID'];
                                        $ideaTitle = $row['ideaTitle'];
										$ideaText = $row['ideaText'];
										$ideaView = $row['view'];

                                        echo "<tr>";
                                        echo "<td> {$ideaID} </td>";
                                        echo "<td> {$ideaTitle} </td>";
										echo "<td> {$ideaText} </td>";
										echo "<td> {$ideaView} </td>";
                                        
										echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
						<!-- end-->
						
						<!-- Latest idea record show -->
						  <div class="col-xs-6">
							
                            <?php 
                            $query = "SELECT * FROM idea ORDER BY ideaID DESC LIMIT 1";
                            $select_department = mysqli_query($conn,$query);
							
							
                            ?>

							</br></br>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Idea Title</th>
										<th>Idea Description</th>
										<th>Total View</th>
                                    </tr>
                                </thead>
                                <tbody>

									<h5><b> Latest Ideas</b></h5>
                                    <?php  
										// show the categories 
                                        while($row = mysqli_fetch_assoc($select_department)) {
                                        $ideaID = $row['ideaID'];
                                        $ideaTitle = $row['ideaTitle'];
										$ideaText = $row['ideaText'];
										$ideaView = $row['view'];

                                        echo "<tr>";
                                        echo "<td> {$ideaID} </td>";
                                        echo "<td> {$ideaTitle} </td>";
										echo "<td> {$ideaText} </td>";
										echo "<td> {$ideaView} </td>";
                                        
										echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
						<!--end-->
						
							<!-- Latest Comment record show -->
						  <div class="col-xs-6">
							
                            <?php 
                            $query = "SELECT comment.commentID, comment.commentText, comment.commentDate, comment.commentTime FROM  comment JOIN managedata ON comment.commentID = managedata.commentID JOIN staff ON managedata.staffID = staff.staffID JOIN department ON staff.departmentID = department.departmentID ORDER BY commentID DESC LIMIT 1";
                            $select_com = mysqli_query($conn,$query);
							
							
                            ?>

							</br></br>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Comment Description</th>
										<th>Comment Date</th>
										<th>Comment Time</th>
                                    </tr>
                                </thead>
                                <tbody>
									</br></br></br>
									<h5><b> Latest Comment</b></h5>
                                    <?php  
										// show the categories 
                                        while($row = mysqli_fetch_assoc($select_com)) {
                                        $comid = $row['commentID'];
                                        $comtext = $row['commentText'];
										$comdate = $row['commentDate'];
										$comtime = $row['commentTime'];

                                        echo "<tr>";
                                        echo "<td> {$comid} </td>";
                                        echo "<td> {$comtext} </td>";
										echo "<td> {$comdate} </td>";
										echo "<td> {$comtime} </td>";
										echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
						


                    </div>     
                           
	</body>
</html>