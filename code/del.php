<?php
function deldoc($db,$id,$rev){
  $curl = curl_init();
  curl_setopt_array($curl, [
      CURLOPT_RETURNTRANSFER => true, //or 1
      CURLOPT_URL => 'put_here_cloudant_url/'.$db.'/'.$id.'?rev='.$rev,
      CURLOPT_CUSTOMREQUEST => 'DELETE'
  ]);
  curl_exec($curl);
  curl_close($curl);
}
$docid = $_POST["doc_id"];
$docrev = $_POST["doc_rev"];
deldoc('mydb',$docid,$docrev);




$var = "<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='tcss.css'>
</head>
<body>
<br><h1>Deleted!</h1>
<a href = 'index.html'>Go to Main Page </a>
<a href = 'deletedoc.html'>Delete Again</a>
<a href = 'getdocs.php'>Get all documents</a>
</body></html>";
echo $var;

 ?>
