<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();

$newsid=$_POST['newsid'];
$newscategoryid=$_POST['newscategoryid'];
$title=$_POST['title'];
$content=$_POST['content'];

$sql="update news set newscategoryid='".$newscategoryid."',title='".$title."',content='".$content."' where newsid=".$newsid;
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

echo "<script>alert('ÐÞ¸Ä³É¹¦£¡');location.href='admin_news_list.php'</script>";

?>