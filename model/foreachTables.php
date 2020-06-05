<?php
require './mysql.php';
require '../config/db.php';
foreach ($db_tables as $e) { // 首先创建表
    mysqli_query($con, $e);
}
echo '创建成功';
?>
