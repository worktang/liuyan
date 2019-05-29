<?php
header('content-type:text/html;charset=utf-8');
session_start();
	include("conn.php");
if(isset($_GET["page"]))
{
	$page=$_GET["page"];
}
else
{
	$page=1;
}
$pagesize=5;	//每页显示的数量
$start=($page-1)*$pagesize;//从那条数据开始
$sql1="select a.*,b.sname,b.ssex,b.pubdate,b.path from words a,reg b where a.wid = b.id order by b.pubdate desc limit {$start},{$pagesize}";
$sreg=mysql_query($sql1);


$sql="select * from words";
$reg=mysql_query($sql);
$rows=mysql_num_rows($reg);
$pagenum=ceil($rows/$pagesize);
if(isset($_POST['submit']))
{
	$id=$_SESSION['uid'];
	$name=$_POST['name'];
	$liu=$_POST['liu'];
	$sql2="insert into words(wid,name,wdesc) values ($id,'$name','$liu')";
	$regg=mysql_query($sql2);
	if($regg)
	{
		echo "<script>alert('留言成功');window.location.href='index.php';</script>";
	}
	else{
		echo '留言失败'.mysql_error();
	}
}


if(isset($_GET['xid']))
{
	$xid=$_GET['xid'];
	$regs=mysql_query("delete from words where id=$xid");
	if($regs)
	{
		echo "<script>alert('删除成功');window.location.href='lyb2.php';</script>";
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
		<?php include('headly.php'); ?>
		<div class="body">
			<div class="body-zhu">
				<div class="body-tu"><img src="img/5.jpg" width="100%" height="300px" /></div>
				<div class="body-zc">
						
			<table style="background: gray; margin: 0px auto;">
					<div style="width: 200px; height: 100px;  margin: 0px auto; text-align: center; line-height: 100px;">
			<h1 style="margin:0px auto;">留言板</h1>
				</div>
				<tr>
					<th>图片</th>
					<th>姓名</th>
					<th>性别</th>
					<th>留言标题</th>
					<th>留言</th>
					<th>留言时间</th>
					<th>操作</th>
				</tr>
				<?php
				while($row=mysql_fetch_array($sreg)){
					echo "</tr>";
					echo "<tr align='center'>";
					echo '<td>'.'<img src='.$row['path'].' style="width:100px;height:50px;"/></td>';
					
					echo "<td><a href=liu.php?uid=".$row['wid'].">".$row["sname"]."</a></td>";
					echo "<td>".($row["ssex"]==0 ? "女" : "男")."</td>";
						echo "<td>".$row["name"]."</td>";
						echo "<td>".$row["wdesc"]."</td>";
						echo "<td>".$row['pubdate']."</td>";	
						if($row['wid']==$_SESSION['uid'])
						{                                                           
							 echo "<td><a href=update.php?uid=".$row['wid'].">修改</a><a href='lyb2.php?xid=".$row['id']."'>删除</a></td>";
						}
						echo "</tr>";

				}
				?>      
				<tr align="center">
					<td colspan="7">
				<?php
				 		 if($page==1)
						 {
						 	echo "首页&nbsp&nbsp";
						 }
						 else{
						 	echo "<a href=lyb2.php?page=1>首页&nbsp&nbsp</a>";
						 }
						  if($page==1)
						 {
						 	echo "上一页&nbsp&nbsp";
						 }
						 else{
						 	echo "<a href=lyb2.php?page=".($page-1).">上一页&nbsp&nbsp</a>";
						 }
						   if($page==$pagenum)
						 {
						 	echo "下一页&nbsp&nbsp";
						 }
						 else
							 {
							 	echo "<a href=lyb2.php?page=".($page+1).">下一页&nbsp&nbsp</a>";
							 }
						  if($page==$pagenum)
							 {
							 	echo "末页&nbsp&nbsp";
							 }
						 else
							 {
							 	echo "<a href=lyb2.php?page=".$pagenum.">末页&nbsp&nbsp</a>";
							 }
				 		?>
						&nbsp;&nbsp;
						<select id="sel" onchange="selpage()">
							<?php
							
								for($i=1;$i<=$pagenum;$i++){
									if($i==$page){
											echo "<option value=".$i." selected=selected>第".$i."</option>";
									}else{
											echo "<option value=".$i.">第".$i."</option>";
									}
								}
							?>
							
						</select>
					</td>
				</tr>
			</table>
			<br />                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
			
			<div style="width: 300px; height: 100px; margin: 0px auto;">
				<table>
					<form action="" method="post">
						<table>
							<tr>
								<td>留言标题</td>
								<td><input type="text" name="name" /></td>
							</tr>
			<tr><td >留言</td><td>
			<textarea name="liu" style="resize: none; width: 100%; height: 100px;"></textarea>
			</td></tr>
			<tr><td>
			<input type="submit" name="submit" value="留言" style="margin: 0px auto;" /><a href="userinfo.php">个人中心</a></td></td>
			</table>
		</form>
				</table>
			</div>
				</div>
			</div>
		</div>
	</body>	
</html>
	
	<?php include('footer.php'); ?>
<script>
	function selpage(){
		var jsel=document.getElementById("sel");
		var val=jsel.options[jsel.selectedIndex].value;
		window.location.href="lyb2.php?page="+val;
	}
	
</script>