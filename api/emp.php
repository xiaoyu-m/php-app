<?php
require '../model/mysql.php';
class Emp extends mysql {
	/**
	 * @param @添加员工
	 * @param {Object} option - {empNo,empName,sex,age,native,dept,jobTitle,likes,state,remark}
	 * 
	 */
	function addEmp($values){ 
		$user = $this -> findAll('emp'); //获取所用员工信息，用来生成新员工的id
		if ($user) {
			$empNo = $user[count($user)-1] -> empNo;
			$empNo = $empNo + 1;
			// $empNo =  $user[count($user)-1][0] + 1; //新员工id = 最后一位员工id + 1
		}else{
			$empNo = 1;
		}
		$values = $empNo.$values;
		return $this -> addValues('emp', $values);
	}
	/**
	 * @param 删除员工
	 * @param {Object} option - {empNo}
	 * 
	 */
	function delEmp($empNo){ 
		$user = $this -> find('emp', 'empNo', $empNo);
		if (count($user)) {
			$res = $this -> delValue('emp','empNo',$empNo);
		}
	}
	/**
	 * @param 编辑员工
	 * @param {Object} option - {empNo, empInfo}
	 * 
	 */
	function editEmp($empNo, $values){ 
		$user = $this -> find('emp', 'empNo', $empNo);
		if (count($user)) {
			$res = $this -> update('emp',$values, 'empNo = '.$empNo);
		}
	}
	/**
	 * @param 员工列表
	 * @param option
	 * 
	 */
	function listEmp(){ 
		$user = $this -> findAll('emp');
		return $user;
	}
}
// $emp = new Emp();
// $res = $emp -> addAdmin('xiaoyu','admin');
// $res = $emp -> Signin('xiaoyu','admin');
// var_dump($res)
?>
