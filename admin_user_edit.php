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
	if(form1.password.value.length<5 || form1.password.value.length>20)
	{
		alert("���������5-20λ֮�䣡");
		return false;
	}
	
	if(form1.password.value!=form1.password1.value)
	{
		alert("������������벻һ�£�");
		return false;
	}
	
	if(form1.truename.value=="")
	{
		alert("��ʵ��������Ϊ�գ�");
		return false;
	}
	
	if(form1.byear.value%4==0 && form1.byear.value%100!=0 || form1.byear.value%400==0)
	{
		if(form1.bmonth.value==2 && (form1.bday.value==30 || form1.bday.value==31))
		{
			alert("����Ϊ���꣬2�·�û��30��31�գ�");
			return false;
		}
	}
	else
	{
		if(form1.bmonth.value==2 && (form1.bday.value==29 ||form1.bday.value==30 || form1.bday.value==31))
		{
			alert("����Ϊƽ�꣬2�·�û��29��30��31�գ�");
			return false;
		}
	}
	
	if((form1.bmonth.value==4 || form1.bmonth.value==6 || form1.bmonth.value==9 || form1.bmonth.value==11) && form1.bday.value==31)
	{
		alert("��ѡ����·���û��31�ţ�");
		return false;	
	}
	
	if(form1.qq.value=="")
	{
		alert("QQ�Ų���Ϊ�գ�");
		return false;
	}
	
	if(isNaN(form1.qq.value))
	{
		alert("QQ�ű���Ϊ�����֣�");
		return false;
	}
	
	if(form1.email.value.indexOf("@")==-1)
	{
		alert("E-mail�ĸ�ʽ����ȷ��");
		return false;
	}
		
	if(form1.introduce.value=="")
	{
		alert("���Ҽ�鲻��Ϊ�գ�");
		return false;
	}
	
	if(form1.question1.value==form1.question2.value)
	{
		alert("����������ʾ���ⲻ����ͬ��");
		return false;
	}
	
	if(form1.answer1.value=="")
	{
		alert("��1����Ϊ�գ�");
		return false;
	}
	
	if(form1.answer2.value=="")
	{
		alert("��2����Ϊ�գ�");
		return false;
	}
}
</script>
</head>

<body>
<?php 
$userid=$_GET['userid'];

$sql="select * from user where userid=".$userid;
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
$rs=mysql_fetch_array($qr);
?>
<p align="center">�û���Ϣ�޸�</p>
<table width="650" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
<form id="form1" name="form1" method="post" action="admin_user_edit_code.php">
  <tr>
    <td width="196" height="30" align="right" bgcolor="#FFFFFF">�û�����</td>
    <td width="447" height="30" align="left" bgcolor="#FFFFFF"><?php echo $rs['username'] ?>
      <input name="userid" type="hidden" id="userid" value="<?php echo $userid ?>" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">���룺</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input name="password" type="password" id="password" value="<?php echo $rs['password'] ?>" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">ȷ�����룺</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="password" name="password1" id="password1" value="<?php echo $rs['password'] ?>"/></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">��ʵ������</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="text" name="truename" id="truename" value="<?php echo $rs['truename'] ?>" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">�Ա�</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input name="sex" type="radio" id="radio" value="��" <?php if ($rs['sex']=="��") {?>checked="checked"<?php }?> />
      ��
      <input type="radio" name="sex" id="radio2" value="Ů" <?php if ($rs['sex']=="Ů") {?>checked="checked"<?php }?>/>
      Ů</td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">�������ڣ�</td>
    <td height="30" align="left" bgcolor="#FFFFFF">
    <select name="byear" id="byear">
    <?php 
	for($i=1930;$i<=date("Y");$i++)
	{
	?>
      <option value="<?php echo $i; ?>" <?php if (substr($rs['birthday'],0,4)==$i) {?>selected="selected"<?php }?>><?php echo $i; ?></option>
    <?php 
	}
	?>
    </select>
    ��
    <select name="bmonth" id="bmonth">
    <?php 
	for($j=1;$j<=12;$j++)
	{
	?>
      <option value="<?php echo $j; ?>" <?php if (substr($rs['birthday'],5,2)==$j) {?>selected="selected"<?php }?>><?php echo $j; ?></option>
    <?php 
	}
	?>
    </select>
    ��
    <select name="bday" id="bday">
    <?php 
	for($k=1;$k<=31;$k++)
	{
	?>
      <option value="<?php echo $k; ?>" <?php if (substr($rs['birthday'],8,2)==$k) {?>selected="selected"<?php }?>><?php echo $k; ?></option>
    <?php 
	}
	?>
        </select>
    ��</td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">QQ��</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="text" name="qq" id="qq" value="<?php echo $rs['qq'] ?>" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">E-mail��</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="text" name="email" id="email" value="<?php echo $rs['email'] ?>" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">ͷ��</td>
    <td height="30" align="left" bgcolor="#FFFFFF">
    <?php for($h=1;$h<=30;$h++) {?>
    <input type="radio" name="headimage" id="radio3" value="images/headimage/<?php echo $h; ?>.jpg" <?php if ($rs['headimage']=="images/headimage/".$h.".jpg") {?>checked="checked"<?php }?> />
    <img src="images/headimage/<?php echo $h; ?>.jpg" width="40" height="40" vspace="2" align="absmiddle" />
    <?php }?>    </td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">���Ҽ�飺</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><textarea name="introduce" id="introduce" cols="45" rows="5"><?php echo $rs['introduce'] ?></textarea></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">������ʾ����1��</td>
    <td height="30" align="left" bgcolor="#FFFFFF">
    <select name="question1" id="question1">
      <option value="��ְֵ������ǣ�" <?php if ($rs['question1']=="��ְֵ������ǣ�") {?>selected="selected"<?php }?>>��ְֵ������ǣ�</option>
      <option value="������������ǣ�" <?php if ($rs['question1']=="������������ǣ�") {?>selected="selected"<?php }?>>������������ǣ�</option>
      <option value="��ϲ����ʳ���ǣ�" <?php if ($rs['question1']=="��ϲ����ʳ���ǣ�") {?>selected="selected"<?php }?>>��ϲ����ʳ���ǣ�</option>
      <option value="��ϲ���������ǣ�" <?php if ($rs['question1']=="��ϲ���������ǣ�") {?>selected="selected"<?php }?>>��ϲ���������ǣ�</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">������ʾ����1�𰸣�</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="text" name="answer1" id="answer1" value="<?php echo $rs['answer1'] ?>" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">������ʾ����2��</td>
    <td height="30" align="left" bgcolor="#FFFFFF">
    <select name="question2" id="question2">
      <option value="��ְֵ������ǣ�" <?php if ($rs['question2']=="��ְֵ������ǣ�") {?>selected="selected"<?php }?>>��ְֵ������ǣ�</option>
      <option value="������������ǣ�" <?php if ($rs['question2']=="������������ǣ�") {?>selected="selected"<?php }?>>������������ǣ�</option>
      <option value="��ϲ����ʳ���ǣ�" <?php if ($rs['question2']=="��ϲ����ʳ���ǣ�") {?>selected="selected"<?php }?>>��ϲ����ʳ���ǣ�</option>
      <option value="��ϲ���������ǣ�" <?php if ($rs['question2']=="��ϲ���������ǣ�") {?>selected="selected"<?php }?>>��ϲ���������ǣ�</option>
    </select></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">������ʾ����2�𰸣�</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="text" name="answer2" id="answer2" value="<?php echo $rs['answer2'] ?>" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">��ݣ�</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><select name="po" id="po">
      <option value="1" <?php if ($rs['po']==1) {?>selected="selected"<?php }?>>����Ա</option>
      <option value="2" <?php if ($rs['po']==2) {?>selected="selected"<?php }?>>��Ա</option>
    </select>
    </td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="�ύ" onclick="return check_form()" />
    &nbsp;
    <input type="reset" name="button2" id="button2" value="����" /></td>
  </tr>
</form>
</table>
<p>&nbsp; </p>
</body>
</html>
