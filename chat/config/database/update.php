<?php
include($_SERVER['DOCUMENT_ROOT'].'/config/database/check.php');
if($flug===0){
    http_response_code(403);
    header('Location: /login');
    exit();
}
$t = $_COOKIE['account_token'];
include($_SERVER['DOCUMENT_ROOT'].'/config/database/cdb.php');
$sql = "update account set online=:date where token=:token";
$pre = $pdo->prepare($sql);
$pre->execute(array(":date"=>date('YmdHis'),"token"=>$t));
if(!empty($_SERVER['HTTPS'])){
    $data = sys_getloadavg();
    echo($data[0]);
}
?>