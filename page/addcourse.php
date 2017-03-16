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
<div data-role="page">

	<div data-role="header">
		<h1>添加产品</h1>
	</div>
	
	<div data-role="content">
	
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
		$cpm=$cph=$djs=$cjs=$gys=$dd=$feedb="";
		
		$glymm=testword($_POST["glymm"]);
		
		if ($glymm != 961120)
		{
			$feedb="管理员密码不正确" ;
		}
		
		else
		{
			$cpm=testword($_POST["cpm"]);
			$cph=testword($_POST["cph"]);
			$djs=testword($_POST["djs"]);
			$cjs=testword($_POST["cjs"]);
			$gys=testword($_POST["gys"]);
			$dd=testword($_POST["dd"]);
			
			
			$conn=new mysqli(localhost, zjwdb_517679, Frank123, zjwdb_517679);
			 
			 if ($conn->connect_error)
			 {
			 	die("连接服务器失败".$conn->connect_error);
			 }
			 
			 $sss="SELECT * FROM listall WHERE cph = '$cph' ";
			 $tstcph=$conn->query($sss);
			 
			 if ($conn->affected_rows == 1)
			 {
			 	$feedb="数据库中发现相同编号产品";
			 }
			 
			 else
			 {
			 
			 	//创建表
				 $cdb=
				 "CREATE TABLE $cph 
				 (
				 id INT(16) NOT NULL AUTO_INCREMENT,
				 customer VARCHAR(60) NOT NULL,
				 tel VARCHAR(60) NOT NULL,
				 odate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
				 PRIMARY KEY (id)
				 )";
				 
				 //向产品目录里插信息
				 $insert="INSERT INTO listall (cpm, cph, gys, djs, cjs, dd)
				 VALUES ('$cpm','$cph','$gys','$djs','$cjs', '$dd')";
				 
				 
				 //创建新PHP文件
				 $content='
				 	
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
						<div data-role="page">
						
							<div data-role="header" style="background-color:#336699" data-position="fixed">
								<h1 style="color:#FFFFFF">项目名称</h1>
								<a href="index.php" data-role="button" style="color:#CCCCCC">首页</a>
							</div>
							
							<div data-role="content">
							
							<br/><h1> '.$cpm.' </h1><hr/>
							
							<br/><h3>提供者： '.$gys.' </h3><br/>
							<h3>地区： '.$dd.' </h3>
							
							<br/><p>   '.$cjs.'</p>
							
							<br/><br/>
							
							<p style="color:#666666">另外我还要说的是巴拉巴拉</p><br/>
							
							
							<form method="post" action="result.php" >
								
								<input type="hidden" name="cph" id="cph" value=" '.$cph.' ">
								<input type="submit" value="一键预定" >
								
							</form>	
								
							
							</div>
							
							<div data-role="footer">
								<h1>BETA 测试版</h1>
							</div>
						
						</div>
						
						</body>
						</html>
					
				 ';
				 
				 $froot=$_SERVER['DOCUMENT_ROOT'];
				 
				 $filename="$froot/".$cph.".php";
				 
				 $dir=dirname($filename);
				 
					if (!is_dir($dir))
					{
					mkdir($dir,0777,true);
					}
				
				@ $fp = fopen($filename, 'ab');
	
				flock($fp, LOCK_EX);
					
					$resp="";
					
					if (!$fp)
					{
						$resp="unable to excecute fopen";
					}
					
					else
					{
					$fw=fwrite($fp,$content,strlen($content)) or die("nable to fwrite");
					}
					
				flock($fp,LOCK_UN);
				
				fclose($fp);
				
				$rep = "written" ;
									 
				 if ($conn->query($cdb) === TRUE and $conn->query($insert) === TRUE and $rep == "written" )
				 {
					$feedb="添加成功！";
				 }
				 else
				 {
				 	$feedb="创建数据表或添加记录失败".$resp.$conn->error ;
				 }
				 
			 }
		}
	
	
	}
	
	
?>
	
	<span><h1><?php echo $feedb ; ?></h1></span>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
	
	<label for="cpm">产品名</label>
	<input type="text" name="cpm" id="cpm">
	
	<label for="cph">产品号</label>
	<input type="text" name="cph" id="cph">
	
	<label for="djs">短介绍</label>
	<input type="text" name="djs" id="djs">
	
	<label for="cjs">长介绍</label>
	<input type="text" name="cjs" id="cjs">
	
	<label for="gys">供应商</label>
	<input type="text" name="gys" id="gys">
	
	<label for="dd">地点</label>
	<input type="text" name="dd" id="dd">
	
	<label for="glymm">管理员密码</label>
	<input type="password" name="glymm" id="glymm">
	
	<input type="submit" value="添加新产品">
	
	</form>
	
	
	
	</div>
	
	<div data-role="footer">
		<h1>FIRST DEMO</h1>
	</div>

</div>

</body>
</html>