<?php
$dir = dirname(dirname(__FILE__));//上一级目录
require($dir.'/api/emp.php');
$emp = new Emp();

switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    httpGet($_GET);
    break;
  case 'POST':
    httpPost($_POST)
    break;
  
  default:
    # code...
    break;
}

function httpPost($post){
  foreach ($post as $key => $value) {
    switch ($key) {
      case 'age':
      $str = $str.','.$value;
        break;
      default:
      $str = $str.',"'.$value.'"';
        break;
    }
  }
}
function httpGet($get){
  
}

?>