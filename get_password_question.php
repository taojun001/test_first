<?php include('conn.php'); ?>
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
-->
</style>
<script>
function check_form()
{
	if(form1.answer1.value=="")
	{
		alert("������ʾ����1�𰸲���Ϊ�գ�");
		return false;
	}
	
	if(form1.answer2.value=="")
	{
		alert("������ʾ����2�𰸲���Ϊ�գ�");
		return false;
	}

}
</script>
</head>

<body>
<?php 
$username=$_POST['username'];

$sql="select * from user where username='".$username."'";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
if($rs=mysql_fetch_array($qr))
{
?>
<p align="center">ȡ������</p>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
<form id="form1" name="form1" method="post" action="get_password_reinput.php">
  <tr>
    <td height="30" align="right">������ʾ����1��</td>
    <td height="30" align="left"><?php echo $rs['question1']; ?>
      <input name="userid" type="hidden" id="userid" value="<?php echo $rs['userid']; ?>" /></td>
  </tr>
  <tr>
    <td height="30" align="right">������ʾ����1�𰸣�</td>
    <td height="30" align="left"><input type="text" name="answer1" id="answer1" /></td>
  </tr>
  <tr>
    <td height="30" align="right">������ʾ����2��</td>
    <td height="30" align="left"><?php echo $rs['question2']; ?></td>
  </tr>
  <tr>
    <td height="30" align="right">������ʾ����2�𰸣�</td>
    <td height="30" align="left"><input type="text" name="answer2" id="answer2" /></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center"><input type="submit" name="button" id="button" value="��һ��" onclick="return check_form()" /></td>
  </tr>
</form>
</table>
<?php
} 
else
{
	echo "<script>alert('�Բ��𣡸��û���������');history.go(-1)</script>";
}
?>
<p>&nbsp; </p>
</body>
</html>
