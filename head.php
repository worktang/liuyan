
<?php
//	session_start();
	$username='';
	if(!isset($_SESSION["uname"])){
//	echo "<script>alert('你还没有登录请登录');window.location.href='denlu.php';</script>";
	}else{
		$username=$_SESSION["uname"];
	}
		@$uid=$_SESSION['uid'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			.head{
				width: 100%;
				height: 200px;
/*				border: 1px solid black;*/
				background: gray;
			}
			.head-da{
				width: 70%;
				height: 200px;
/*				border: 1px solid green;*/
				margin: 0 auto;
			}
			.head-top{
				width: 100%;
				height: 55px;
/*				border: 1px solid black;*/
				margin: 0 auto;
			}
			.head-left{
				width: 50%;
				height: 50px;
/*				border: 1px solid red;*/
				float: left;
			}
			.head-right{
				width: 23%;
				height: 50px;
/*				border: 1px solid red;*/
				float: right;
			}
			.head-daoh{
				width: 100%;
				height: 140px;
/*				border: 1px solid blue;*/
			}
			.daoh-left{
				width: 30% ;
				height:140px ;
				float: left;
			}
			.daoh-right{
				width: 65% ;
				height:140px ;
				float: right;
/*				border: 1px solid blue;*/
			}
			.daoh-ul a{
				float: left; list-style: none; width: 100px;line-height: 100px; font-size: 20px;
			}
			.tj{
				float: left;width: 100px; height: 140px;
			}
			a{
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<div class="head">
			<div class="head-da">
				<div class="head-top">
					<div class="head-left">
					<span style="line-height: 50PX;">400-4848-484</span>
					<span style="float: right;line-height: 50PX;">互联网时代，信息共享，共创辉煌！</span>
				    </div>
				    <div class="head-right">
					<span style="line-height: 50PX;"><?php echo $username=='' ?"<a href=denlu.php>请登录</a>":"欢迎光临:$username"; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="exit.php">退出登陆</a></span>
				    </div>
				</div>
				<div class="head-daoh">
					<div class="daoh-left"><div style="height: 30px;"></div><img src="img/3.png" /></div>
					<div class="daoh-right">
						<div class="tj"></div>
						<ul class="daoh-ul">
							<a href="index.php">首页</a>
							<a href="denlu.php">登录</a>
							<a href="zhuc.php">注册</a>
							<a href="lyb2.php">留言板</a>
							       <?php
				echo "<a href='userinfo.php?uid=$uid'>"."个人中心"."</a>";	
		?>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</body>
</html>
