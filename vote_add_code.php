<?php 
include('conn.php'); 

$cid=$_POST['cid'];

if($cid=="")/*���ǰ��û��ʹ��JS���ж϶�ѡ�Ƿ�Ϊ�գ���ô��Ҫ�����������if������жϡ���������Ҫ�����if*/
{
	echo "<script>alert('����Ҫѡ��һ�');history.go(-1)</script>";
}
else
{
	for($i=0;$i<count($cid);$i++)
	{
		$sql="update choice set amount=amount+1 where cid=".$cid[$i];
		mysql_query("set names 'gb2312'");
		mysql_db_query('sxydb',$sql,$conn);
	}

echo "<script>alert('ͶƱ�ɹ���');location.href='index.php'</script>";
}
?>