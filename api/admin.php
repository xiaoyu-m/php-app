<?php
$dir = dirname(dirname(__FILE__));//上一级目录
require ($dir . '/model/mysql.php');
class Admin extends Mysql {
	function addAdmin($account,$password){ // 添加管理账号
		$arr = $this -> find('admin','account',$account);
		if ($account === $arr[0][1]) {
			echo '账号已存在，请勿重复添加！';
			return 0;
		}else{
			$user = $this -> findAll('admin');
			$id =$user ?  $user[count($user)-1][0] + 1 : 1;
			$values = $id.',"'.$account.'","'.$password.'"';
			$this -> addValues('admin',$values );
		}
	}
	function adminSignin($account,$password){ //登录
		$user = $this -> find('admin','account',$account);
		$result = new StdClass;
		if ($user) {
			if ($user[0][2] === $password) {
				$result -> state = '2000';
				$result -> msg = '恭喜你，登录成功';
			}else{
				$result -> state = '4001';
				$result -> msg = '密码错误，请重新填写';
			}
		}else{
			$result -> state = '4000';
			$result -> msg = '账号错误，请重新填写';
		}
		return $result;
	}
}
?>
