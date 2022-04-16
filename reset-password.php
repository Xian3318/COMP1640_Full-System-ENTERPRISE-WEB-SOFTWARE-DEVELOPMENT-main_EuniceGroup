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
  <link rel="stylesheet" type="text/css" href="css/reset-passsword.css">
</head>
<body>

<?php
 if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$query1 = mysqli_query($conn,"SELECT * FROM staff WHERE email = '$email'");

		
		if(mysqli_num_rows($query1)==1)
		{
		
		function generateRandomString($length)
		{
			$include_chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			/* Uncomment below to include symbols */
		    $include_chars .= "[{(!@#$%^/&*_+;?\:)}]"; 
			$charLength = strlen($include_chars);
			$randomString = '';
			for ($i = 0; $i < $length; $i++)
			{	
				$randomString .= $include_chars [rand(0, $charLength - 1)];
			}
			return $randomString;
		}
				 
		// Call function
		$length = 6; # Set result string length
		$r = generateRandomString($length);
					
			$to = $email;
			$from = "IDEA COLLECTOR";//optional
			$fromName = "IDEA COLLECTOR.";
			$subject = "Recovery Password";

			$htmlContent ='
				<html>
					<head></head>
					<div class="content">
						<p>
						Dear User,
						<br class="salution" />
						
						You had recently requested a password reset with us <br>
						Here is your Temporarily-Password :  '.$r.'<br>
						Kindly change password after used.<br>
						Gentle reminder do not share your password to other person. <br>
						Thanks.
						</p>
						<p>
						…
						</p>
					</div>
					<p class="adios">
						Thanks and have a nice day<br/>
						<br class="greets" />
						Regards, <br/><br/>
						IDEA COLLECTOR
					</p>
				</html>';
			//set content - type heeader for sending html email
			$header="MIME-Version:1.0"."\r\n";
			$header.="Content-type:text/html;charset=UTF-8"."\r\n";

			if(mail($to,$subject,$htmlContent,$header))
			{
				//$options = array("cost"=>4);
					
				$stmt = mysqli_query($conn,"SELECT * FROM staff WHERE email = '$email'");

				if(mysqli_num_rows($stmt) == 1)
				{
					$query2 = mysqli_query($conn,"UPDATE staff SET password = '".$r."' WHERE email = '".$email."'");
					echo "<script>alert('Email Sent!');
					window.location.href='index.php';</script>";
				}
				
			}
			else
			{
				echo "<script>alert('Email sending failed!');</script>";
			}
		}
		else
		{
			echo "<script>alert('The email are not available!');</script>";
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
      <a class="navbar-brand" href="index.php">Idea Collector</a>
    </div>
   
  </div>
</nav>
                 
<div class="container-fluid text-center">    
  <div class="row content">
	<h3><b><i> Forgot Password </b></i></h3>
	<img width="300" src="images/change.jpeg">
		
  <form method="POST">
			<div class="form-group">
				<!-- user enter the email that registered-->
                  <label for="email">Email:</label>
                  <input type="text" style="width: 300px;" id="email" placeholder="Enter Your Email Address" name="email" required>
                </div>
					
			
			<br/><br/>
			<div class="form-group">
				<div class="input-group" style="margin:auto;">
					<input type="submit" style="width: 100px;" value="Login" name="login">
				</div>
			</div>

			<br/>
		</form>
 	
  </div>
</div>

</body>
</html>