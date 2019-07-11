<?php

header("Content-type:application/json; charset=utf-8");
 
// 连接数据库
$con = mysql_connect("127.0.0.1","root","corei3window7");
if (!$con){die('Could not connect: ' . mysql_error());}
 
mysql_select_db("test", $con);
mysql_query("SET NAMES 'utf8'");
 
//查询数据库
$result = mysql_query("SELECT * FROM nittei");
$results = array();
//查询数据库是否存在这条记录
$exist = mysql_num_rows($result);
if ($exist) {
    //遍历输出
    while ($row = mysql_fetch_assoc($result)){
        $results[] = $row;
        }
 
    //输出JSON
    #echo urldecode(json_encode($results));
    echo json_encode($results);

    //当查询无结果的时候
    }else{
 
        //构建数组
        $arr = array(
            "noresult" => "暂无结果"
        );
 
        //把数组转换为json
        $data = json_encode($arr);
        echo "[$data]";
}
 
//断开数据库连接
mysql_close($con);

?>
