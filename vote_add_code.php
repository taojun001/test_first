<?php 
include('conn.php'); 

$cid=$_POST['cid'];

if($cid=="")/*如果前面没有使用JS来判断多选是否为空，那么就要在这里用这个if语句来判断。否则，则不需要加这个if*/
{
	echo "<script>alert('至少要选择一项！');history.go(-1)</script>";
}
else
{
	for($i=0;$i<count($cid);$i++)
	{
		$sql="update choice set amount=amount+1 where cid=".$cid[$i];
		mysql_query("set names 'gb2312'");
		mysql_db_query('sxydb',$sql,$conn);
	}

echo "<script>alert('投票成功！');location.href='index.php'</script>";
}
?>