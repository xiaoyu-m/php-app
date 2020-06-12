<?php
require '../model/mysql.php';
class dept extends mysql {
	/**
	 * @param @添加部门
	 * @param {Object} option - {deptNo,deptName,sex,age,native,dept,jobTitle,likes,state,remark}
	 * 
	 */
	function addDept($deptNo,$values){ 
		$user = $this -> find('dept','deptNo',$deptNo); //获取所用部门信息，用来生成新部门的id
		
		if (!$user) {
		return $this -> addValues('dept', $values);
		}	
		return false;
	}
	/**
	 * @param 删除部门
	 * @param {Object} option - {deptNo}
	 * 
	 */
	function delDept($deptNo){ 
		$user = $this -> find('dept', 'deptNo', $deptNo);
		if (count($user)) {
			$res = $this -> delValue('dept','deptNo',$deptNo);
		}
	}
	/**
	 * @param 编辑部门
	 * @param {Object} option - {deptNo, deptInfo}
	 * 
	 */
	function editDept($deptNo, $values){ 
		$user = $this -> find('dept', 'deptNo', $deptNo);
		if (count($user)) {
			$res = $this -> update('dept',$values, 'deptNo='.$deptNo);
		}
	}
	/**
	 * @param 部门列表
	 * @param option
	 * 
	 */
	function listDept(){ 
		$user = $this -> findAll('dept');
		return $user;
	}
}
?>
