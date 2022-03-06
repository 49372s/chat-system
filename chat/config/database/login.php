<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/database/cdb.php');
$flug = 0;
$sql = "SELECT * from account";
$res = $pdo->query($sql);
foreach ($res as $val ) {
    if($_POST['uid']===$val[1]){
        if(hash('sha3-512',$_POST['pwd'])===$val[2]){
            setcookie('account_token',$val[3],time()+60*60*24*365,'/');
            $pre = $pdo->prepare("update account set online=:dt where id=:id");
            $pre->execute(array(":id"=>$val[0],":dt"=>intval(date('YmdHis'))));
        }
    }
}
http_response_code(302);
header('Location: /login');
?>