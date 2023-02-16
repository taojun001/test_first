<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();

$newscategoryid=$_POST['newscategoryid'];
$title=$_POST['title'];
$content=$_POST['content'];
$author=$_SESSION['susername'];

$sql="insert into news(newscategoryid,title,author,content) values('".$newscategoryid."','".$title."','".$author."','".$content."')";
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);
echo "<script>alert('Ìí¼Ó³É¹¦£¡');location.href='admin_news_list.php'</script>";

?>