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
			$empNo =  $user[count($user)-1][0] + 1; //新员工id = 最后一位员工id + 1
		}else{
			$empNo = 1;
		}
		$values = $empNo.$values;
		$this -> addValues('emp', $values);
		// echo $values;
	}
	/**
	 * @param 删除员工
	 * @param {Object} option - {empNo}
	 * sssssss
	 */
	function delEmp($id){ 
		echo "删除员工";
	}
	/**
	 * @param 编辑员工
	 * @param {Object} option - {empNo, empInfo}
	 * 
	 */
	function editEmp($id){ 
		echo "编辑员工";
	}
	/**
	 * @param 员工列表
	 * @param option
	 * 
	 */
	function listEmp(){ 
		echo "员工列表";
	}
}
// $emp = new Emp();
// $res = $emp -> addAdmin('xiaoyu','admin');
// $res = $emp -> Signin('xiaoyu','admin');
// var_dump($res)
?>
