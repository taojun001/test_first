<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();

$newscategoryid=$_GET['newscategoryid'];

$sql="delete from newscategory where newscategoryid=".$newscategoryid;
//$sql="delete newscategory,news from newscategory,news where newscategory.newscategoryid=news.newscategoryid and newscategory.newscategoryid=".$newscategoryid; ����news���е���Ӧ��¼һ��ɾ��
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

echo "<script>alert('ɾ���ɹ���');location.href='admin_newscategory_list.php'</script>";



/* Ӧ��������Ĵ��롣���Խ��ĳ�������һ�����Ŷ�û��ʱ���޷�ɾ������������

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

echo "<script>alert('ɾ���ɹ���');location.href='admin_newscategory_list.php'</script>";
*/
?>