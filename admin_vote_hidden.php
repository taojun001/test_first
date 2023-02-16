<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();

$qid=$_GET['qid'];
$hidden=$_GET['hidden'];

if($hidden==0)
{
	$sql="update question set hidden=1 where qid=".$qid;
}
else
{
	$sql="update question set hidden=0 where qid=".$qid;
}
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

echo "<script>alert('显示状态设置成功！');location.href='admin_vote_list.php'</script>";

?>