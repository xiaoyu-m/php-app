<?php
$dir = dirname(dirname(__FILE__));
require ($dir.'\config\db.php');
foreach ($db_tables as $e) { // 首先创建表
    mysqli_query($con, $e);
}
?>