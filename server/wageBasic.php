<?php
$dir = dirname(dirname(__FILE__));//上一级目录
require($dir.'/api/wageBasic.php');

switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    httpGet($_GET);
    break;
  case 'POST':
    httpPost($_POST);
    break;
  default:
    # code...
    break;
}
function httpPost($post){
  $wage = new Wage();
  switch ($post['params']) {
    case 'addWage': //获取所有员工列表
      addWage($post,$wage);
      break;
    case 'editWageItem': //修改员工信息
      editWage($post,$wage);
      break;
    default:
      break;
  }
}
function httpGet($get){
  $wage = new Wage();
  switch ($get['params']) {
    case 'getWageList': //获取所有员工列表
      getWagetList($wage);
      break;
    case 'delWageItem': //删除员工
      delWage($get['data'],$wage);
      break;
    default:
      break;
  }
}

function delWage($empNo, $wage){
  $wage -> delWage($empNo);
}

function addWage($post, $wage){
  $data = new class{};
  $reslut = new class{};
  foreach ($post['data'] as $key => $value) {
    $data -> $key = $value;
  }
  // var_dump($post);
  $value = $data -> empNo.',"'.$data -> name.'",'.$data -> basicWage.','.$data -> jobWage;
  $res = $wage -> addWage($data -> empNo,$value);
  $reslut -> state = '2000';
  $reslut -> msg = '添加信息成功成功';
  echo json_encode($reslut);
}
function editWage($post,$wage){
  $data = new class{};
  $reslut = new class{};
  foreach ($post['data'] as $key => $value) {
    $data -> $key = $value;
  }
  $value = 'empNo='.$data -> empNo
  .',name="'.$data -> name.'"'
  .',basicWage='.$data -> basicWage
  .',jobWage='.$data -> jobWage;
  $res = $wage -> editWage($post['empNo'],$value);
  $reslut -> state = '2000';
  $reslut -> msg = '编辑信息成功成功';
  // echo json_encode($reslut);
}
// 请求获取 deptlist
function getWagetList($wage){
  $reslut = new class{};
  $res =  $wage -> listwage();
  // echo $res;
  if ($res) {
    $reslut -> state = '2000';
    $reslut -> msg = $res;
  }else{
    $reslut -> state = '4000';
    $reslut -> msg = '您没有权限获取数据';
  }
  echo json_encode($reslut);
}
?>