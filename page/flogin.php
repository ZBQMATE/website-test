<!DOCTYPE html>

<?php

function testword($data)
{
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	$yhm=testword($_POST["dlyh"]);
	$mm=testword($_POST["dlmm"]);
	
	
		$con=new mysqli(localhost,zjwdb_517679,Frank123,zjwdb_517679);
	
		if ($con->connect_error)
		{
		die ("服务器很害怕连接：". $con->connect_error);
		}
		
				
		$tst="SELECT yhm, mm FROM puser WHERE yhm= '$yhm'AND mm= '$mm'";
		
		$result=$con->query($tst);
		
		if ($con->affected_rows == 1)
		{
			$ans="登录成功！";
			
			setcookie
			(
			"yhm",
			$yhm,
			time()+(90*24*60*60)
			);
			
			setcookie
			(
			"mm",
			$mm,
			time()+(90*24*60*60)
			);
		}
		
		else
		{
			$ans="用户名或密码错误";
		}

}		
?>


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

<div data-role="page">

	<div data-role="header" style="background-color:336699">
	<h1 style="color:#FFFFFF">用户登录</h1>
	</div>
	
	<div data-role="content">
	<br/>
	<br/>
	<span><h3><?php echo $ans ;?></h3></span>
	<br/>
	<p>如需切换用户请重新登录</p><br/>
	<hr/>
	<a href="index.php" data-role="button" data-inline="true">返回首页</a>
	</div>
	
	<div data-role="footer">
	<h1>beta</h1>
	</div>

</div>

</body>
</html>