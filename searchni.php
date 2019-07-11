<?php  
header("Content-type:text/html;charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "corei3window7";  
$dbname = "test";  

// 创建连接  
$con =mysqli_connect($servername, $username, $password, $dbname);  
 


$keyword1 = $_GET['content'];
  
$sql = "SELECT * FROM nittei WHERE date like '%$keyword1%'";  
$result = mysqli_query($con,$sql);  
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

$jarr = array();
while ($rows=mysqli_fetch_array($result,MYSQL_ASSOC)){
    $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
    for($i=0;$i<$count;$i++){  
        unset($rows[$i]);//删除冗余数据  
    }
    array_push($jarr,$rows);
}
echo $str=json_encode($jarr);//将数组进行json编码
mysqli_close($con);
?>