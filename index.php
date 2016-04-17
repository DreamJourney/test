<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<script type="text/javascript">
	//创建ajax
	var b;
	function ajax()
	{
		if(window.ActiveXobject)
		{
			b=new ActiveXobject("Microsoft.XMLHTTP");
		}
		else
		{
			b=new XMLHttpRequest();
		}
		return b;
	}
	var a="";
	function checkname()
	{
		if($("username").value.length==0)
		{
			$("my").innerHTML="用户名不得为空";
		}
		else
		{

			a=ajax();
			if(a)
			{
				var url="1.php";
				var data="username="+$('username').value;
				a.open("post",url,true); //打开请求
				//post请求必须要下面这句话 get的不用
				a.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				//指定回调函数
				a.onreadystatechange=chuli;
				//如果是get请求填入null 如果是post请求则填入实际的请求
				a.send(data);
			}
			else
			{
				alert('创建失败');
			}
		}
	}
	//回调函数
	function chuli()
	{
		//取出从1.php中返回的数据
		if(a.readyState==4)
		{
			var mes=a.responseText;
			var mes_obj=eval("("+mes+")");
			$("my").innerHTML=mes_obj[0].age;
		}
	}
	function $(id)
	{
		return document.getElementById(id);
	}
</script>
<body>
	<form action="" method="post">
		用户名:<input type="text" name="username" onkeyup="checkname()" id="username"/>
		<span style="color:red" id="my"></span>
		<br/>
		密码:<input type="password" name="password"/><br/>
		电子邮件<input type="text" name="email" /><br/>
		<input type="submit" value="用户注册"/>
	</form>
		<form action="" method="post"><br/>
		密码:<input type="password" name="password"/><br/>
		电子邮件<input type="text" name="email" /><br/>
		<input type="submit" value="用户注册"/>
	</form>
</body>
</html>