<?php
include('config.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style>
	*{margin:0;padding:0;}
	div{width:1000px;height:400px;margin:auto;}
	p{margin-left:200px;margin-top:10px;}
	i{font-style:normal;}
	a{color:#000;list-style:none;}
	img{width:100px;height:120px;}
	dl{float:left;width:305px;height:120px;margin:5px 10px;}
	dt{float:left;margin-right:10px;}
	dd{line-height:30px;}
</style>
<body>
	<div>
		<?php
			$sql='select * from book';
			$result=mysql_query($sql);
			$count=mysql_num_rows($result);   //一共多少条记录

			$pageSize=9;   //一页几条记录
			$totalpage=ceil($count/$pageSize);    //一共有几页
			
			//判断
			if($_GET['page']){
				$page=$_GET['page'];
				if($page>=$totalpage){
					$page=$totalpage;
				}
			}else{
				$page=1;
			}
			
			$start=($page-1)*$pageSize;
			$sql_l="select * from book limit {$start},{$pageSize}";
			$result_l=mysql_query($sql_l);
			while($rs=mysql_fetch_array($result_l)){
				?>
					<dl>
						<dt><img src="<?php echo $rs["bImg"];?>"></dt>
						<dd>书　名：<?php echo $rs["bName"];?><br />
							作　者：<?php echo $rs["bAuthor"];?><br />
							价　格：<?php echo $rs["bPrice"];?>元<br />
							出版社：<?php echo $rs["bPus"];?></dd>
					</dl>
				<?php
			}
		?>
	</div>
	<p>共<?php echo $totalpage;?>页　当前页  <i><?php echo $page;?></i>/<?php echo $totalpage;?>
		<a href="page.php?page=1">首页</a>
		<a href="page.php?page=<?php echo $page-1;?>">上一页</a>
		<a href="page.php?page=<?php echo $page+1;?>">下一页</a>
		<a href="page.php?page=<?php echo $totalpage;?>">尾页</a></p>
</body>
</html>