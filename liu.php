<?php
header('content-type:text/html;charset=utf-8');
	include("conn.php");
	session_start();
	$uid=$_SESSION["uid"];
	if(!isset($uid)){
		echo "<script>alert('请登录');window.location.href='denlu.php'</script>";
	}
	if(isset($_GET['uid'])){
		$uid=$_GET['uid'];
		$sql="select sname,spwd,saddress,ssex,sage,scid,semail,stel from reg where id=$uid";
		$infore=mysql_query($sql);
		$rows=mysql_fetch_row($infore);
//		echo '<pre>';
//		print_r($rows);
	}
	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
	}
	else
	{
		$page=1;
	}
	$pagesize=2;	//每页显示的数量
	$start=($page-1)*$pagesize;//从那条数据开始
	$sql1="select a.*,b.sname,b.saddress,b.path from words a,reg b where a.wid = b.id and a.wid=$uid order by wpubdate desc limit {$start},{$pagesize} ";
	$sreg=mysql_query($sql1);
	
	$sql="select * from words where wid=$uid";
	$reg=mysql_query($sql);
	$rows=mysql_num_rows($reg);
	$pagenum=ceil($rows/$pagesize);
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
				width: 100%; height: 300px; background: url(img/7.png));border: 1px solid red;
			}
			.body-zc{
				width: 100%; height: 600px;background: coral;
			}
			.body-left{
				width:70%;height: 600px; float: left;
			}
			.body-right{
				width:30%;height: 600px; float: left;
			}
			ul li{
				list-style: none;
			}
		</style>
	</head>
	<body>
		<?php include('head.php'); ?>
		<div class="body">
			<div class="body-zhu">
				<div class="body-tu"><img src="img/5.jpg" style="width: 100%; height: 300px;" /></div>
				<div class="body-zc">
					<table border="1" cellspacing="" cellpadding="" style="margin: 0px auto;">
					<?php
					while($row=mysql_fetch_array($sreg)){
						echo '<tr>';
								echo "<td><a>".'用户:'.$row['sname']."</a></td>";
								echo '<td><h4 >'.'标题：'.$row['name'].'</h4></td>';
							echo '</tr>';
							echo '<tr>';
								echo "<td><img src='".$row['path']."'style='width:100px;height:80px;'/></td>";
								echo "<td>".'内容：'.$row['wdesc']."</td>";
							echo '</tr>';
							echo '<tr>';
								echo '<td>'.'时间:'.$row['wpubdate'].'</td>';
							if($row['wid']==$_SESSION['uid'])
							{   
							 echo "<td><a href='fabiao.php?xid=".$row['id']."'>删除</a></td>";
							}
							echo '</tr>';
							echo '<tr>';
								echo '<td>'.'来自:'.$row['saddress'].'</td>';
							echo '</tr>';
					}
					?>
				<tr align="center">
					<td colspan="7">
					<?php	

							// 分页
							if($page==1){
								echo '首页&nbsp;&nbsp;';
							}else{
								echo "<a href='wodeliuyan.php?page=1."."&uid=".$uid."'>首页&nbsp;&nbsp</a>";
							}
					
							if($page==1){
								echo '上一页&nbsp;&nbsp;';
							}else{
								echo "<a href='wodeliuyan.php?page=".($page-1)."&uid=".$uid."'>上一页&nbsp;&nbsp</a>";
							}
							
							if($page==$pagenum){
								echo '下一页&nbsp;&nbsp;';
							}else{
								echo "<a href='wodeliuyan.php?page=".($page+1)."&uid=".$uid."'>下一页&nbsp;&nbsp</a>";
							}
							
							if($page==$pagenum){
								echo '尾页&nbsp;&nbsp;';
							}else{
								echo "<a href='wodeliuyan.php?page=".$pagenum."&uid=".$uid."'>尾页&nbsp;&nbsp;</a>";
							}
					
							echo "当前页:".$page.'/'.$pagenum;
							echo "&nbsp;&nbsp";
?></td></tr>

				</table>
				</div>
			</div>
		</div>
	</body>	
</html>
	
	<?php include('footer.php'); ?>
