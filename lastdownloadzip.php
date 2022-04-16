<?php 
	
	// create a zip file
	$zip_file = "zxiann/zxian.zip";
	touch($zip_file);
	// end
	

	// open zip file
	$zip = new ZipArchive;
	$this_zip = $zip->open($zip_file);


	if($this_zip){

		// $file_with_path = "../images/1.jpg";
		// $name = "1.jpg";
		// $zip->addFile($file_with_path,$name);

		$folder = opendir('images');

		if($folder){
			while( false !== ($images = readdir($folder))){
				if($images !== "." && $images !== ".."){
					
					$file_with_path = "images/".$images;

					$zip->addFile($file_with_path,$images);
					
					echo $images;
				}
			}
			closedir($folder);
		}


		// download this created zip file
		if(file_exists($zip_file))  
		{  
			//name when download
			 $demo_name = "zxiann.zip";

		     header('Content-type: application/zip');  
		     header('Content-Disposition: attachment; filename="'.$demo_name.'"');  
		     readfile($zip_file); // auto download

		     //delete this zip file after download
		     unlink($zip_file);  
		} 




	}




?>