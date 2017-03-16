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

<div data-role="header" style="background-color:#336699" data-position="fixed">
    <h1 style="color:#FFFFFF">add keys</h1>
</div>
<div data-role="content">
    <span><h1>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $con = new mysqli(localhost, zjwdb_517679, Frank123, zjwdb_517679);

                function testword($data)
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                if ($con->connect_error) {
                    die("服务器连接失败：" . $con->connect_error);
                }
                $hm = testword($_POST["hm"]);
                $mm = testword($_POST["mm"]);
                $sct = "SELECT * FROM dt WHERE hm='$hm'";
                $result = $con->query($sct);

                if ($result->num_rows > 0) {
                    echo "此车号已存在，请直接查询或报告密码错误";
                } else {
                    $insert = "INSERT INTO dt (hm, mm)
				 VALUES ('$hm','$mm')";
                    if ($con->query($insert) === TRUE) {
                        echo "添加成功，感谢您的共享";
                    } else {
                        echo "添加失败：" . $con->error;
                    }
                }
            }

            ?>
        </h1></span>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="hm">
            输入车辆号码：
        </label>
        <input type="text" name="hm" id="hm" maxlength="60">
        <label for="mm">
            输入解锁密码：
        </label>
        <input type="text" name="mm" id="mm" maxlength="60">
        <input type="submit" value="提交">
    </form>
</div>






</body>
</html>