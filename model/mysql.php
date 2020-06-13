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
	function pubicMysql($sql) {// 公共函数 执行sql语句  并返回值
		$result = mysqli_query($this -> con, $sql);
		$rowLen = $result -> num_rows;
		$data = new class{};
		if($rowLen) {
			$datas = array();
			foreach ($result as $value) {
				foreach ($value as $key => $value1) {
					$data -> $key = $value1;
					// echo "key:".$key."value:".$value1;
				}
				array_push($datas,$data);
				unset($data);
				$data = new class{};
			}
			return $datas;
		}
		return $rowLen;
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
		return $this -> pubicMysql($sql);
	}
	/**
	 * @param  查询指定表的记录
	 * @param  {Object} option - {tableName,Field,attr}
	 * @return Object
	 */
	function find($tableName,$Field,$attr){
		$sql ="select * from ".$tableName.' where '.$Field.' = '.$attr;
		return $this -> pubicMysql($sql);
	}
	/**
	 * 
	 */
	function update($tableName,$values,$where){
		$sql = "update ".$tableName." set ". $values." where ".$where;
		echo $sql;
		return $this -> pubicMysql($sql);
	}

	/**
	 * @param  添加记录
	 * @param  {Object} option - {tableName,values}
	 * @return boolean
	 */
	function addValues($tableName,$values){
		$sql ="insert into ".$tableName.' values ('.$values.')';
		return $this -> pubicMysql($sql);
	}
	/**
	 * @param  删除记录
	 * @param  {Object} option - {tableName,Field,value}
	 * @return boolean
	 */
	function delValue($tableName,$Field,$value){
		$sql = 'delete from '.$tableName.' where '.$Field.' = '.$value;
		return $this -> pubicMysql($sql);
	}
}
?>