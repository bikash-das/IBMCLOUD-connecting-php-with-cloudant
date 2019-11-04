<?php
// var_dump($_POST);
$user = new stdClass;
$user->type = 'user';
$user->name = $_POST["name"];
$user->msg = $_POST["msg"];
 //echo json_encode($user);

$curl = curl_init();
// curl options
$options = array(
CURLOPT_URL => 'put_here_cloudant_url/mydb',
CURLOPT_POST => 1,
CURLOPT_POSTFIELDS => json_encode($user),
CURLOPT_HTTPHEADER => array ("Content-Type: application/json"),
CURLOPT_RETURNTRANSFER => true /* if not, curl_exec() throws output*/
);
curl_setopt_array($curl, $options);
curl_exec($curl);
curl_close($curl);
//it will display with option to go index.html or getdocs.php

$var = "<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='tcss.css'>
</head>
<body>
<h1>Success</h1>
<a href = 'index.html'>Main Page </a>
<a href = 'getdocs.php'>Get all Documents </a>
<a href = 'deletedoc.html'>Delete a Document</a>
";
echo $var;

?>
