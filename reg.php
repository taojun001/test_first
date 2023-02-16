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
function check_username()
{
	if(form1.username.value.length<5 || form1.username.value.length>20)
	{
		alert("用户名必须在5-20位之间！");
		return false;
	}
}

function check_form()
{
	if(form1.username.value.length<5 || form1.username.value.length>20)
	{
		alert("用户名必须在5-20位之间！");
		return false;
	}
	
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
	
	if(form1.truename.value=="")
	{
		alert("真实姓名不能为空！");
		return false;
	}
	
	if(form1.byear.value%4==0 && form1.byear.value%100!=0 || form1.byear.value%400==0)
	{
		if(form1.bmonth.value==2 && (form1.bday.value==30 || form1.bday.value==31))
		{
			alert("该年为闰年，2月份没有30、31日！");
			return false;
		}
	}
	else
	{
		if(form1.bmonth.value==2 && (form1.bday.value==29 ||form1.bday.value==30 || form1.bday.value==31))
		{
			alert("该年为平年，2月份没有29、30、31日！");
			return false;
		}
	}
	
	if((form1.bmonth.value==4 || form1.bmonth.value==6 || form1.bmonth.value==9 || form1.bmonth.value==11) && form1.bday.value==31)
	{
		alert("您选择的月份中没有31号！");
		return false;	
	}
	
	if(form1.qq.value=="")
	{
		alert("QQ号不能为空！");
		return false;
	}
	
	if(isNaN(form1.qq.value))
	{
		alert("QQ号必须为纯数字！");
		return false;
	}
	
	if(form1.email.value.indexOf("@")==-1)
	{
		alert("E-mail的格式不正确！");
		return false;
	}
		
	if(form1.introduce.value=="")
	{
		alert("自我简介不能为空！");
		return false;
	}
	
	if(form1.question1.value==form1.question2.value)
	{
		alert("两个密码提示问题不能相同！");
		return false;
	}
	
	if(form1.answer1.value=="")
	{
		alert("答案1不能为空！");
		return false;
	}
	
	if(form1.answer2.value=="")
	{
		alert("答案2不能为空！");
		return false;
	}
	
	if(form1.agreement.checked==false)
	{
		alert("您不同意本网站协议就不能注册！");
		return false;
	}
}
</script>
</head>

<body>
<p align="center">新用户注册</p>
<table width="650" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
<form id="form1" name="form1" method="post" action="reg_show.php">
  <tr>
    <td width="196" height="30" align="right" bgcolor="#FFFFFF">用户名：</td>
    <td width="447" height="30" align="left" bgcolor="#FFFFFF"><input type="text" name="username" id="username" />
      <input type="submit" name="button" id="button" value="检查用户名" onclick="return check_username()" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">密码：</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="password" name="password" id="password" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">确认密码：</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="password" name="password1" id="password1" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">真实姓名：</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="text" name="truename" id="truename" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">性别：</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input name="sex" type="radio" id="radio" value="男" checked="checked" />
      男
      <input type="radio" name="sex" id="radio2" value="女" />
      女</td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">出生日期：</td>
    <td height="30" align="left" bgcolor="#FFFFFF">
    <select name="byear" id="byear">
    <?php 
	for($i=1930;$i<=date("Y");$i++)
	{
	?>
      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php 
	}
	?>
    </select>
    年
    <select name="bmonth" id="bmonth">
    <?php 
	for($j=1;$j<=12;$j++)
	{
	?>
      <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
    <?php 
	}
	?>
    </select>
    月
    <select name="bday" id="bday">
    <?php 
	for($k=1;$k<=31;$k++)
	{
	?>
      <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
    <?php 
	}
	?>
        </select>
    日</td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">QQ：</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="text" name="qq" id="qq" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">E-mail：</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">头像：</td>
    <td height="30" align="left" bgcolor="#FFFFFF">
    <?php for($h=1;$h<=30;$h++) {?>
    <input type="radio" name="headimage" id="radio3" value="images/headimage/<?php echo $h; ?>.jpg" <?php if ($h==1) {?>checked="checked"<?php }?> />
    <img src="images/headimage/<?php echo $h; ?>.jpg" width="40" height="40" vspace="2" align="absmiddle" />
    <?php }?>    </td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">自我简介：</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><textarea name="introduce" id="introduce" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">密码提示问题1：</td>
    <td height="30" align="left" bgcolor="#FFFFFF">
    <select name="question1" id="question1">
      <option value="你爸爸的名字是？">你爸爸的名字是？</option>
      <option value="你妈妈的名字是？">你妈妈的名字是？</option>
      <option value="你喜欢的食物是？">你喜欢的食物是？</option>
      <option value="你喜欢的饮料是？">你喜欢的饮料是？</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF">密码提示问题1答案：</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="text" name="answer1" id="answer1" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">密码提示问题2：</td>
    <td height="30" align="left" bgcolor="#FFFFFF">
    <select name="question2" id="question2">
      <option value="你爸爸的名字是？">你爸爸的名字是？</option>
      <option value="你妈妈的名字是？">你妈妈的名字是？</option>
      <option value="你喜欢的食物是？">你喜欢的食物是？</option>
      <option value="你喜欢的饮料是？">你喜欢的饮料是？</option>
    </select></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">密码提示问题2答案：</td>
    <td height="30" align="left" bgcolor="#FFFFFF"><input type="text" name="answer2" id="answer2" /></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#FFFFFF"><input type="checkbox" name="agreement" id="agreement" />
      已阅读并同意 <a href="agreement.php" target="_blank">香芋网用户协议</a></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="提交" onclick="return check_form()" />
    &nbsp;
    <input type="reset" name="button2" id="button2" value="重置" /></td>
  </tr>
</form>
</table>
<p>&nbsp; </p>
</body>
</html>
