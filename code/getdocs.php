<?php
function get($id){
  // Get cURL resource
  $curl = curl_init();
  curl_setopt_array($curl, [
      CURLOPT_RETURNTRANSFER => true, //or 1
      CURLOPT_URL => 'put_here_cloudant_url/mydb/'.$id,
      CURLOPT_HTTPHEADER => array ("Content-Type: application/json"),
  ]);
  // Send the request & save response to $resp
  $resp = curl_exec($curl);
  $res= json_decode($resp,true); //result is associative array php
  curl_close($curl);
  return $res;
}


function html1(){
  $var = "<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='tcss.css'>
</head>
<body>
<h1>Documents</h1>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Secret Message</th>
    <th>rev</th>
  </tr>";
  echo $var;
}
 function display_row($rev,$id,$n, $m){
   $r = "<tr><td>$id</td><td>$n</td><td>$m</td><td>$rev</td></tr>";
   echo $r;
 }
 function html2(){
   $end = "</table>
   <br>
   <a href = 'index.html'>Go to Main Page </a>
   <a href = 'deletedoc.html'>Delete a Document</a>
   </body></html>";
   echo $end;
 }
$res = get('_all_docs');
$a = $res['rows'];
 html1();
//var_dump($a);
   for($i = 0; $i < count($a); $i++){
       $doc = get($a[$i]['id']);
       display_row($doc['_rev'],$doc['_id'],$doc['name'],$doc['msg']);
  }
 html2();
?>
