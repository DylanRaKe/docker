<?php
  // Opens directory
  $myDirectory=opendir(".");

  // Gets each entry
  while($entryName=readdir($myDirectory)) {
    $dirArray[]=$entryName;
  }

  // Finds extensions of files
  function findexts($filename) {
    $filename=strtolower($filename);
    //$exts=split("[/\\.]", $filename);
    $exts=explode("[/\\.]", $filename);
    $n=count($exts)-1;
    $exts=$exts[$n];
    return $exts;
  }

  // Closes directory
  closedir($myDirectory);

  // Counts elements in array
  $indexCount=count($dirArray);

  // Sorts files
  sort($dirArray);

  // Loops through the array of files
  for($index=0; $index < $indexCount; $index++) {

    // Gets File Names
    $name=$dirArray[$index];
    $namehref=$dirArray[$index];

    // Gets Extensions
    $extn=findexts($dirArray[$index]);

    // Gets file size
    $size=number_format(filesize($dirArray[$index]));

    // Gets Date Modified Data
    $modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
    $timekey=date("YmdHis", filemtime($dirArray[$index]));

    // Print 'em
    if(strpos($extn, '.') !== true){
      print("
      <a href='./$namehref' class='item'>
         <p> $name </p>
      </a>");
    }
    
  }
?>