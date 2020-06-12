<?php
require '../model/mysql.php';
class Wage extends mysql {
	/**
	 * @param @添加部门
	 * @param {Object} option - {empNo,wageName,sex,age,native,wage,jobTitle,likes,state,remark}
	 * 
	 */
	function addWage($empNo,$values){ 
		return $this -> addValues('wage', $values);
	}
	/**
	 * @param 删除部门
	 * @param {Object} option - {empNo}
	 * 
	 */
	function delWage($empNo){ 
		$user = $this -> find('wage', 'empNo', $empNo);
		if (count($user)) {
			$res = $this -> delValue('wage','empNo',$empNo);
		}
	}
	/**
	 * @param 编辑部门
	 * @param {Object} option - {empNo, wageInfo}
	 * 
	 */
	function editWage($empNo, $values){ 
		$user = $this -> find('wage', 'empNo', $empNo);
		if (count($user)) {
			$res = $this -> update('wage',$values, 'empNo='.$empNo);
		}
	}
	/**
	 * @param 部门列表
	 * @param option
	 * 
	 */
	function listWage(){ 
		$user = $this -> findAll('wage');
		return $user;
	}
}
?>
