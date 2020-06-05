<?php
require '../model/mysql.php';
class Admin extends mysql {
	function addAdmin($account,$password){ // 添加管理账号
		$user = $this -> tableUser('admin');
		if ($user) {
			$id =  $user[count($user)-1][0] + 1; //查询最后一位id
			$sql = $id;
		}else{
			$sql = 1;
		}
		echo "管理员：".$sql;
	}
	function Signin($account,$password){ //登录
		echo '<br/>'."Signin";
		echo '<br/>'.$account;
		echo '<br/>'.$password;
	}
}
$a = new Admin();
$res = $a -> addAdmin('xiaoyu','admin');
// $res = $a -> Signin('xiaoyu','admin');
?>
<!--  -->