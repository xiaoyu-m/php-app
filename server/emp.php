<?php
$dir = dirname(dirname(__FILE__));//上一级目录
require($dir.'/api/emp.php');

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
  switch ($post['params']) {
    case 'addEmp': //获取所有员工列表
      addEmp($post);
      break;
    case 'editEmpItem': //修改员工信息
      editEmp($post);
      break;
    default:
      break;
  }
}
function httpGet($get){
  $emp = new Emp();
  switch ($get['params']) {
    case 'getEmpList': //获取所有员工列表
      getEmpList($emp);
      break;
    case 'delEmpItem': //删除员工
      delEmp($get['data'],$emp);
      break;
    default:
      break;
  }
}

function delEmp($empNo, $emp){
  $emp -> delEmp($empNo);
}

function addEmp($post){
  $emp = new Emp();
  $data = new class{};
  $reslut = new class{};
  foreach ($post['data'] as $key => $value) {
    $data -> $key = $value;
  }
  $value = ',"'.$data -> empName.'","'.$data -> sex.'",'.$data -> age.',"'.$data -> native.'","'.$data -> dept.'","'.$data -> jobTitle.'","'.$data -> likes.'","'.$data -> state.'","'.$data -> remark.'"';
  $res = $emp -> addEmp($value);
  $reslut -> state = '2000';
  $reslut -> msg = '添加员工成功';
  echo json_encode($reslut);
}
function editEmp($post){
  $emp = new Emp();
  $data = new class{};
  $reslut = new class{};
  foreach ($post['data'] as $key => $value) {
    $data -> $key = $value;
  }
  $value = 'empName="'.$data -> empName
  .'",sex="'.$data -> sex.
  '",age='.$data -> age
  .',native="'.$data -> native
  .'",dept="'.$data -> dept
  .'",jobTitle="'.$data -> jobTitle
  .'",likes="'.$data -> likes
  .'",state="'.$data -> state
  .'",remark="'.$data -> remark
  .'"';
  $res = $emp -> editEmp($data -> empNo,$value);
  $reslut -> state = '2000';
  $reslut -> msg = '添加员工成功';
  // echo json_encode($reslut);
}
// 请求获取 emplist
function getEmpList($emp){
  $reslut = new class{};
  $res =  $emp -> listEmp();
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