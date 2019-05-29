<!--
<?php
header('content-type:text/html;charset=utf-8');
session_start();
include ("conn.php");
	$uid=$_SESSION['uid'];
	if (isset($_POST["submit"])) {
		$uname =$_POST["uname"];
		$wdesc=$_POST["liu"];
		$sq="update words set name='$uname',wdesc='$wdesc' where id=$uid";
		$eyy = mysql_query($sq);
	if($eyy ){
	echo "<script>alert('修改成功');window.location.href='lyb2.php?uid=".$uid."'</script>";
//echo mysql_error();
	}
	else{
//		echo "<script>alert('修改失败');window.location.href='update.php?uid=".$uid."'</script>";
	}
 }


	$alertsql="select name,wdesc from words where wid=$uid";
	$alertrsql2=mysql_query($alertsql);
if (!$alertrsql2) exit("执行SQL:$alertsql<br>出错:".mysql_error()); 
	$alertrow=mysql_fetch_array($alertrsql2);

?>-->
<?php
	include('conn.php');
	if(isset($_POST['submit'])){
		$uname =$_POST["uname"];
		$wdesc=$_POST["liu"];
		$id=$_POST['id'];
		$sq='';
		if(!empty($arr["id"])){
		}else{
			$sq="update words set name='$uname',wdesc='$wdesc' where id=$uid";
		}
		$results=mysql_query($sq);
		if($results){
			echo "<script>alert('修改成功');window.location.href='lyb2.php?uid=".$uid."'</script>"; 
		}
		else{
			exit(mysql_error());
		}
	}	
	if(isset($_GET['uid'])){
		$uid=$_GET['uid'];
		$alertsql="select name,wdesc,id from words where wid=$uid";
	$alertrsql2=mysql_query($alertsql);
		$alertrow=mysql_fetch_array($alertrsql2);
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
		</style>
	</head>
	<body>
<?php include("head.php"); ?>
<div class="body">
			<div class="body-zhu">
				<div class="body-tu"><img src="img/5.jpg" width="100%" height="300px" /></div>
				<div class="body-zc">
			<form method="post" action="update.php" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $alertrow[2]; ?>" />
				<table width="40%" align="center">
				<tr>
					<td>留言标题</td>
					<td><input type="text" name="uname" value="<?php echo $alertrow[0]; ?>"/></td>
				</tr>
			<tr><td colspan="2">
			<textarea name="liu" style="resize: none; width: 100%; height: 100px;" value="<?php echo $alertrow[1]; ?>"></textarea>
			</td></tr>
			<tr><td>
			<input type="submit" name="submit" value="留言" style="margin: 0px auto;" /><a href="userinfo.php">个人中心</a></td></td>
			</table>
			</form>
		</div>
	</div>
</div>	
</body>
</html>
<?php include("footer.php"); ?>