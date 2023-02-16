<?php include('admin_check.php'); ?>
<?php 
include('conn.php');

$multi=$_POST['multi'];
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

$sql="insert into question(qcontent,multi) values('".$qcontent."','".$multi."')";
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

$lastid=mysql_insert_id();

for($i=0;$i<count($ccontent);$i++)
{
	$sql="insert into choice(qid,ccontent) values('".$lastid."','".$ccontent[$i]."')";
	mysql_query("set names 'gb2312'");
	mysql_db_query('sxydb',$sql,$conn);
}
echo "<script>alert('添加投票成功！');location.href='admin_vote_list.php'</script>";

?>
