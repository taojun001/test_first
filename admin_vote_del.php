<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();

$qid=$_GET['qid'];

$sql="delete question,choice from question,choice where question.qid=choice.qid and question.qid=".$qid;
/*
如果存在有的问题没有选项的情况，那么就用以下代码。可以删除那些没有选项的问题
$sql1="select * from choice where qid=".$qid;
mysql_query("set names 'gb2312'");
$qr1=mysql_db_query('sxydb',$sql1,$conn);
if($rs1=mysql_fetch_array($qr1))
{
	$sql="delete question,choice from question,choice where choice.qid=question.qid and question.qid=".$qid;
}
else
{
	$sql="delete from question where qid=".$qid;
}
*/

mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);


echo "<script>alert('删除成功！');location.href='admin_vote_list.php'</script>";
?>