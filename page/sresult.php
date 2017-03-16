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

<?php 
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		function testword($data)
		{
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		
		$xyhm = testword($_POST["xyhm"]);
		$xmm = testword($_POST["xmm"]);
		$cph = testword($_POST["cph"]);
		
		$con=new mysqli(localhost,zjwdb_517679,Frank123,zjwdb_517679);
		
			if ($con->connect_error)
			{
				die ("数据库很害怕连接：". $con->connect_error);
			}
			
		$tst="SELECT yhm, mm, dhhm FROM puser WHERE yhm= '$xyhm' AND mm= '$xmm'";
		
		$result=$con->query($tst);

		if ($con->affected_rows == 1)
		{
			while ($row=$result->fetch_assoc() )
			{
				$tele=$row["dhhm"];
			}

			$inst = "INSERT INTO $cph (customer,tel) VALUES ('$xyhm', '$tele')";
				
				if ($con->query($inst) === TRUE)
				{
					$ass="<h2>预定成功！</h2><br/><br/><a href=\"index.php\" data-role=\"button\">返回首页</a>";

				}
				else
				{
					$ass="添加失败,请稍后再试：".$con->error ;
				}

		}
		else
		{
			$ass="<h2>用户名或密码错误，请重试</h2><br/><br/><a href=\"signup.php\" data-role=\"button\" style=\"background:#CCCCCC\">没有账户？点我注册！</a>";
			
		}

		
	}

?>


<div data-role="page">

	<div data-role="header" style="background-color:#336699" data-position="fixed">

		<h1 style="color:#FFFFFF">在线预定</h1>
	</div>
	
	<div data-role="content">
		<br/><br/>
		<span><?php echo $ass ;?></span>
		<hr/><br/>
		<p>要声明的，关于支付问题</p>
		<br/><br/>
	</div>
	
	<div data-role="footer">
		<h1>beta</h1>
	</div>
	
</div>
</body>
</html>