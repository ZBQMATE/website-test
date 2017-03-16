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
    <h1 style="color:#FFFFFF">share keys</h1>
</div>
<div data-role="content">
    <p>
        share keys of ofo
    </p>
    <span><h1>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
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
                $nnn = testword($_POST["nnn"]);
                $sct = "SELECT hm, mm FROM dt WHERE hm='$nnn'";
                $result = $con->query($sct);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo $row["mm"];
                    }
                } else {
                    echo "no data found";
                }
            }

            ?>
        </h1></span>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="nnn">
            输入车辆号码：
        </label>
        <input type="text" name="nnn" id="nnn" maxlength="60">
        <input type="submit" value="查询">
    </form>
    <a href="add.php" data-role="button" data-inline="true">添加密码</a>
    <a href="edit.php" data-role="button" data-inline="true">报告密码错误</a>
</div>



</body>
</html>