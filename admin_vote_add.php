<?php include('admin_check.php'); ?>
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
	if(form1.qcontent.value=="")
	{
		alert("���ⲻ��Ϊ�գ�");
		return false;
	}
	
}

</script>
</head>

<body>
<p align="center">���ͶƱ</p>
<?php 
$cnum=$_POST['cnum'];
?>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
<form id="form1" name="form1" method="post" action="admin_vote_add_code.php">
  <tr>
    <td height="25" align="right">���ͣ�</td>
    <td height="25" align="left"><input name="multi" type="radio" id="radio" value="0" checked="checked" />
      ��ѡ
      <input type="radio" name="multi" id="radio2" value="1" />
      ��ѡ</td>
  </tr>
  <tr>
    <td width="70" height="25" align="right">���⣺</td>
    <td width="330" height="25" align="left"><input name="qcontent" type="text" id="qcontent" size="45" /></td>
  </tr>
<?php 
for($i=1;$i<=$cnum;$i++)
{
?> 
  <tr>
    <td height="25" align="right">ѡ��<?php echo $i ?>��</td>
    <td height="25" align="left"><input name="ccontent[]" type="text" id="ccontent[]" size="35" /></td>
  </tr>
<?php 
}
?>  
  <tr>
    <td height="25" colspan="2" align="center"><input type="submit" name="button" id="button" value="�ύ" onclick="return check_form()" /></td>
  </tr>
</form>
</table>
<p>&nbsp; </p>
</body>

</html>
