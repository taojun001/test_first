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
<?php 
$newscategoryid=$_REQUEST['newscategoryid'];
$firstload=$_POST['firstload'];
?>
<p align="center">���Ź���</p>
<p align="center">
<div align="center">
<form id="form1" name="form1" method="post" action="">
�������
    <select name="newscategoryid" id="newscategoryid">
    	<option value="">ȫ��</option>
<?php 
$sql="select * from newscategory";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);

while($rs=mysql_fetch_array($qr))
{
?>    
      <option value="<?php echo $rs['newscategoryid'] ?>" <?php if ($rs['newscategoryid']==$newscategoryid) {?> selected="selected"<?php }?>><?php echo $rs['newscategory'] ?></option>
<?php 
}
?>      
    </select>
    <input type="submit" name="button" id="button" value="�ύ" />
    <input name="firstload" type="hidden" id="firstload" value="1" />
</form>
</div>
</p>

<table width="800" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#6699CC">
  <tr>
    <td height="30" align="center" bgcolor="#CCDDEE">ID</td>
    <td height="30" align="center" bgcolor="#CCDDEE">�������</td>
    <td height="30" align="center" bgcolor="#CCDDEE">���ű���</td>
    <td height="30" align="center" bgcolor="#CCDDEE">������</td>
    <td height="30" align="center" bgcolor="#CCDDEE">����ʱ��</td>
    <td height="30" align="center" bgcolor="#CCDDEE">�������</td>
    <td height="30" colspan="2" align="center" bgcolor="#CCDDEE">����</td>
  </tr>
<?php
if($newscategoryid=="")
{
	$sqlcp="select count(*) from news";
}
else
{
	$sqlcp="select count(*) from news where newscategoryid=".$newscategoryid;
}
mysql_query("set names 'gb2312'");
$qrcp=mysql_db_query('sxydb',$sqlcp,$conn);
$rscp=mysql_fetch_array($qrcp);

$num=$rscp[0];
$pages=ceil($num/5);

if($_GET['currentpage']=="" or $firstload==1)
{
	$currentpage=1;
}
else
{
	$currentpage=$_GET['currentpage'];
}




if($newscategoryid=="")
{
	$sql="select * from news order by pubtime desc limit ".(($currentpage-1)*5).",5";
}
else
{
	$sql="select * from news where newscategoryid=".$newscategoryid." order by pubtime desc limit ".(($currentpage-1)*5).",5";
}

mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);

while($rs=mysql_fetch_array($qr))
{
?>
  <tr>
    <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $rs['newsid'] ?></td>
    <td height="30" align="center" bgcolor="#FFFFFF">
    <?php 
	$sqlc="select * from newscategory where newscategoryid=".$rs['newscategoryid'];
	mysql_query("set names 'gb2312'");
	$qrc=mysql_db_query('sxydb',$sqlc,$conn);
	$rsc=mysql_fetch_array($qrc);
	?>
    <?php echo $rsc['newscategory'] ?>
    </td>
    <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $rs['title'] ?></td>
    <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $rs['author'] ?></td>
    <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $rs['pubtime'] ?></td>
    <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $rs['hits'] ?></td>
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_news_edit.php?newsid=<?php echo $rs['newsid'] ?>">�޸�</a></td>
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_news_del.php?newsid=<?php echo $rs['newsid'] ?>" onclick="return confirm('ȷ��Ҫɾ���ü�¼��')">ɾ��</a></td>
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
<a href="?currentpage=1&newscategoryid=<?php echo $newscategoryid ?>">��һҳ</a>
<a href="?currentpage=<?php echo $currentpage-1 ?>&newscategoryid=<?php echo $newscategoryid ?>">��һҳ</a>
<?php 
}
?>

<?php 
if($currentpage!=$pages)
{
?>
<a href="?currentpage=<?php echo $currentpage+1 ?>&newscategoryid=<?php echo $newscategoryid ?>">��һҳ</a>
<a href="?currentpage=<?php echo $pages ?>&newscategoryid=<?php echo $newscategoryid ?>">���һҳ</a>
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
    	<a href="?currentpage=<?php echo $i ?>&newscategoryid=<?php echo $newscategoryid ?>"><?php echo $i; ?></a>
<?php 
	}
}
?>
ҳ
</p>

</body>

</html>
