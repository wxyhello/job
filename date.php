<?php
include('config.php');
$sql="select * from book";
$result=mysql_query($sql);
$rows=array();
while($rs=mysql_fetch_assoc($result)){
	$rows[]=$rs;
}
echo json_encode($rows);
?>