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
		$fback=$yhm=$mm=$dhhm=$xx="";
		
		if (empty($_POST["yhm"]) or empty($_POST["mm"]) or empty($_POST["qrmm"]) or empty($_POST["dhhm"]) or empty($_POST["xx"]) )
		{
			$fback="资料填写不完善";
		}
		
		if ($_POST["mm"] !== $_POST["qrmm"])
		{
			$fback="重复输入密码不一致";
		}
		
		if (!preg_match("/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/",testword($_POST["dhhm"])) )
		{
			$fback="手机号码格式不正确";
		}
		
		
		else
		{
			$yhm=testword($_POST["yhm"]);
			$mm=testword($_POST["mm"]);
			$dhhm=testword($_POST["dhhm"]);
			$xx=testword($_POST["xx"]);
			
			$con=new mysqli(localhost,zjwdb_517679,Frank123,zjwdb_517679);
			
				if ($con->connect_error)
				{
				die ("服务器很害怕连接：". $con->connect_error);
				}
				
				$sss="SELECT * FROM puser WHERE yhm = '$yhm' ";
				$tstyhm=$con->query($sss);
				
				if ($con->affected_rows == 1)
				{
					$fback="用户名已被注册" ;
				}
				
				
				else
				{
					$ist="INSERT INTO puser (yhm, mm, dhhm, xx )
					VALUES ('$yhm', '$mm', '$dhhm', '$xx' )";
					
					if ($con->query($ist) === TRUE )
					{
						$fback="注册成功！";
						
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
						$fback="呃，注册失败：". $con->error ;
					}
					
				}
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
	<h1 style="color:#FFFFFF">注册结果</h1>
	</div>
	
	<div data-role="content">
	<br/>
	<br/>
	<span><h3><?php echo $fback ;?></h3></span>
	<br/>
	<p>如需切换用户请重新登录。</p><br/>
	<hr/>
	<a href="index.php" data-role="button" data-inline="true">返回首页</a>
	</div>
	
	<div data-role="footer">
	<h1>beta</h1>
	</div>

</div>

</body>
</html>