<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();

$newscategoryid=$_GET['newscategoryid'];

$sql="delete from newscategory where newscategoryid=".$newscategoryid;
//$sql="delete newscategory,news from newscategory,news where newscategory.newscategoryid=news.newscategoryid and newscategory.newscategoryid=".$newscategoryid; 带着news表中的相应记录一起删除
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

echo "<script>alert('删除成功！');location.href='admin_newscategory_list.php'</script>";



/* 应该用下面的代码。可以解决某个类别里一条新闻都没有时，无法删除该类别的问题

include('conn.php'); 
session_start();

$newscategoryid=$_GET['newscategoryid'];

$sql1="select * from news where newscategoryid=".$newscategoryid;
mysql_query("set names 'gb2312'");
$qr1=mysql_db_query('shenxiangyu',$sql1,$conn);
if($rs1=mysql_fetch_array($qr1))
{
	$sql="delete newscategory,news from newscategory,news where news.newscategoryid=newscategory.newscategoryid and newscategory.newscategoryid=".$newscategoryid;
}
else
{
	$sql="delete from newscategory where newscategoryid=".$newscategoryid;
}
mysql_query("set names 'gb2312'");
mysql_db_query('shenxiangyu',$sql,$conn);

echo "<script>alert('删除成功！');location.href='admin_newscategory_list.php'</script>";
*/
?>