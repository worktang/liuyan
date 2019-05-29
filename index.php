<?php
header('content-type:text/html;charset=utf-8');
session_start();
include("conn.php");
$sql1="select a.*,b.sname,b.ssex,b.pubdate from words a,reg b where a.wid = b.id limit 4";
$sreg=mysql_query($sql1);	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			.body{
				width: 100%;
				height: 800px;
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
				width: 100%; height: 500px;background: url(img/7.png);
			}
			.body-left{
				width:30%;height: 500px; float: left;
			}
			.body-right{
				width:30%;height: 500px; float: right;
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
				<div class="body-tu"><img src="img/5.jpg" width="100%" height="300px" /></div>
				<div class="body-zc">
					<div class="body-left">
						<fieldset style="height: 400px;border-radius: 8px ;">
							<legend style="font-size: 30px;">
								<center>最新消息</center>
							</legend>
<div style="width: 50%;margin-top: 4px;height: 300px;float: left;border-radius: 8px ;">
	    <p style="color: #EA5404;">五湖四海的朋友们的讨论</p>
	    <!--滚动-->
	    <div id="demo" style="overflow:hidden;height:180px;width:240px;line-height:20px;margin: auto;">
	      <div id="demo1"stwyle="color: #EA5404;padding-top: 3px;"><strong>保利叶语--郁先生、陈女士：</strong><br />
	        <strong>橱柜那些做的很好，不同的颜色啊，不同类型的厨房都做得挺有意思的，特意去敲了敲墙砖，不像有些样板房，自己的墙砖都做的空鼓，贴的真好，设计师的解说也说得满具体的，很多瓷砖的铺贴细节问题都能给我回答，我家要是也能贴成这样，就好了。</strong><br />
	        <br />
	        <strong>慧芝湖--陈女士：</strong><br />
	        <strong>我家就在他们的体验馆旁边，很近，就五分钟，那天闲逛过去的，挺不好意思的，去的时候带着宝宝，一直闹一直闹，朗域一个工作的小姑娘一直帮忙哄，他们有那个装修顾问，挺好的，看装修档次我以为很贵，后来价格搭配，却少好多，挺实惠的，最近设计方案看完了，等待预算确定，就让他们装啦。</strong><br />
	        <br />
	        <strong>宝华北岸郡亭--李先生夫妇：</strong><br />
	        <strong>开始以为是家装公司那种宣传噱头，也正好是有房装修，就想过去聊聊也成，掌握下现在装修行情。过去一看，居然是真的实景，功能分区做的还很全面，转了一圈，感觉还不错，就签了设计协议，主要我是看中后期施工的闭口合同，如果真的能做到无增加那就不错，现在的话图纸看过了，和我在展会之前看的不同，他们给我看的是全套的图纸，很多电的图纸我还是第一次见，感觉不错。</strong><br />
	        <br />
	        <strong>宝华盛世花园--魏女士：</strong><br />
	        <strong>儿子的房子装修我最近一直在对比选装修，去了朗域，他们那几套实景厨房特别喜欢，儿子新房的厨房面积不大，一直也是想看看怎么做能显得宽敞一点，实用一点，过来一看，我至少有两三种想法可以弄，都挺好的。最近我家已经开始施工了，工人都挺规范，选朗域，到目前为止，我都是很满意！</strong><br />
	        <br />
	        <strong>万业紫辰苑--张先生，李小姐：</strong><br />
	        <strong>我们其实比较感兴趣他们做的工艺演示，因为家里房子入手后，也是搜房、篱笆各种地方学习装修知识，但是一直没有个系统全面的认识，很多时候不知道有些工序要怎么做，怎么做才能好一点，在体验馆这次都看到了，跟他们工程类的服务人员聊了一下，感觉不错，深有所得——这也是我选朗域的原因，我家现在泥木结束了，特满意！</strong><br />
	        <br />
	        <strong>三花现代城--李女士：</strong><br />
	        <strong>我是做服务行业的，所以对服务的细节很关注，朗域公司里面服务挺好的，不像有的地方促销是的使劲拉着你装修什么的。随便你看，你感兴趣的时候，公司的人员就给你详细讲一下，我觉得这个服务模式挺人性化的。让人感觉很舒服，装修的东西做的也很具体，很实际！回头要和朋友们推荐一下来看看！</strong><br />
	        <br />
	        <strong>兰湖美域--王先生：</strong><br />
	        <strong>蛮好的，基本上海这几年的风格都看得到，整体效果看起来特别舒服。这最大的特点是不像别的样板房用很多的软装饰来拉效果，而是用硬装来看，真实不少。我平时也忙，工作事情也多，也不想因为一个装修四处跑来看这个看那个，前期电话和他们聊了聊，全包的模式，实景选材让我省事不少，前两天去了趟工地看了看，师傅活干得很细，工地也干净，不错！</strong><br />
	        <br />
	      </div>
	      <div id="demo2"></div>
	    </div>
	    <script>   
	    	var speed=50
		     demo2.innerHTML=demo1.innerHTML
			 function Marquee(){
			   if(demo2.offsetTop-demo.scrollTop<=0)
			   demo.scrollTop-=demo1.offsetHeight
			   else{
			   demo.scrollTop++
			  	 }
			   }
			   var MyMar=setInterval(Marquee,speed)
			   demo.onmouseover=function() {clearInterval(MyMar)}
			   demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
		</script>
   </div>
						</fieldset>	
					</div>
					<div style="width: 400px; height: 500px; float: left;">
						<ul style="margin: 0px 0px; padding: 0px 0px;">
							<li><img src="img/313843.jpg" width="400px" height="200px" style="list-style: none; " /></li>
							<li><img src="img/300932.jpg" width="400px" height="200px" style="list-style: none; " /></li>
						</ul>
					</div>
					<div class="body-right">
						<fieldset style="height: 400px;border-radius: 8px ;">
							<legend style="font-size: 30px;">
								<center>留言板</center>
							</legend>
						 	<p  style="font-size: 20px;"></p>
							<?php
								while($row=mysql_fetch_array($sreg)){
									echo "</tr>";
									echo "<tr align='center'>";
									echo "<td><p><a href=userinfo.php?uid=".$row['id'].">".$row["sname"]."</p></a></td>";
										echo "<td><p>".$row["wdesc"]."</p></td>";	
										echo "</tr>";
				
								}
							?>
							<p  style="font-size: 19px;"><a href="lyb2.php" style="float:right;">更多</a></p>
						</fieldset>	
					</div>
				</div>
			</div>
		</div>
	</body>	
</html>
	
	<?php include('footer.php'); ?>
