<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();

$userid=$_GET['userid'];

$sql="delete from user where userid=".$userid;
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

echo "<script>alert('É¾³ý³É¹¦£¡');location.href='admin_user_list.php'</script>";
?>