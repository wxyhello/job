<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style>
	img{width:100px;height:120px;}
	dl{float:left;width:250px;height:120px;}
	dt{float:left;margin-right:10px;}
	dd{line-height:30px;}
</style>
<script src="jquery-1.8.3.js"></script>
<script>
	$(function(){
		$.ajax({
			type:"GET",
			url:'date.php',
			data:"html",   //json
			success:function(data){
				var obj=eval("("+data+")");
				var str='<div>';
				for(var i=0;i<obj.length;i++){
					str+='<dl>';
					str+=" <dt><img src='"+obj[i].bImg+"'/></dt>";
					str+='<dd>书名：'+obj[i].bName+'<br />作者：'
									 +obj[i].bAuthor+'<br />价格：'
									 +obj[i].bPrice+'元<br />出版社：'
									 +obj[i].bPus+'</dd>';
					str+='</dl>';
				}	
				str+='</div>';
				$("div").html(str);	
			}
		})
	})
</script>
<body>
	<div></div>
</body>
</html>