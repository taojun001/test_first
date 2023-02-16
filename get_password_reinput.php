<?php include('conn.php'); ?>
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
-->
</style>
<script>
function check_form()
{
	if(form1.password.value.length<5 || form1.password.value.length>20)
	{
		alert("密码必须在5-20位之间！");
		return false;
	}
	
	if(form1.password.value!=form1.password1.value)
	{
		alert("两次输入的密码不一致！");
		return false;
	}
}
</script>
</head>

<body>
<?php 
$userid=$_POST['userid'];
$answer1=$_POST['answer1'];
$answer2=$_POST['answer2'];

$sql="select * from user where answer1='".$answer1."' and answer2='".$answer2."' and userid=".$userid;
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
if($rs=mysql_fetch_array($qr))
{
?>
<p align="center">取回密码</p>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
<form id="form1" name="form1" method="post" action="get_password_reinput_code.php">
  <tr>
    <td height="30" align="right">请输入新的密码：</td>
    <td height="30" align="left"><input type="password" name="password" id="password" />
      <input name="userid" type="hidden" id="userid" value="<?php echo $userid; ?>" /></td>
  </tr>
  <tr>
    <td height="30" align="right">再次输入新密码：</td>
    <td height="30" align="left"><input type="password" name="password1" id="password1" /></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center"><input type="submit" name="button" id="button" value="提交" onclick="return check_form()" />
    &nbsp;
    <input type="reset" name="button2" id="button2" value="重置" /></td>
  </tr>
</form>
</table>
<?php 
}
else
{
	echo "<script>alert('答案有误！');history.go(-1)</script>";
}
?>
<p>&nbsp; </p>
</body>
</html>
