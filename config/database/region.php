<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/database/cdb.php');
$flug = 0;
$sql = "SELECT * from account";
$res = $pdo->query($sql);
foreach ($res as $val ) {
    if($_POST['uid']===$val[1]){
        $flug = 1;
    }
}
if($flug===0){
    $sql = "INSERT account(uid,pwd,token,nickname,online) values(:uid,:pwd,:token,:nick,'0')";
    $pre = $pdo->prepare($sql);
    $pre->execute(array(":uid"=>$_POST['uid'],":pwd"=>hash('sha3-512',$_POST['pwd']),":token"=>hash('sha3-512',md5(date('YmdHis'))),":nick"=>$_POST['nick']));
}
http_response_code(302);
header('Location: /login');
?>