<?php
include('./cdb.php');
$t = $_COOKIE['account_token'];
setcookie('account_token',-1,-1,'/');
$sql = "update account set online=:date where token=:token";
$pre = $pdo->prepare($sql);
$pre->execute(array(":date"=>0,"token"=>$t));
http_response_code(302);
header('Location: /');
?>