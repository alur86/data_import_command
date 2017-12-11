<?php
require_once "vendor/autoload.php";

define("DEFAULT_URL","https://stepbystep-1496665203404.firebaseio.com/");
define("DEFAULT_TOKEN","c45i9RVU6WmYbmsdrk8i40NxEB7WV9P4YwPqOpkJ");

$test = array(
    "name" => "konojunya",
    "age" => 19
);


$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);
$firebase->set("/users/konojunya",$test);
$user = $firebase->get("/users");
echo $user;

?>




