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
function check_username()
{
	if(form1.username.value.length<5 || form1.username.value.length>20)
	{
		alert("�û���������5-20λ֮�䣡");
		return false;
	}
}
</script>
</head>

<body>
<p align="center">ȡ������</p>
<table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
<form id="form1" name="form1" method="post" action="get_password_question.php">
  <tr>
    <td height="30" align="center">�������û�����
    <input type="text" name="username" id="username" />
    <input type="submit" name="button" id="button" value="��һ��" onclick="return check_username()" /></td>
  </tr>
</form>
</table>
<p>&nbsp; </p>
</body>
</html>
