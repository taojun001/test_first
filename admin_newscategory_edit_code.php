<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();

$newscategoryid=$_POST['newscategoryid'];
$newscategory=$_POST['newscategory'];

$sql="select * from newscategory where newscategory='".$newscategory."'";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
if($rs=mysql_fetch_array($qr))
{
	echo "<script>alert('�Բ��𣡸�����Ѿ����ڡ�');history.go(-1)</script>";
}
else
{
$sql="update newscategory set newscategory='".$newscategory."' where newscategoryid=".$newscategoryid;
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

echo "<script>alert('�޸ĳɹ���');location.href='admin_newscategory_list.php'</script>";
}
?>