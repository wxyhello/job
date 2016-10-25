<?php
$link=mysql_connect('localhost','root','root');   //连接数据库（本机域名，用户名，密码）
mysql_query('set names utf8');  //设置字符集
mysql_select_db('1409v',$link); //通过$link  找到1409v   ($link 可以省略)
?>