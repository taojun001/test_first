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
</style>
<script>
function check_form()
{
	if(form1.newscategory.value=="")
	{
		alert("类别名称不能为空！");
		return false;
	}
}
</script>

</head>

<body>
<p align="center">添加新闻类别</p>
<table width="300" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#6699CC">
<form id="form1" name="form1" method="post" action="admin_newscategory_add_code.php">
  <tr>
    <td width="95" height="35" align="right" bgcolor="#FFFFFF">类别名称：</td>
    <td width="198" height="35" align="left" bgcolor="#FFFFFF"><input type="text" name="newscategory" id="newscategory" /></td>
  </tr>
  <tr>
    <td height="35" colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="提交" onclick="return check_form()" />
    &nbsp;
    <input type="reset" name="button2" id="button2" value="重置" /></td>
  </tr>
</form>
</table>
<p>&nbsp; </p>
</body>
</html>
