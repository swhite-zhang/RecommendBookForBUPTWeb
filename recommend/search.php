<!DOCTYPE html>

<html>
<head>
<meta charset="utf8">
<link rel="stylesheet" type="text/css" href="../index.css" >
<script src="search/search.js"></script>
<script src="search/jquery.js"></script>
</head>

<body id="bg">

<div id="header">
<p><a class="a1" href="../index.html">北京邮电大学基于海量读者数据的图书推荐</a></p>
</div>

<div id="nav" style="border-color: rgba(234, 236, 238, 0.6);background-color:rgba(234, 236, 238, 0.6);">
<p align="center"> <a href="recommendCollege.html">学院</a></p>
<p align="center"><a href="recommendMonth.html">月份</a></p>
<p align="center"><a href="arithmetic.html">算法</a></p>
<p align="center"><a href="search.php">搜索</a></p>
</div>

<div id="section">
    <p>这里是使用我们的推荐算法得出的推荐列表（得分前十的书籍从上往下列出）。</p>
    <select  id="college">
        <?php
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
        echo "<option>--请选择学院--</option>"; 
        $conn->query("set character set 'utf8'");
        //读库
        $sql="select distinct major from rs.reader";
        $result=$conn->query($sql);
        while($row = $result->fetch_assoc()) {
            echo "<option>" . $row["major"] . "</option>";
        }
        ?>
    </select>
    <select id="grade">
    </select>
    <form>
        <input id="input"  type="text" placeholder="请输入你想要查找的书籍" />
    </form>
    <button class="searchBtn" onclick="btn()">搜索</button>
    <ol id="result">
    </ol>
</div>
</body>
</html>
