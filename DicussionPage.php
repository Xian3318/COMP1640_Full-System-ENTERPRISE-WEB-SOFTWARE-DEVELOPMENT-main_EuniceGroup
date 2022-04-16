<?php
	session_start();
	include('conn.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="DicussionPage.css">
	
	</head>
	
	<body>
	<?php 
		if($_SESSION['role']=='Staff')
		{
		?>
			<div class="w3-bar w3-border w3-light-blue">
				<a href="DicussionPage.php" class="w3-bar-item w3-button">Home</a>
				<a href="#" class="w3-bar-item w3-button">Profile</a>
				<a href="logout.php" class="w3-bar-item w3-button w3-red w3-right">Logout</a>
			</div>
			<br>
			<form method = "POST" enctype="multipart/form-data" id = "posting">		
				<div class="form-group">
					<label>Post : </label>
					<textarea name = 'message'class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
					
					<br>
					<label for="exampleFormControlFile1">Document Support</label>
					<input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
					
					<br>
					<label>Category : </label>
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
					<button type = 'submit' name = 'discuss'>Post</button></br></br>
					
				</div>
			</form>

			<br>
			<div class="w3-container w3-light-blue" style ="width:100%">
				<h1> Dicussion Board </h1>
				<div class="POST">
				<div class="container-fluid">
					<?php 
						$query1 = mysqli_query($conn,"SELECT * FROM idea");
						
						while($rows = mysqli_fetch_array($query1))
						{   
							$ideaID = $rows['ideaID'];
							$date = $rows['postDate'];
							$time = $rows['postTime'];
							$message = $rows['ideaText'];
							$anonymous = $rows['anonymous'];
							$supportDoc = $rows['supportDoc'];
							
							if ($anonymous == 'anonymous')
							{
					?>
								<div class='card'>
								    <h5><b><?php echo $anonymous;?></b> at <?php echo $date;?> <?php echo $time;?></h5>
							        <p><?php echo $message;?></p>
									<br>
									<p>Support Document: <a href='DiscussionPage.php?dow=$supportDoc'>Click to Download</a></p>
							    	
									<div class='btn-group' style='width:100%'>
										<button style='width:33.3%'>&#128077;</button>
										<button style='width:33.3%'>&#x1F44E;</button>
										<button style='width:33.3%'>Comment</button>
									</div>				
									<br><br>
								</div>
								<div class='card'>
						<?php
								$comment = mysqli_query($conn,"SELECT * FROM comment JOIN staff ON comment.comStaffID = staff.staffID WHERE comIdeaID = '$ideaID '");
								
								if (mysqli_num_rows($comment) > 1)
								{
									while($rows = mysqli_fetch_array($comment))
									{
										$comDate = $rows['commentDate'];
										$comTime = $rows['commentTime'];
										$comText = $rows['commentText'];
										$comName = $rows['fName'];
										
										echo " <h6><b>$comName</b> at $comDate $comTime </h6>
										<p>$comText</p><br>";
									}
							?>
							<br><br>
									<form method = "POST" id = "Comment">		
										<div class="form-group">
											<textarea name = "message" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
											<input type="hidden" name = "ideaID" value = "<?php echo $ideaID ;?>"/>
											<br>
											<button type = "submit" name ="comment">Comment</button></br></br>
										</div>
									</form>
									
									</div>
							<?php
									
								}
								else
								{
						?>
										<p class="text-center">Be the First One To Comment<p>
									
										<form method = "POST" id = "Comment">		
											<div class="form-group">
												<textarea name = "message" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
												<input type="hidden" name = "ideaID" value = "<?php echo $ideaID ;?>"/>
												<br>
												<button type = "submit" name ="comment">Comment</button></br></br>
											</div>
										</form>
									
									</div>
						<?php
								}
							}
							else	
							{
								$query2 = mysqli_query($conn,"SELECT * FROM staff JOIN idea ON staff.staffID = idea.staffID WHERE ideaID = '$ideaID'");
									
								while($rows = mysqli_fetch_array($query2))
								{
									$date = $rows['postDate'];
									$time = $rows['postTime'];
									$message = $rows['ideaText'];
									$name = ucfirst($rows['fName']);
									$anonymous = $rows['anonymous'];
									$id = $_SESSION['staffID'];
									
									//$results = mysqli_query($conn, "SELECT * FROM likes WHERE staffID ='$id' AND ideaID ='$ideaID'");
									
									/*if (mysqli_num_rows($results) == 1 )
									{
										echo " 
										<div class='card'>
											<h5><b>" .$name."</b> at ".$date." ".$time."</h5>
											<p>".$message."</p>
										</div>
										<div class='btn-group' style='width:100%'>
											<button style='width:33.3%'>&#128077;</button>
											<button style='width:33.3%'>&#x1F44E;</button>
											<button style='width:33.3%'>Comment</button>
										</div>	";
									}
									else
									{	
										echo " 
										<div class='card'>
											<h5><b>" .$name."</b> at ".$date." ".$time."</h5>
											<p>".$message."</p>
										</div>
										<div class='btn-group btn-group-justified'>
										<i class='fa fa-thumbs-o-up like-btn'></i>
										<i class='fa fa-thumbs-o-down dislike-btn'></i>
										<a href='#' class='btn btn-primary'>Comment</a>
										</div>";										
									} */
									//<span class="likes_count"><?php echo $row['likes']; likes</span>
							?>
									<div class='card'>
										<h5><b><?php echo $name;?></b> at <?php echo $date;?> <?php echo $time;?></h5>
										<p><?php echo $message;?></p>
										<br>
										<p>Support Document: <a href="DiscussionPage.php?dow=<?php echo $supportDoc;?>">Click to Download</a></p>
							    	
										<div class='btn-group' style='width:100%'>
											<button style='width:33.3%'>&#128077;</button>
											<button style='width:33.3%'>&#x1F44E;</button>
											<button style='width:33.3%'>Comment</button>
										</div>				
										<br><br>
									</div>
									<div class='card'>
							<?php
								$comment = mysqli_query($conn,"SELECT * FROM comment JOIN staff ON comment.comStaffID = staff.staffID WHERE comIdeaID = '$ideaID '");
								
								if (mysqli_num_rows($comment) > 1)
								{
									while($rows = mysqli_fetch_array($comment))
									{
										$comDate = $rows['commentDate'];
										$comTime = $rows['commentTime'];
										$comText = $rows['commentText'];
										$comName = $rows['fName'];
										
										echo " <h6><b>$comName</b> at $comDate $comTime </h6>
										<p>$comText</p><br>";
									}
							?>
							<br><br>
									<form method = "POST" id = "Comment">		
										<div class="form-group">
											<textarea name = "message" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
											<input type="hidden" name = "ideaID" value = "<?php echo $ideaID ;?>"/>
											<br>
											<button type = "submit" name ="comment">Comment</button></br></br>
										</div>
									</form>
									
									</div>
							<?php
									
								}
								else
								{
						     ?>
										<p class="text-center">Be the First One To Comment<p>
									
										<form method = "POST" id = "Comment">		
											<div class="form-group">
												<textarea name = "message" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
												<input type="hidden" name = "ideaID" value = "<?php echo $ideaID ;?>"/>
												<br>
												<button type = "submit" name ="comment">Comment</button></br></br>
											</div>
										</form>
									
									</div>
						<?php
								}
								}
							}	
						}
						?>		
					</div>
				</div>
			</div>
		
			
		<?php
			if(isset($_POST['discuss']))
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
				
				if ($message == NULL)
				{
					echo "<script type='text/javascript'>alert('Post is empty!');</script>";	
				}
				else
				{
					if(isset($_POST['terms']) && $_POST['terms'] == 'accepted') 
					{ 
						$upload_dir = 'documents';
						
						move_uploaded_file($temName,$upload_dir.'/'.$fileName);
						
						$location = "document/$myFile";
						
						if ($_POST['anonymous'] == 'anonymous')
						{
							$sql ="INSERT INTO `idea`(`ideaText`,`supportDoc`,`postDate`, `postTime`, `anonymous`, `categoryID`) VALUES ('$message','$location','$date','$time','anonymous','$category')";
			
							if ($conn->query($sql) === TRUE) 
							{
								header("Refresh:0");
							} 
							else 
							{
								echo "Error: " . $sql . "<br>" . $conn->error;
							}
						}
						else
						{
							$sql ="INSERT INTO `idea`(`ideaText`,`supportDoc`, `postDate`, `postTime`, `anonymous`,`categoryID`,`staffID`) VALUES ('$message','$location','$date','$time','NULL','$category','$id')";
			
							if ($conn->query($sql) === TRUE) 
							{
								header("Refresh:0");
							} 
							else 
							{
								echo "Error: " . $sql . "<br>" . $conn->error;
							}
						}
					}	
					else 
					{
						// Display Error
					}
				}
			}
		}
		
		if(isset($_POST['comment']))
		{	
			$id = $_SESSION['staffID'];
			date_default_timezone_set("Asia/Kuala_Lumpur");
			$date = date('Y-m-d');
			$time = date('H:i:s');
			$message = $_POST['message'];
			$idea = $_POST['ideaID'];
								
			if ($message == NULL)
			{
				echo "<script type='text/javascript'>alert('CommentBox is empty!');</script>";	
			}
			else
			{
				$sql =
				"INSERT INTO `comment`(`commentText`, `commentDate`, `commentTime`, `comStaffID`, `comIdeaID`) VALUES ('$message','$date','$time','$id','$idea')";
			
				if ($conn->query($sql) === TRUE) 
				{
					//header("Refresh:3");
				} 
				else 
				{
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		}
		
	?>
	
	<?php
/*if(isset($_GET['liked']))
		{
			
			$idea = $_GET['liked1'];
			$idea2 = $_GET['update2'];
			
			$update = mysqli_query($conn,"SELECT * FROM staff JOIN idea ON staff.staffID = ideaWHERE ideaID = '$idea'");  
			
			while($row = mysqli_fetch_array($update))
			{  
				$noOfThumbUp = $row['noOfThumbUp'];
			}    
			
			$ThumbUp = $noOfThumbUp + 1;
			
			$sqlupdate = mysqli_query($conn,"UPDATE idea SET noOfThumbUp = '$ThumbUp' WHERE ideaID = '$idea'");
			echo '<script>alert('.$ThumbUp.')</script>';
			if($sqlupdate)
			{
				
			}
			else
			{
				die("Could not update".mysql_error());
			}
			
		}*/
	?>
	<script>
		document.getElementById('posting').addEventListener('submit', function(event){
		if(document.getElementById('terms').checked == false){
			event.preventDefault();
				alert("By posting, you must accept our terms and conditions!");
			return false;
			}
		});
		
	</script>

	</body>
</html>