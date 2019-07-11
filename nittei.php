<?php



$content = $_GET['content'];
echo $content;

$servername = "127.0.0.1";
$username = "root";
$password = "corei3window7";
$dbname = "test";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

mysql_query("set names 'utf8'",$conn); 

$p = '/大后天|后天|明天|昨天|前天|今天|\d+月\d+[日号]|\d+年\d+月\d+[日号]|\d+[点时]+|\d+[年月日号]|周一|周二|周三|周四|周五|周六|周日|周天/';
if (preg_match_all($p, $content, $match)) {
    $time = $match[0][0];
    echo $time;
}

if($time=="大后天") {
    $date = date("Y-m-d", strtotime("+3 days", strtotime("now")));
}
if($time=="后天") {
    $date = date("Y-m-d", strtotime("+2 days", strtotime("now")));
}
if($time=="明天") {
    $date = date("Y-m-d", strtotime("+1 days", strtotime("now")));
}
if($time=="今天") {
    $date = date("Y-m-d", strtotime("now"));
}
if($time=="昨天") {
    $date = date("Y-m-d", strtotime("-1 days", strtotime("now")));
}
if($time=="前天") {
    $date = date("Y-m-d", strtotime("-2 days", strtotime("now")));
}
if($time=="周一") {
    $date = date("Y-m-d", strtotime("next monday", strtotime("now")));
}
if($time=="周二") {
    $date = date("Y-m-d", strtotime("next tuesday"));
}
if($time=="周三") {
    $date = date("Y-m-d", strtotime("next wednesday"));
}
if($time=="周四") {
    $date = date("Y-m-d", strtotime("next thursday"));
}
if($time=="周五") {
    $date = date("Y-m-d", strtotime("next friday"));
}
if($time=="周六") {
    $date = date("Y-m-d", strtotime("next saturday"));
}
if($time=="周日") {
    $date = date("Y-m-d", strtotime("next sunday"));
}
if($time=="周天") {
    $date = date("Y-m-d", strtotime("next sunday"));
}

$sql = "INSERT INTO nittei (date,time, content)
    VALUES ('$date','$time', '$content')";

if ($conn->query($sql) === TRUE) {
        echo '新记录插入成功；';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 
    $conn->close();
?>