<?php 
include('conn.php');

$userid=$_POST['userid'];
$password=substr(md5($_POST['password']),8,16);

$sql="update user set password='".$password."' where userid=".$userid;
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

echo "<script>alert('新密码设置成功！');location.href='index.php'</script>";

?>