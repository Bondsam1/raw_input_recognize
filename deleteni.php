<?php
$postdata = $_POST; //获得POST请求提交的数据
$con=mysqli_connect("localhost","root","corei3window7","test");
// 检测连接
if (mysqli_connect_errno())
{
    echo "连接失败: " . mysqli_connect_error();
}
mysqli_query($con,"truncate table nittei");

mysqli_close($con);
?>