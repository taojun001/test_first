<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();

$newscategoryid=$_GET['newscategoryid'];
$hidden=$_GET['hidden'];

if($hidden==0)
{
	$sql="update newscategory set hidden=1 where newscategoryid=".$newscategoryid;
}
else
{
	$sql="update newscategory set hidden=0 where newscategoryid=".$newscategoryid;
}
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

echo "<script>alert('显示状态设置成功！');location.href='admin_newscategory_list.php'</script>";

?>