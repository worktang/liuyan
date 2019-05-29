<?php
session_start();
header('content-type:text/html;charset=utf-8');
	include("conn.php");
	if(isset($_GET['uid'])){
		$uid=$_GET['uid'];
		$sql="select sname,saddress,ssex,sage,scid,semail,stel,path from reg where id=$uid";
		$infore=mysql_query($sql);
		$rows=mysql_fetch_row($infore);
//		echo '<pre>';**
//		print_r($rows);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
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
			p{
				font-size: 20px;
			}
		</style>
	</head>
	<body>
	<?php include("head.php")?>
<div class="body">
			<div class="body-zhu">
				<div class="body-tu"><img src="img/5.jpg" width="100%" height="300px" /></div>
				<div class="body-zc">
			<div style="margin: 0px auto; width: 30%;">
			<center><h1 style="padding: 0px 0px; margin: 0px 0px; ">个人信息</h1></center>
			<p >姓名:<?php echo $rows[0]?></p>
			<p>地址：<?php echo $rows[1]?></p>
			<p>性别:<?php echo $rows[2]?></p>
			<p>年龄:<?php echo $rows[3]?></p>
			<p>身份证：<?php echo $rows[4]?></p>
			<p>邮箱:<?php echo $rows[5]?></p>
			<p>电话：<?php echo $rows[6]?></p>
			<p>图片：<?php echo $rows[7]?></p>
			<p><a href="javascript:history.go(-1);">返回上一页</a></p>
			<center><p><a href="updateuser.php">修改</a></p></center>
			</div>
		</div>
		<br />

</div>
</div>
</div>
		<?php include("footer.php"); ?>
	</body>
</html>