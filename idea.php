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
	background-color:#C0C0C0;
	}
	.nav {
		  height: 50px;
		  width: 100%;
		  background-color: Navy;
		  position: relative;
		}

		.nav > .nav-header {
		  display: inline;
		}

		.nav > .nav-header > .nav-title {
		  display: inline-block;
		  font-size: 22px;
		  color: #fff;
		  padding: 10px 10px 10px 10px;
		}

		.nav > .nav-btn {
		  display: none;
		}

		.nav > .nav-links {
		  display: inline;
		  float: right;
		  font-size: 18px;
		}

		.nav > .nav-links > a {
		  display: inline-block;
		  padding: 13px 10px 13px 10px;
		  text-decoration: none;
		  color: #fff;
		}

		.nav > .nav-links > a:hover {
		  background-color: rgba(0, 0, 0, 0.3);
		}

		.nav > #nav-check {
		  display: none;
		}

		@media (max-width:600px) {
		  .nav > .nav-btn {
			display: inline-block;
			position: absolute;
			right: 0px;
			top: 0px;
		  }
		  .nav > .nav-btn > label {
			display: inline-block;
			width: 50px;
			height: 50px;
			padding: 13px;
		  }
		  .nav > .nav-btn > label:hover,.nav  #nav-check:checked ~ .nav-btn > label {
			background-color: rgba(0, 0, 0, 0.3);
		  }
		  .nav > .nav-btn > label > span {
			display: block;
			width: 25px;
			height: 10px;
			border-top: 2px solid #eee;
		  }
		  .nav > .nav-links {
			position: absolute;
			display: block;
			width: 100%;
			background-color: #333;
			height: 0px;
			transition: all 0.3s ease-in;
			overflow-y: hidden;
			top: 50px;
			left: 0px;
		  }
		  .nav > .nav-links > a {
			display: block;
			width: 100%;
		  }
		  .nav > #nav-check:not(:checked) ~ .nav-links {
			height: 0px;
		  }
		  .nav > #nav-check:checked ~ .nav-links {
			height: calc(100vh - 50px);
			overflow-y: auto;
		  }
		}


.btn:focus {
  outline: none;
}


.card {
   width: 100%;
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

table{
   width: 100%;
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .card {   
    width: 100%;

	padding: 20px;
   margin-top: 20px;
  }
  
}



	</style>
	
	<body>
		<div class="nav">
			<input type="checkbox" id="nav-check">
			<div class="nav-header">
				<div class="nav-title">
				BlackBoard
				</div>
			</div>
	  
			<div class="nav-links">
				<a href="dicussion.php">Home</a>
				<a href="">Profile</a>
				<a href="logout.php">Log Out</a>
			</div>
		</div>
		
		<br>
                                

			<div class="w3-container" style ="width:100%">
		
				<div class="POST">
				<div class="container-fluid">
				<div class="card">
		<form method = "POST" enctype="multipart/form-data" id = "posting">		
				<div class="form-group">
					<label>Post <label style="color: red">*</label> : </label>
					<textarea name ="message" class="form-control rounded-0" id="message" rows="3"></textarea>
					
					<br>
					<label for="exampleFormControlFile1">Document Support</label>
					<input type="file" class="form-control-file" name="file" id="file">
					
					<br>
					<label>Category <label style="color: red">*</label> :  </label>
					<select name= 'category'>  
						<?php
							$list = mysqli_query($conn,"SELECT * FROM category");  
							while($row_list = mysqli_fetch_array($list))
							{  
								$categoryid = $row_list['categoryID'];
								$category = $row_list['categoryName'];
						
								echo "<option value=".$categoryid.">".$category."</option>";
							}    
						?>
					</select>
					
					<br><br>
					<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="anonymous" value="anonymous">
					<label class="form-check-label" for="inlineCheckbox1">Post as anonymous</label>
					
				    <br>
					<input type="checkbox" name="terms" id="terms" value="accepted" /> <label> Agreed to <a href="term.html" target="_blank">Term & Condition</a> </label></input>
					
					<br><br>
					<button type = "submit" name = "post">Post</button></br></br>
					
				</div>
			</form>
		
				</div>
				</div>
				</div>
				</div>

<?php
	
			if(isset($_POST['post']))
			{	
				$id = $_SESSION['staffID'];
				date_default_timezone_set("Asia/Kuala_Lumpur");
				$date = date('Y-m-d');
				$time = date('H:i:s');
				$message = $_POST['message'];
				$category = $_POST['category'];
				
				$fileName = $_FILES['file']['name'];
				$myFile = $_FILES['file']['name'];
				
				$temName = $_FILES['file']['tmp_name'];
		
					if(isset($_POST['terms']) && $_POST['terms'] == 'accepted') 
					{ 
						$upload_dir = 'documents';
						
						move_uploaded_file($temName,$upload_dir.'/'.$fileName);
						
						$location = "document/$myFile";
						
						if (!empty($_POST['anonymous']))
						{
							$sql ="INSERT INTO `idea`(`ideaText`,`supportDoc`,`postDate`, `postTime`, `anonymous`, `categoryID`) VALUES ('$message','$location','$date','$time','anonymous','$category')";
							
							$coor = mysqli_query($conn,"SELECT * FROM staff WHERE role = 'Coordinator'");
							
							while($rows = mysqli_fetch_array($coor))
							{
								$Email = $rows['email'];
								
								$to = $Email;
								$from = "BLACKBOARD SYSTEM";//optional
								$fromName = "NO REPLY MESSAGE";
								$subject = "NEW IDEA IS UPLOADED!";

								$htmlContent ='
									<html> 
										<head></head> 
										<body>    
											<p> An anonymous had uploaded a new idea into blackboard just now! </p>
										</body> 
									</html>';
								//set content - type heeader for sending html email
								$header="MIME-Version:1.0"."\r\n";
								$header.="Content-type:text/html;charset=UTF-8"."\r\n";

								//add in additional headers
								$header .= "Cc: y.yileng2000@gmail.com"."\r\n";

								if(mail($to,$subject,$htmlContent,$header))
								{
									echo "<script>alert('Idea Submitted');</script>";
								}
								else
								{
									echo "<script>alert('Email sending failed!');</script>";
								}
							} 
						}
						else
						{
							$sql ="INSERT INTO `idea`(`ideaText`,`supportDoc`, `postDate`, `postTime`,`categoryID`,`staffID`) VALUES ('$message','$location','$date','$time','$category','$id')";
							
							$staff = mysqli_query($conn,"SELECT * FROM staff WHERE staffID = '$id'");  
							$row = mysqli_fetch_assoc($staff);
							$staffName = $row['fName'];
							
							$coor = mysqli_query($conn,"SELECT * FROM staff WHERE role = 'Coordinator'");
							
							while($rows = mysqli_fetch_array($coor))
							{
								$Email = $rows['email'];
								
								$to = $Email;
								$from = "BLACKBOARD SYSTEM";//optional
								$fromName = "NO REPLY MESSAGE";
								$subject = "NEW IDEA IS UPLOADED!";

								$htmlContent ='
									<html> 
										<head></head> 
										<body>    
											<p> '.$staffName.' had uploaded a new idea into blackboard just now! </p>
										</body> 
									</html>';
								//set content - type heeader for sending html email
								$header="MIME-Version:1.0"."\r\n";
								$header.="Content-type:text/html;charset=UTF-8"."\r\n";

								//add in additional headers
								$header .= "Cc: y.yileng2000@gmail.com"."\r\n";

								if(mail($to,$subject,$htmlContent,$header))
								{
									echo "<script>alert('Idea Submitted');</script>";
								}
								else
								{
									echo "<script>alert('Email sending failed!');</script>";
								}
							} 
						}
				}
			}
			
			?>
	</body>
	
	<script>

		document.getElementById('posting').addEventListener('submit', function(event){
		if(document.getElementById("message").value == ''){
			event.preventDefault();
				alert("Text Field is empty");
			return false;
			}
		});
		
		document.getElementById('posting').addEventListener('submit', function(event){
		if(document.getElementById('terms').checked == false){
			event.preventDefault();
				alert("By posting, you must accept our terms and conditions!");
			return false;
			}
		});
		
	</script>
</html>