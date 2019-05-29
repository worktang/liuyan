
<?php
header('content-type:text/html;charset=utf-8');
session_start();
include ("conn.php");
	$uid=$_SESSION['uid'];
	if (isset($_POST["submit"])) {
	$uname = $_POST["uname"];
	$upwd=$_POST['upwd'];
	$uaddress=$_POST['uaddress'];
	$uage = $_POST["uage"];
	$ucid=$_POST['ucid'];
	$uemail=$_POST['uemail'];
	$stel=$_POST['utel'];
		
		$filename='';
		$insql='';
		if(!empty($arr["name"])){
			if(($arr["type"]=="image/png" || $arr["type"]=="image/jpeg") && $arr["size"]<102400){
			$filename="./upload/image/".date("Ymdhis").$arr["name"];
			if(file_exists($filename)){
				echo "已经存在";
			}
			else{
				move_uploaded_file($arr["tmp_name"], $filename);
			}
		}
	
	else{
		echo "<script>alert('图片格式不对');</script>";
	}
	
		$sq = "update reg set sname='$uname',spwd=$upwd,saddress='$uaddress',sage=$uage,scid='$ucid',semail='$uemail',stel='$stel',path='$filename'  where id=$uid";
	}else{
	$sq = "update reg set sname='$uname',spwd=$upwd,saddress='$uaddress',sage=$uage,scid='$ucid',semail='$uemail',stel='$stel',path='$filename'  where id=$uid";
	}
	$eyy = mysql_query($sq);
	if($eyy ){
	echo "<script>alert('修改成功');window.location.href='userinfo.php?uid=".$uid."'</script>";
	}
	else{
		echo "<script>alert('修改失败');window.location.href='updateuser.php?uid=".$uid."'</script>";
	}
}
	$alertsql="select sname,spwd,saddress,sage,scid,semail,stel,path from reg where id=$uid";
	$alertrsql2=mysql_query($alertsql);
if (!$alertrsql2) exit("执行SQL:$alertsql<br>出错:".mysql_error()); 
	$alertrow=mysql_fetch_array($alertrsql2);

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
		</style>
	</head>
	<body>
<?php include("head.php"); ?>
	<div class="body">
			<div class="body-zhu">
				<div class="body-tu"><img src="img/5.jpg" width="100%" height="300px" /></div>
				<div class="body-zc">
			<form method="post" action="updateuser.php" enctype="multipart/form-data">
				<table width="40%" align="center">
					<tr>
					<td>用户：</td>
					<td><input type="text" name="uname"   value="<?php echo $alertrow['sname'];?>" /> </td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input type="password" name="upwd" value="<?php echo $alertrow['spwd'];?>"   /></td>
				</tr>
				<tr>
					<td>地址：</td>
					<td><input type="text" name="uaddress" value="<?php echo $alertrow['saddress'];?>"  /></td>
				</tr>
				<tr>
					<td>年龄：</td>
					<td><input type="number" min="0" max="120" name="uage"  value="<?php echo $alertrow['sage'];?>"  /></td>
				</tr>
				<tr>
					<td>身份证：</td>
					<td><input type="text" name="ucid" value="<?php echo $alertrow['scid'];?>"  /></td>
				</tr>
				<tr>
					<td>邮箱：</td>
					<td><input type="email" name="uemail" value="<?php echo $alertrow['semail'];?>"  /></td>
				</tr>
				<tr>
					<td>联系电话：</td>
					<td><input type="text" name="utel"  value="<?php echo $alertrow['stel'];?>"  /></td>
				</tr>
				<tr>
					<td>
						图片:
					</td>
					<td>
						<input type="file" name="file"  value="<?php echo $alertrow['path'];?>" />
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit"  value="更改" />
					</td>
				</tr>
				</table>
			</form>
				</div>
			</div>
		</div>

</body>
</html>
<?php include("footer.php"); ?>