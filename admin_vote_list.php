<?php include('admin_check.php'); ?>
<?php include('conn.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	background-color: #FFFFFF;
}
-->
</style></head>

<body>
<p align="center">ͶƱ����</p>
<table width="550" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#6699CC">
  <tr>
    <td height="25" align="center" bgcolor="#CCDDEE">ID</td>
    <td align="center" bgcolor="#CCDDEE">����</td>
    <td height="25" align="center" bgcolor="#CCDDEE">����</td>
    <td height="25" align="center" bgcolor="#CCDDEE">��ҳ��ʾ״̬</td>
    <td height="25" colspan="2" align="center" bgcolor="#CCDDEE">����</td>
  </tr>
<?php 
$sqlcp="select count(*) from question";
mysql_query("set names 'gb2312'");
$qrcp=mysql_db_query('sxydb',$sqlcp,$conn);
$rscp=mysql_fetch_array($qrcp);

$num=$rscp[0];
$pages=ceil($num/10);

if($_GET['currentpage']=="")
{
	$currentpage=1;
}
else
{
	$currentpage=$_GET['currentpage'];
}


$sql="select * from question limit ".(($currentpage-1)*10).",10";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);

while($rs=mysql_fetch_array($qr))
{
?>
  <tr>
    <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rs['qid']; ?></td>
    <td align="center" bgcolor="#FFFFFF"><?php if ($rs['multi']==0) {?>��ѡ<?php } else { ?>��ѡ<?php }?></td>
    <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rs['qcontent']; ?></td>
    <td height="25" align="center" bgcolor="#FFFFFF"><a href="admin_vote_hidden.php?qid=<?php echo $rs['qid']; ?>&hidden=<?php echo $rs['hidden'] ?>"><?php if ($rs['hidden']==0) {?>��ʾ<?php } else { ?>����<?php }?></a></td>
    <td height="25" align="center" bgcolor="#FFFFFF"><a href="admin_vote_del.php?qid=<?php echo $rs['qid'] ?>" onclick="return confirm('���ɾ�������⣬��Ӧ��ѡ�����ɾ������ȷ����')">ɾ��</a></td>
    <td align="center" bgcolor="#FFFFFF"><a href="admin_vote_edit.php?qid=<?php echo $rs['qid'] ?>">�޸�</a></td>
  </tr>
<?php 
}
?>
</table>
<p align="center">��<?php echo $num; ?>����¼&nbsp;��ǰ�ǵ�<?php echo $currentpage; ?>ҳ/��<?php echo $pages; ?>ҳ

<?php 
if($currentpage!=1)
{
?>
<a href="?currentpage=1">��һҳ</a>
<a href="?currentpage=<?php echo $currentpage-1 ?>">��һҳ</a>
<?php 
}
?>

<?php 
if($currentpage!=$pages)
{
?>
<a href="?currentpage=<?php echo $currentpage+1 ?>">��һҳ</a>
<a href="?currentpage=<?php echo $pages ?>">���һҳ</a>
<?php 
}
?>&nbsp;
����
<?php 
for($i=1;$i<=$pages;$i++)
{
	if($currentpage==$i)
	{
		echo $i;
	}
	else
	{
?>
    	<a href="?currentpage=<?php echo $i ?>"><?php echo $i; ?></a>
<?php 
	}
}
?>
ҳ
</p>
</body>



</html>
