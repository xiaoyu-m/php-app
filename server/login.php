<?php
  require (dirname(dirname(__file__)).'\api\admin.php');
  $admin = new Admin();
  
  $res = $admin -> adminSignin($_POST['account'],$_POST['password']);
  echo json_encode($res);
?>
