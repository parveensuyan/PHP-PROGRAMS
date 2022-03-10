<?php

$current_dir = getCwd();
$targetDir = $current_dir.'/file';
if(!is_dir($current_dir)){
    $result = mkdir ($current_dir, "0777");
}
// print_r($_FILES);
// $targetDir = "D:\phppot_uploads";  
if(is_array($_FILES)) {  if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {
if(move_uploaded_file($_FILES['myfile']['tmp_name'],"$targetDir/".
$_FILES['myfile']['name'])) {
echo "File uploaded successfully";
}
}
}