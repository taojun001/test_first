<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();

$newscategory=$_POST['newscategory'];

$sql="select * from newscategory where newscategory='".$newscategory."'";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
if($rs=mysql_fetch_array($qr))
{
	echo "<script>alert('对不起！该类别已经存在。');history.go(-1)</script>";
}
else
{
	$sql="insert into newscategory(newscategory) values('".$newscategory."')";
	mysql_query("set names 'gb2312'");
	mysql_db_query('sxydb',$sql,$conn);
	echo "<script>alert('添加成功！');location.href='admin_newscategory_list.php'</script>";
}
?>