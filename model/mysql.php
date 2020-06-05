<?php
require '../config/config.php';
global $con;
$con = new mysqli($db_host, $db_user, $db_pwd, $db_database);
if (!$con) {
  exit('<h1>连接数据库失败</h1>');
}

class mysql {
	function __construct(){
		global $con;
		$this -> con = $con; // 将mysql连接导向 con
	}
	function tableUser($tableName){// 查找该表 
		// $sql ="show tables";
		$sql ="select * from ".$tableName;
		// echo $sql;
		$result = mysqli_query($this -> con, $sql);
		$data = array();
		if($result) {
		    //echo "查询成功";
		    while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
		       array_push($data,$row);
		    }
		    return $data; 
		    // 把数据转换为JSON数据.
		} else {
		    return false;
		}
	}
}

?>