<?php
  $account=$_POST['account'];
  $password=$_POST['password'];
  if ($account === 'xiaoyu') {//
      if ($password=== 'admin') {
          $code= '2000';
          $result="xiaoyu";
      } else {
          $code= '4001';
          $result="密码错误，请重新输入";
      }
  } else {
      $code= '4000';
      $result="该账号不存在，请重新输入";
  }
  echo json_encode(array('state' =>$code,'msg' => $result,));
?>
