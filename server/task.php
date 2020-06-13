<?php
$dir = dirname(dirname(__FILE__));//上一级目录
require($dir.'/api/task.php');

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
  $task = new Task();
  switch ($post['params']) {
    case 'addTask': //获取所有员工列表
      addTask($post,$task);
      break;
    case 'editTaskItem': //修改员工信息
      editTask($post,$task);
      break;
    default:
      break;
  }
}
function httpGet($get){
  $task = new Task();
  switch ($get['params']) {
    case 'getTaskList': 
      getTasktList($task);
      break;
    case 'delTaskItem': 
      delTask($get['data'],$task);
      break;
    default:
      break;
  }
}

function delTask($taskNo, $task){
  $task -> delTask($taskNo);
}

function addTask($post, $task){
  $data = new class{};
  $reslut = new class{};
  foreach ($post['data'] as $key => $value) {
    $data -> $key = $value;
  }
  // var_dump($post);
  $value = $data -> taskNo.',"'.$data -> taskType.'","'.$data -> taskName.'","'.$data -> taskInfo.'",'.$data -> taskNum.','.$data -> taskSum;
  $res = $task -> addTask($data -> empNo,$value);
  $reslut -> state = '2000';
  $reslut -> msg = '派发任务成功';
  echo json_encode($reslut);
}
function editTask($post,$task){
  $data = new class{};
  $reslut = new class{};
  foreach ($post['data'] as $key => $value) {
    $data -> $key = $value;
  }
  $value = 'empNo='.$data -> empNo
  .',name="'.$data -> name.'"'
  .',basicTask='.$data -> basicTask
  .',jobTask='.$data -> jobTask;
  $res = $task -> editTask($post['empNo'],$value);
  $reslut -> state = '2000';
  $reslut -> msg = '编辑信息成功成功';
  // echo json_encode($reslut);
}
// 请求获取 deptlist
function getTasktList($task){
  $reslut = new class{};
  $res =  $task -> listtask();
  // echo $res;
  if ($res) {
    $reslut -> state = '2000';
    $reslut -> msg = $res;
  }else{
    $reslut -> state = '4000';
    $reslut -> msg = '没有数据';
  }
  echo json_encode($reslut);
}
?>