<?php
$dir = dirname(dirname(__FILE__));//上一级目录
require($dir.'/api/dept.php');

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
    case 'addDept': //获取所有员工列表
      addDept($post);
      break;
    case 'editDeptItem': //修改员工信息
      editDept($post);
      break;
    default:
      break;
  }
}
function httpGet($get){
  $dept = new dept();
  switch ($get['params']) {
    case 'getDeptList': //获取所有员工列表
      getDeptList($dept);
      break;
    case 'delDeptItem': //删除员工
      delDept($get['data'],$dept);
      break;
    default:
      break;
  }
}

function delDept($deptNo, $dept){
  $dept -> delDept($deptNo);
}

function addDept($post){
  $dept = new dept();
  $data = new class{};
  $reslut = new class{};
  foreach ($post['data'] as $key => $value) {
    $data -> $key = $value;
  }
  // var_dump($post);
  $value = $data -> deptNo.',"'.$data -> deptName.'"';
  $res = $dept -> addDept($data -> deptNo,$value);
  $reslut -> state = '2000';
  $reslut -> msg = '添加员工成功';
  echo json_encode($reslut);
}
function editDept($post){
  var_dump($post);
  $dept = new dept();
  $data = new class{};
  $reslut = new class{};
  foreach ($post['data'] as $key => $value) {
    $data -> $key = $value;
  }
  $value = 'deptNo= '.$data -> deptNo
  .',deptName="'.$data -> deptName.'"';
  $res = $dept -> editDept($data -> deptNo,$value);
  $reslut -> state = '2000';
  $reslut -> msg = '编辑员工成功';
  // echo json_encode($reslut);
}
// 请求获取 deptlist
function getDeptList($dept){
  $reslut = new class{};
  $res =  $dept -> listDept();
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