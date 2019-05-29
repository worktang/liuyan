
<?php
header('content-type:text/html;charset=utf-8');
session_start();
	include("conn.php");
	if(isset($_POST["submit"])){
		$uname=$_POST["uname"];
		$upwd=md5($_POST["upwd"]);
		$ucode=$_POST["ucode"];
		if($uname && $upwd){
			if($ucode==$_SESSION["authcode"]){
				$sql="select id, sname from reg where sname='$uname' and spwd='$upwd'";
				$reg=mysql_query($sql);
			$row=mysql_fetch_row($reg);
			$_SESSION['uid']=$row[0];
			$_SESSION["uname"]=$uname;
			
				if($row){
					echo "<script>alert('登录成功');window.location.href='lyb2.php';</script>";
				
				}
				else{
					echo "<script>alert('登录失败请重新登录');window.location.href='denlu.php';</script>";
				
				}
			}else{
					echo "<script>alert('验证码不对');window.location.href='denlu.php';</script>";
				
			}
		}
		else{
				echo "<script>alert('提交失败');window.location.href='denlu.php';</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			.body{
				width: 100%;
				height: 900px;
				background: dodgerblue;
			}
			.body-zhu{
				width: 70%;
				height: 800px;
				margin: 0 auto;
				background: white;
			}
			.body-tu{
				width: 100%; height: 300px;
			}
			.body-zc{
				width: 100%; height: 600px;background: url(img/7.png);
			}
		</style>
	</head>
	<body>
		<?php include('head.php'); ?>
		<div class="body">
			<div class="body-zhu">
				<div class="body-tu"><img src="img/5.jpg" width="100%" height="300px" /></div>
				<div class="body-zc">
					<h1 style="margin: 0px 0px; text-align: center;">登录页</h1>
				<form method="post" action="denlu.php" >
				<table width="40%" align="center" style="background: gray;">
					<tr>
						<td>用户名：</td>
						<td><input type="text" name="uname" required="required" /></td>
					</tr>
					<tr>
						<td>密码：</td>
						<td><input type="password" name="upwd" required="required" /></td>
					</tr>
					<tr>
						<td>验证码：</td>
						<td><input type="text" name="ucode" required="required" />
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
	<img src="code.php" onclick="this.src='code.php?nocache='+Math.random()" title="点击换一张" alt="点击换一张" />						
						</td>
					</tr>
					<tr>
						<td clospan="2"><input type="submit" name="submit" value="登录" />
						</td>
						<td>
							<a href="zhuc.php">注册</a>
						</td>
					</tr>
					
				</table>
			</form>
				</div>
			</div>
		</div>
	</body>	
</html>
	
	<?php include('footer.php'); ?>
