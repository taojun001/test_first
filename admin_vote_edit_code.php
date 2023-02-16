<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 

$multi=$_POST['multi'];
$qid=$_POST['qid'];
$cid=$_POST['cid'];
$qcontent=$_POST['qcontent'];
$ccontent=$_POST['ccontent'];

for($i=0;$i<count($ccontent);$i++)
{
	if($ccontent[$i]=="")
	{
		echo "<script>alert('选项".($i+1)."不能为空！');history.go(-1)</script>";
		exit;	
	}
}

$sql="update question set qcontent='".$qcontent."',multi='".$multi."' where qid=".$qid;
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

for($i=0;$i<count($ccontent);$i++)
{
	$sql="update choice set ccontent='".$ccontent[$i]."' where cid=".$cid[$i];
	mysql_query("set names 'gb2312'");
	mysql_db_query('sxydb',$sql,$conn);
}
echo "<script>alert('修改投票成功！');location.href='admin_vote_list.php'</script>";

?>