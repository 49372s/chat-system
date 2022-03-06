<?php
include($_SERVER['DOCUMENT_ROOT'].'/config/database/cdb.php');
$sql = "select * from account";
$res = $pdo->query($sql);
$online = "";
foreach($res as $val){
    if(intval(date('YmdHis')) - intval($val[5])<60){
        $online = $online.$val[4].'　　';
    }
}
echo($online);
?>