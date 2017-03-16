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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>

    <div data-role="header">
        <h1>创建user表</h1>
    </div>

    <div data-role="content">
        <h2>创建结果：</h2>
        <?php
            $conn=new mysqli(localhost, zjwdb_517679, Frank123, zjwdb_517679)
            if ($conn->connect_error)
            {
                die("failed to connect:". $conn->connect_error)
            }

            $ctb="CREATE TABLE user
            (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            yhm VARCHAR(60) UNIQUE NOT NULL ,
            mm VARCHAR(60) NOT NULL ,
            dhhm INT NOT NULL ,
            xx VARCHAR(90) NOT NULL ,
            orderdate DATE NOT NULL DEFAULT CURDATE()
            )";

            if ($conn->query($ctb) === TRUE )
            {
                $feedback="user table successfully created!";
            }
            else
            {
                $feedback="failed to create table user ". $conn->error ;
            }
        ?>

        <br/>
        <hr/>
        <br/>
        <span><h2><?php echo $feedback ; ?></h2></span>

    </div>

<div data-role="footer">
   <h1>fire it and win</h1>
</div>

</body>
</html>