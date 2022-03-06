<?php
include($_SERVER['DOCUMENT_ROOT'].'/config/database/check.php');
if($flug===0){
    http_response_code(403);
    header('Location: /login');
    exit();
}
include($_SERVER['DOCUMENT_ROOT'].'/config/database/cdb.php');
$sql = "select * from chat ORDER by id desc";
$res = $pdo->query($sql);
$content = "<table>";
$count = 0;
foreach($res as $val){
    if(empty($_SERVER['HTTPS']) && $count==20){break;}
    $count++;
    $content = $content.'<tr><td><b>'.$val[1].'</b></td><td>'.$val[2].'</td><td>'.$val[3].'</td></tr>'."\n";
}
$content = $content."</table>";
echo($content);
?>