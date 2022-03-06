<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/database/cdb.php');
$flug = 0;
if(empty($_COOKIE['account_token'])){
    
}else{
    $sql = "SELECT * from account";
    $res = $pdo->query($sql);
    foreach ($res as $val ) {
        if($_COOKIE['account_token']===$val[3]){
            $id = $val[0];
            $uid = $val[1];
            $nnm = $val[4];
            $flug = 1;
            break;
        }
    }
}
?>