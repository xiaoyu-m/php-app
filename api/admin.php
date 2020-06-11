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
		
		$user = $this -> find('admin','account','"'.$account.'"');
		// var_dump($user);
		$result = new class{};
		if ($user[0] -> account) {
			// echo json_encode($user[0] -> id);
			// return $user[0];
			if ($user[0] -> password === $password) {
				$result -> state = '2000';
				$result -> msg = '恭喜你，登录成功';
			}else{
			// echo json_encode(111);
			// return ;
				$result -> state = '4001';
				$result -> msg = '密码错误，请重新填写';
			}
		}else{
			$result -> state = '4000';
			$result -> msg = '账号错误，请重新填写';
		}
		// echo $result;
		return $result;
	}
}
?>
