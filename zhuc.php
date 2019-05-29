
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
				height: 900px;
				margin: 0 auto;
				background: white;
			}
			.body-tu{
				width: 100%; height: 300px;border: 1px solid red;
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
					<form method="post" action="zhuc.php" enctype="multipart/form-data">
							<h1 style="margin: 0px 0px; text-align: center;">注册页</h1>
						<table width="40%" align="center" style="background: gray;">
							<tr>
								<td>用户名称:</td>
								<td><input type="text" name="sname" required="required" /></td>
							</tr>
							<tr>
								<td>用户密码:</td>
								<td><input type="password" name="spwd" required="required" /></td>
							</tr>
							<tr>
								<td>用户性别:</td>
								<td><input type="radio" checked="checked" value="0" name="ssex" />女&nbsp;<input type="radio" value="1" name="ssex" /> 男</td>
							</tr>
						<td>用户年龄:</td>
								<td><input type="number" name="sage" required="required" /></td>
							</tr>
							<td>用户邮箱:</td>
								<td><input type="email" name="semail" required="required" /></td>
							</tr>
							<tr>
								<td>用户手机号码:</td>
								<td><input type="text" name="stel" required="required" /></td>
							</tr>
								<td>用户身份证号:</td>
								<td><input type="text" name="scid" required="required" /></td>
							</tr>
							<tr>
								<td>用户描述:</td>
								<td><textarea name="saddress" cols="18" rows="10" style="resize: none;"></textarea></td>
							</tr>
							<tr>
								<td>提交图片</td>
								<td><input type="file" name="file" /></td>
							</tr>
								
							<tr>
								<td clospan="2"><input type="submit" name="submit" value="注册" />
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
<?php

	include("conn.php");
	if(isset($_POST["submit"])){
		$sname =$_POST["sname"];
		$spwd=md5($_POST["spwd"]);
		$ssex =$_POST["ssex"];
		$sage=$_POST["sage"];
		$semail=$_POST["semail"];
		$stel=$_POST["stel"];
		$scid=$_POST["scid"];
		$saddress=$_POST["saddress"];
		
		
		$filename='';
		$arr=$_FILES["file"];
		print_r($arr);
		if(($arr["type"]=="image/png" || $arr["type"]=="image/jpeg") && $arr["size"]<102400){
			$filename="upload/image/".date("Ymdhis").$arr["name"];
			if(file_exists($filename)){
				echo "已经存在";
			}
			else{
				move_uploaded_file($arr["tmp_name"], $filename);
			}
		}
		$sql="insert into reg(sname,spwd,ssex,sage,semail,stel,scid,saddress,path) values('$sname','$spwd',$ssex,$sage,'$semail','$stel','$scid','$saddress','$filename')";
		include("conn.php");//执行sql语句之前必须要连接数据库服务器
		$regresult=mysql_query($sql);//执行sql语句
		if(!$regresult){
			die("注册失败".mysql_error());
		}else{
			echo "<script>alert('注册成功');window.location.href='denlu.php';</script>";
		}
	}
?>

