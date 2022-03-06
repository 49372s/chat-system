<?php
include('../database/check.php');
if($flug===0){
    http_response_code(403);
    header('Location: /login');
    exit();
}

$msg = strip_tags($_POST['msg'],'<br><a>');
if($msg===""){
    echo("api error");
    exit();
}

include('../database/cdb.php');
$sql = "insert into chat(nickname,msg,date) values(:hdn,:msg,:dt)";
$pre = $pdo->prepare($sql);
$pre->execute(array(":hdn"=>$nnm,":msg"=>$msg,':dt'=>date('Y/m/d H:i:s')));
if(!empty($_POST['flug'])){
if($_POST['flug']==="1"){
    http_response_code(200);
    header('Location; /chat');
    exit();
}
}
?>