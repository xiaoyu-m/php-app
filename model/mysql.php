<?php
$dir = dirname(dirname(__FILE__));
require ($dir.'/config/config.php');
global $con;
$con = new mysqli($db_host, $db_user, $db_pwd, $db_database);
if (!$con) {
  exit('<h1>连接数据库失败</h1>');
}
require ($dir.'\model\foreachTables.php');// 创建需要数据表
class Mysql {
	function __construct(){
		global $con;
		$this -> con = $con; // 将mysql连接导向 con
	}
	function pubicMysql($sql,$isResult) {// 公共函数 执行sql语句  并返回值
		// echo $sql;
		$result = mysqli_query($this -> con, $sql);
		$data = array();
		if($isResult) {
			if($result) {
			    //echo "查询成功";
			    while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
			       array_push($data,$row);
			    }
			    return $data; //返回sql执行的结果
			} else {
			    return false;
			}	
		}else{
			return false;
		}
	}
	/**
	 * @param  查询指定表
	 * @param  {Object} option - {tableName}
	 * @return Object
	 */
	function findAll($tableName){// 查找该表 
		// $sql ="show tables";
		$sql ="select * from ".$tableName;
		// echo $sql;
		return $this -> pubicMysql($sql,true);
	}
	/**
	 * @param  查询指定表的记录
	 * @param  {Object} option - {tableName,Field,attr}
	 * @return Object
	 */
	function find($tableName,$Field,$attr){
		$sql ="select * from ".$tableName.' where '.$Field.' = "'.$attr.'"';
		// echo $sql;
		return $this -> pubicMysql($sql,true);
	}
	/**
	 * @param  添加记录
	 * @param  {Object} option - {tableName,values}
	 * @return boolean
	 */
	function addValues($tableName,$values){
		$sql ="insert into ".$tableName.' values ('.$values.')';
		echo $sql;
		return $this -> pubicMysql($sql,false);
	}
	/**
	 * @param  删除记录
	 * @param  {Object} option - {tableName,Field,value}
	 * @return boolean
	 */
	function delValue($tableName,$values){
	}
}
?>