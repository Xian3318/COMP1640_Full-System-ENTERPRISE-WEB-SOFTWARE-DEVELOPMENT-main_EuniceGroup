<?php
	session_start();
	include('conn.php');
?>

<?php

// create zip function 
function create_zip($files = array(), $folderpath){
		// Check if the ZIP extension is available or not
		if(extension_loaded('zip')){	
			$zip = new ZipArchive();			//create an object of Zip Library
			$zip_name = "download_".time().".zip";			// Zip name
			
			//create a zip file (ZIPARCHIVE::CREATE)
			$zip->open($zip_name, ZIPARCHIVE::CREATE);
			
			foreach($files as $file){	
				$zip->addFile($folderpath."/".$file);	
			}
			$zip->close();
			
		//lets download the zip if it is created
		if(file_exists($zip_name)){
			header('Content-type: application/zip');
			header('Content-Disposition: attachment; filename="'.$zip_name.'"');
			readfile($zip_name);
			//delete the file after download
			unlink($zip_name);
		}		
	}else{
		echo "ZIP extension is not installed in your server!!";
	}
}			

//usage example of the above create zip function
	
if(isset($_POST['files'])){
	$files = $_POST['files'];
	create_zip($files, 'myfiles');
}else{
	
}

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
  
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <title>"Select All" Checkboxex using jQuery</title>
	<script language="javascript">
$(function(){

    // select all / deselect all
    $("#selectall").change(function () {
         $(".mycheckbox").prop('checked', $(this).prop('checked'));
    });

    // find if all the checkboxes are checked, if then select the top one too.
    $(".mycheckbox").change(function(){
        if($(".mycheckbox").length == $(".mycheckbox:checked").length)
        $("#selectall").attr("checked", "checked");
			else
        $("#selectall").removeAttr("checked");
    });
});
</script>
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

<div class="col-xs-6">
							
                      
<form action="" method="post">
<table style="border: 1px solid gray;">
<tr style="background:blue; color:white;">
    <th	><input type="checkbox" id="selectall"/></th>
    <th align="left">Files</th>
</tr>


<tr>
    <td align="center"><input type="checkbox" class="mycheckbox" name="files[]" value="myfile1.docx"/></td>
	<td>myfile1.docx</td>
</tr>
<tr>
    <td align="center"><input type="checkbox" class="mycheckbox" name="files[]" value="myfile2.pdf"/></td>
    <td>myfile2.pdf</td>
</tr>
<tr>
    <td align="center"><input type="checkbox" class="mycheckbox" name="files[]" value="myfile3.txt"/></td>
    <td>myfile3.txt</td>
</tr>
<tr>
    <td align="center"><input type="checkbox" class="mycheckbox" name="files[]" value="myfile4.jpg"/></td>
    <td>myfile4.jpg</td>
</tr>
<tr>
    <td align="center"><input type="checkbox" class="mycheckbox" name="files[]" value="myfile5.png"/></td>
    <td>myfile5.png</td>
</tr>
<tr>
	<td colspan="2" align="right"><input type="submit" value="Download" /></td>
</tr>
</table>
</form>


</body>
</html>
