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
	echo "<h3 style='color:red'>Please select atleast one file to download</h3>";
}

?>
<html>
<head>
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