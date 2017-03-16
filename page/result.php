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
			
	$cph = testword($_POST["cph"]);

	
		
		if ( isset($_COOKIE["yhm"]) and isset($_COOKIE["mm"]) )
		{
			$con=new mysqli(localhost,zjwdb_517679,Frank123,zjwdb_517679);
		
			if ($con->connect_error)
			{
				die ("数据库很害怕连接：". $con->connect_error);
			}
			
			$yhm = testword($_COOKIE["yhm"]);
			$mm = testword($_COOKIE["mm"]);
			
			$tst="SELECT yhm, mm, dhhm FROM puser WHERE yhm= '$yhm' AND mm= '$mm'";
			
			$result=$con->query($tst);

			if ($con->affected_rows == 1)
			{
				$chek="SELECT * FROM $cph WHERE customer= '$yhm'";
				$rst=$con->query($chek);

				if ($con->affected_rows == 1)
				{
					$ass="<h2>已成功预定！</h2>";
					$already="1";
				}
				
				else
				{
					while ($row=$result->fetch_assoc() )
					{
						$tel=$row["dhhm"];
					}
					
					$inst = "INSERT INTO $cph (customer,tel) VALUES ('$yhm', '$tel')";
					
					if ($con->query($inst) === TRUE)
					{
						$ass="<h2>预定成功！</h2>";
						$already="1";
					}
					else
					{
						$ass="添加失败,请稍后再试：".$con->error ;
					}
					
				}
				
				
				
			}
			else/* cookies 不正确 */
			{
				$already="X";
			}
			
		}
		else/* 没有 cookies */
		{
			$already="X";
		}
		
		
		if ( $already == "X" )
		{
			
			$ass="
				
				<h2>请先登录</h2><hr/><br/>
					<form method=\"post\" action=\"sresult.php\">
					
						<label for=\"xyhm\">用户名：</label>
						<input type=\"text\" name=\"xyhm\" id=\"xyhm\" maxlength=\"56\" />
						
						<label for=\"xmm\">密码：</label>
						<input type=\"password\" name=\"xmm\" id=\"xmm\" maxlength=\"56\" />
						
						<input type=\"hidden\" name=\"cph\" id=\"cph\" value=\"".$cph."\" />
						
						<input type=\"submit\" value=\"确认登录\" />
					
					</form>
					<a href=\"signup.php\" data-role=\"button\" style=\"background:#CCCCCC\">没有账户，去注册</a>
				
			";
		}
		
		
		
		
	}


?>

<div data-role="page">

	<div data-role="header" style="background-color:#336699" data-position="fixed">

		<h1 style="color:#FFFFFF">在线预定</h1>
	</div>
	
	<div data-role="content">
		<br/>
		<br/>
		
		<span><?php echo $ass ;?></span>
		
		<br/>
		<p>要声明的，关于支付问题</p>
		<br/><br/>
		<a href="index.php" data-role="button">返回首页</a>
	</div>
	
	
</div>


<div data-role="footer">
	<h1>beta</h1>
</div>


</body>
</html>