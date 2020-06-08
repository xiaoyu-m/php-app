<?php
require(dirname(__FILE__) . '\api\admin.php');
$account = 'xiaoyu';
$password = 'admin';

$admin = new Admin();
$res = $admin -> addAdmin($account,$password);
?>