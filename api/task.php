<?php
require '../model/mysql.php';
class Task extends mysql {
	/**
	 * @param @添加部门
	 * @param {Object} option - {empNo,taskName,sex,age,native,task,jobTitle,likes,state,remark}
	 * 
	 */
	function addTask($taskNo,$values){ 
		$user = $this -> findAll('task'); //获取所用员工信息，用来生成新员工的id
		if ($user) {
			$taskNo = $user[count($user)-1] -> taskNo;
			$taskNo = $taskNo + 1;
			// $taskNo =  $user[count($user)-1][0] + 1; //新员工id = 最后一位员工id + 1
		}else{
			$taskNo = 1;
		}
		$values = $taskNo.$values;
		return $this -> addValues('task', $values);
	}
	/**
	 * @param 删除部门
	 * @param {Object} option - {taskNo}
	 * 
	 */
	function delTask($taskNo){ 
		$user = $this -> find('task', 'taskNo', $taskNo);
		if (count($user)) {
			$res = $this -> delValue('task','taskNo',$taskNo);
		}
	}
	/**
	 * @param 编辑部门
	 * @param {Object} option - {taskNo, taskInfo}
	 * 
	 */
	function editTask($taskNo, $values){ 
		$user = $this -> find('task', 'taskNo', $taskNo);
		if (count($user)) {
			$res = $this -> update('task',$values, 'taskNo='.$taskNo);
		}
	}
	/**
	 * 
	 * @param 部门列表
	 * @param option
	 * 
	 */
	function listTask(){ 
		$user = $this -> findAll('task');
		return $user;
	}
}
?>
