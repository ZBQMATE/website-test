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

<div data-role="page" id="pageone"><!--产品列表-->

	<div data-role="header" style="background-color:#336699" data-position="fixed">
		<h1 style="color:#FFFFFF">项目名称</h1>
	</div>
	
	<div data-role="content">
		
		<div>
		
		<br/><h2>产品介绍</h2><hr/>
		<p>一句话说明情况，比如巴拉巴拉</p>
		<br/>
		
		<p><a href="signup.php">马上注册</a>或者 <a href="signin.php">登录</a></p><br/>
		
		</div>
		
		
		<ul data-role="listview">
			<span>
		<?php 
			
			$con=new mysqli(localhost,zjwdb_517679,Frank123,zjwdb_517679);
	
				if ($con->connect_error)
				{
					die("服务器连接失败：" . $con->connect_error );
				}
						
						
			$sct="SELECT cpm, cph, djs, dd FROM listall";
			$result=$con->query($sct);
			
			if ($result->num_rows > 0)
			{
				while ($row=$result->fetch_assoc() )
				{
					echo "<hr/> <a href=\"".$row["cph"].".php\"><li>" .$row["cpm"]. " <br/><br/>[" .$row["dd"]. "] "  .$row["djs"]. " </li></a><br/> ";
					
				}
			}
			else
			{
				echo "no data found";
			}
			
			if (isset($_COOKIE["yhm"]))
			{
				$check="已登录";
			}
			else
			{
				$check="";
			}
		
		?>
			</span>
		</ul>
	
	</div>
	
	<div data-role="footer" data-position="fixed">
		<a href="signin.php" data-role="button">登录</a>
		<a href="signup.php" data-role="button">注册</a>
		<h1><span><?php echo $check ;?></span></h1>
	</div>

</div>


</body>
</html>