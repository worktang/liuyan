<?php

$conn=mysql_connect("localhost","root","root") or die("连接失败".mysql_error());
mysql_query("set names utf8");//连接编码
mysql_select_db("board",$conn);//连接数据库

?>