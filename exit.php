<?php
header('content-type:text/html;charset=utf-8');
	session_start();
	unset($_SESSION["uname"]);
	session_destroy();
	
	if(isset($_SESSION["uname"])){
		echo "退出失败";
	}else{
		echo "<script>alert('退出成功');window.location.href='denlu.php';</script>";
	}
?>