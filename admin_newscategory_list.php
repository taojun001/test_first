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
<p align="center">����������</p>
<table width="400" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#6699CC">
  <tr>
    <td height="30" align="center" bgcolor="#CCDDEE">ID</td>
    <td height="30" align="center" bgcolor="#CCDDEE">�������</td>
    <td align="center" bgcolor="#CCDDEE">��ҳ��ʾ״̬</td>
    <td height="30" colspan="2" align="center" bgcolor="#CCDDEE">����</td>
  </tr>
<?php

$sql="select * from newscategory";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);

while($rs=mysql_fetch_array($qr))
{
?>
  <tr>
    <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $rs['newscategoryid'] ?></td>
    <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $rs['newscategory'] ?></td>
    <td align="center" bgcolor="#FFFFFF"><a href="admin_newscategory_hidden.php?newscategoryid=<?php echo $rs['newscategoryid'] ?>&hidden=<?php echo $rs['hidden'] ?>"><?php if ($rs['hidden']==0) {?>��ʾ<?php } else { ?>����<?php }?></a></td>
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_newscategory_edit.php?newscategoryid=<?php echo $rs['newscategoryid'] ?>">�޸�</a></td>
    <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_newscategory_del.php?newscategoryid=<?php echo $rs['newscategoryid'] ?>" onclick="return confirm('ɾ������𽫻ᵼ�����и�����µ����Ŷ���ɾ������ȷ����������')">ɾ��</a></td>
  </tr>
<?php 
}
?>
</table>
<p>&nbsp; </p>
</body>

</html>
