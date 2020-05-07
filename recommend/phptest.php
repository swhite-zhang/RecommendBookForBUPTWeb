<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "123456";
 
 
// 创建连接
$conn = new mysqli($servername, $username, $password);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
echo "连接成功";
$conn->query("set character set 'utf8'");//读库
$sql="select distinct major from rs.reader";

$result=$conn->query($sql);
while($row = $result->fetch_assoc()) {
        echo  $row["major"];
}

?>
</body>
</html>