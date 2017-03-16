<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js" >
	</script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js">
	</script>
</head>

<body>

<div data-role="page"><!--用户登录-->

	<div data-role="header" style="background-color:#336699">
		<a href="index.php" data-role="button" style="color:#CCCCCC">首页</a>
		<h1 style="color:#FFFFFF">用户登录</h1>
	</div>
	
	<div data-role="content">
		<h3>请输入用户名和密码</h3>
		<hr/><br/>
		
		<form method="post" action="flogin.php" >
			
			<label for="dlyh">用户名：</label>
			<input type="text" name="dlyh" id="dlyh" maxlength="56">
			
			<label for="dlmm">密码：</label>
			<input type="password" name="dlmm" id="dlmm" maxlength="56">
			
			<input type="submit" value="确认登录" >
			
		</form>
		
		<a href="signup.php" data-role="button" style="background:#CCCCCC">没有账户，去注册</a>
		
	</div>
	
	<div data-role="footer">
		<h1>beta</h1>
	</div>
	
</div>


</body>
</html>