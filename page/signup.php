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


<div data-role="page"><!--用户注册-->

	<div data-role="header" style="background-color:#336699">
		<a href="index.php" data-role="button" style="color:#CCCCCC">首页</a>
		<h1 style="color:#FFFFFF">用户注册</h1>
	</div>
	
	<div data-role="content">
		<h3>免费注册新用户！</h3>
		<hr/><br/>
		
		<form method="post" action="fcreate.php">
		
			<label for="yhm">用户名：</label>
			<input type="text" name="yhm" id="yhm" maxlength="56">
			
			<label for="xx">所在学校（公司）*：</label>
			<input type="text" name="xx" id="xx" maxlength="88">
			
			<label for="dhhm">电话号码**：</label>
			<input type="text" name="dhhm" id="dhhm" maxlength="50">
						
			<label for="mm">密码：</label>
			<input type="password" name="mm" id="mm" maxlength="56">
			
			<label for="qrmm">确认密码：</label>
			<input type="password" name="qrmm" id="qrmm" maxlength="56">
			
			<input type="submit" value="免费注册">
			
		</form>
		
		<a href="signin.php" data-role="button" style="background:#CCCCCC">已有账户，去登录</a>
		<br/>
		<p>*用于安排地点</p>
		<br/>
		<p>**用于确认订单</p>
		
	</div>
	
	<div data-role="footer">
		<h1>beta</h1>
	</div>
	
</div>




</body>

</html>