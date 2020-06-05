<?php
require '../config/config.php';
$con = mysqli_connect($db_host, $db_user, $db_pwd, $db_database);
if (!$con) {
    exit('<h1>连接数据库失败</h1>');
}
?>