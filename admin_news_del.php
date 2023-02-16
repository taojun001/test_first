<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();

$newsid=$_GET['newsid'];

$sql="delete from news where newsid=".$newsid;
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

echo "<script>alert('É¾³ý³É¹¦£¡');location.href='admin_news_list.php'</script>";
?>