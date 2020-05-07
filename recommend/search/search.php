<?php
    $reception=$_GET['q'];
    $data=JSON_decode($reception);
    $msg="";

    $servername = "localhost";  
    $username = "root";  
    $password = "123456";  
    $db="rs";
    // 创建连接  
    $conn = mysqli_connect($servername, $username, $password,$db);  
    // 检测连接  
    if (!$conn) {  
        die("Connection failed: " . mysqli_connect_error());  
    }
    $conn->query("set character set 'utf8'");
    //读库
    if($data[0]=="大一"){
        $sql="select bookname, count(*)as num FROM rs.record where readerId like '%2018%' and college = '" . $data[1] . "' and bookname like '%" . $data[2] . "%' group by bookName order by num desc limit 0,10;";
    }
    elseif ($data[0] == "大二"){
        $sql="select bookname, count(*)as num FROM rs.record where readerId like '%2017%' and college = '" . $data[1] . "' and bookname like '%" . $data[2] . "%' group by bookName order by num desc limit 0,10;";
    }
    else {
        $sql="select bookname, count(*)as num from rs.record where college = '" . $data[1] . "' and bookname like '%" . $data[2] . "%' group by bookname order by num desc limit 0,10;";
    }
    $res=$conn->query($sql);
    if ($res->num_rows > 0) {
    // 输出每行数据
        while($row = $res->fetch_assoc()) {
            $msg .= "<li>" . $row["bookname"] . "</li>";
        }
        echo $msg;
    } else {
        echo "0 result";
    }
?>