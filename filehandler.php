<?php

function fileHandler($file,$type){
//print_r($file);

$upload_flag=0;
if($type!="img"){
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);

$uniq_name = time();
$abs_path=$type.$uniq_name.'.c';
$path="files/".$abs_path;	// Write Path here

if($file['type']=="text/plain"){
if($file["name"]!="")
{
  if ($file["error"] > 0)
    {
    $debug="Return Code: " . $file["error"] . "<br>";
    }
  else
    {
    $debug.= "Upload: " . $file["name"] . ",";
    $debug.= "Type: " . $file["type"] . ",";
    $debug.= "Size: " . ($file["size"] / 1024) . " kB,";
    $debug.= "Temp media: " . $file["tmp_name"] . ",";

    if (file_exists($path))
      {
      $debug.= $file["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($file["tmp_name"],$path) or die("file error");
      $debug.= "Stored in: " . $path;
	$upload_flag=1;
      }
  }


}
}
return $abs_path;
}


}

?>
