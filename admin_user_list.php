<?php include('admin_check.php'); ?>
<?php include('conn.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
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
<p align="center">用户管理</p>
<table width="90%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#6699CC">
  <tr>
    <td height="25" align="center" bgcolor="#CCDDEE">ID</td>
    <td height="25" align="center" bgcolor="#CCDDEE">用户名</td>
    <td height="25" align="center" bgcolor="#CCDDEE">真实姓名</td>
    <td height="25" align="center" bgcolor="#CCDDEE">性别</td>
    <td height="25" align="center" bgcolor="#CCDDEE">QQ</td>
    <td height="25" align="center" bgcolor="#CCDDEE">E-mail</td>
    <td height="25" align="center" bgcolor="#CCDDEE">身份</td>
    <td height="25" colspan="2" align="center" bgcolor="#CCDDEE">操作</td>
  </tr>
<?php 
$sqlcp="select count(*) from user";
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


$sql="select * from user limit ".(($currentpage-1)*10).",10";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);

while($rs=mysql_fetch_array($qr))
{
?>
  <tr>
    <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rs['userid']; ?></td>
    <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rs['username']; ?></td>
    <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rs['truename']; ?></td>
    <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rs['sex']; ?></td>
    <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rs['qq']; ?></td>
    <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rs['email']; ?></td>
    <td height="25" align="center" bgcolor="#FFFFFF"><?php if($rs['po']==1) {?>管理员<?php } else { ?>会员<?php }?></td>
    <td height="25" align="center" bgcolor="#FFFFFF"><?php if($rs['po']!=1) {?><a href="admin_user_del.php?userid=<?php echo $rs['userid'] ?>" onclick="return confirm('确定要删除该记录吗？')">删除</a><?php }?></td>
    <td align="center" bgcolor="#FFFFFF"><a href="admin_user_edit.php?userid=<?php echo $rs['userid'] ?>">修改</a></td>
  </tr>
<?php 
}
?>
</table>
<p align="center">共<?php echo $num; ?>条记录&nbsp;当前是第<?php echo $currentpage; ?>页/共<?php echo $pages; ?>页

<?php 
if($currentpage!=1)
{
?>
<a href="?currentpage=1">第一页</a>
<a href="?currentpage=<?php echo $currentpage-1 ?>">上一页</a>
<?php 
}
?>

<?php 
if($currentpage!=$pages)
{
?>
<a href="?currentpage=<?php echo $currentpage+1 ?>">下一页</a>
<a href="?currentpage=<?php echo $pages ?>">最后一页</a>
<?php 
}
?>&nbsp;
看第
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
页
</p>
</body>



</html>
