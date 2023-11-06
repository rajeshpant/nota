<?php
$directory = __DIR__.'/datafiles'; //Full Path of datafiles
$file_array = read_directory($directory);
// Display found files
if(!empty($file_array)){
	echo '<table><tr><th>SNo.</th><th>File Name</th></tr>';
	foreach($file_array as $key => $value){
		echo '<tr><td>'.($key+1).'</td><td>'.$value.'</td></tr>';
	}	
	echo '</table>';
}

/**

 * read_directory is used to read al files & directory given folder

 * @param string $directory full path of directory

 * @return array list of files array 

 */
function read_directory($directory){
	$file_array = [];
	if (is_dir($directory)) { //validade datafile is a directory or not a directory
		$files = scandir($directory); //reacd all files in datafiles disrecory
		if(!empty($files)) { //check directory is empty or not empty
			foreach($files as $file) { // loop for get files in directory
				if(is_file($directory.'/'.$file) && preg_match('/^[A-Za-z0-9]+\.itx?$/i', $file, $output_array)) { //validate this is file or not & check its extension is .itx or not
					$file_array[] = $file; //Store file in array
				}
			} 
		}
	}
	sort($file_array); // Sort files 
	return $file_array;
}
