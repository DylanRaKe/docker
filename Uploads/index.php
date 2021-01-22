<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="shortcut icon" href="Logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;900&display=swap" rel="stylesheet">
    <script src="jquery.js"></script>
</head>
<body>
    <div class="background"></div>

    <div style="margin-top: 7rem; margin-bottom: 4rem; margin-left: auto;margin-right:auto; text-align:center"><h1>NAVIGATION</h1></div>

    <table class="sortable" style="width: 75%;">
  <thead>
    <tr>
      <th>Filename</th>
    </tr>
  </thead>
  <tbody>
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
      //$exts=explode("[/\\.]", $filename);
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
      if(strpos($extn, '.') == true && $extn != '.' && $extn != '..'){
        print("
        <tr class=''>
          <td><a href='./$namehref'>$name</a></td>
        </tr>");
      }
      
    }
  ?>
  </tbody>
</table>



    <a style="position: fixed; right:1rem; bottom:1rem; color: red" href="logout.php">Logout</a>
</body>
</html>

<style>
    *{
        margin: 0;
        padding: 0;
        outline: none;
        overflow-x: hidden;
        text-align: center;
        text-transform: uppercase;
    }

    a{cursor:pointer;}

    a{
        color: yellow;
        text-decoration: none;
    }

    a:hover{
        color: orange;
        text-decoration: underline;
    }

    td{
      border: .1rem solid white;
      padding: .6rem;
    }

    h1,h2,h3,h4,a,p,span,th{
        text-shadow: 2px 2px 4px #000000;
    }

    body{
        background-color: #15202B;
        color: white;
        font-family: 'Montserrat', sans-serif;
        transition: 400ms;
    }

    input{
        margin-bottom: 1.5rem;
        border: .2rem solid white;
        padding: .2rem .8rem;
        width: 14rem;
        height: 2rem;
        background-color: rgba(0, 0, 0, 0.55);
        color: white;
        border-radius: .4rem;
        font: 900 1rem Montserrat;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

    button{
        background-color: rgba(0, 0, 0, 0.55);
        color: white;
        width: 14rem;
        height: 3rem;
        border: .2rem solid white;
        border-radius: 1.3rem;
        cursor: pointer;
        font: 900 1.2rem Montserrat;
        transition: 300ms;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

    button:hover{
        font: 900 1.4rem Montserrat;
    }

    th{
        padding: 1rem 2rem;
        color: white;
        border: .2rem solid rgba(255, 255, 255, .7);
        background-color: rgba(0, 0, 0, .4);
        font: 600 1.4rem Montserrat;
    }

    .firstL{
        background-color: rgba(255, 255, 255, .55);
    }

    .account{
        margin-left: auto;
        margin-right: auto;
        margin-top: 6rem;
        width: 90%;
        height: 60%;
        overflow: auto;
        overflow-x: auto;
    }

    table{
        border-radius: 1rem;
        margin-left: auto;
        margin-right: auto;
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
    }

    .WB{
        height: .2rem;
        width: 100%;
        background-color: white;
        
    }

    .center{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .background{
        z-index: -5;
        width: 100%;
        height: 100%;
        position: fixed;
        background-image: url(bg.jpg);
        background-size: cover;
        filter: blur(.4rem);
        filter:brightness(55%);
    }
</style>