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
</style>
<script>
function check_form()
{
	if(form1.newscategory.value=="")
	{
		alert("������Ʋ���Ϊ�գ�");
		return false;
	}
}
</script>

</head>

<body>
<?php 
$newscategoryid=$_GET['newscategoryid'];

$sql="select * from newscategory where newscategoryid=".$newscategoryid;
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
$rs=mysql_fetch_array($qr);
?>
<p align="center">��������޸�</p>
<table width="300" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#6699CC">
<form id="form1" name="form1" method="post" action="admin_newscategory_edit_code.php">
  <tr>
    <td width="95" height="35" align="right" bgcolor="#FFFFFF">������ƣ�</td>
    <td width="198" height="35" align="left" bgcolor="#FFFFFF"><input name="newscategory" type="text" id="newscategory" value="<?php echo $rs['newscategory']; ?>" />
      <input name="newscategoryid" type="hidden" id="newscategoryid" value="<?php echo $newscategoryid ?>" /></td>
  </tr>
  <tr>
    <td height="35" colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="�ύ" onclick="return check_form()" />
    &nbsp;
    <input type="reset" name="button2" id="button2" value="����" /></td>
  </tr>
</form>
</table>
<p>&nbsp; </p>
</body>
</html>
