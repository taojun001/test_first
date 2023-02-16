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
</style></head>

<body>
<?php 
$username=$_POST['username'];

if($_POST['button']=="检查用户名")
{
	$sql="select * from user where username='".$username."'";
	mysql_query("set names 'gb2312'");
	$qr=mysql_db_query('sxydb',$sql,$conn);
	if($rs=mysql_fetch_array($qr))
	{
		echo "<script>alert('对不起！该用户名已被使用');history.go(-1)</script>";
	}
	else
	{
		echo "<script>alert('恭喜！该用户名可以使用');history.go(-1)</script>";
	}
}
else
{

$sql="select * from user where username='".$username."'";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
if($rs=mysql_fetch_array($qr))
{
	echo "<script>alert('对不起！该用户名已被使用');history.go(-1)</script>";
}
else
{
$password=$_POST['password'];
$truename=$_POST['truename'];
$sex=$_POST['sex'];
$byear=$_POST['byear'];
$bmonth=$_POST['bmonth'];
$bday=$_POST['bday'];
$birthday=$byear."-".$bmonth."-".$bday;
$qq=$_POST['qq'];
$email=$_POST['email'];
$headimage=$_POST['headimage'];
$introduce=$_POST['introduce'];
$question1=$_POST['question1'];
$answer1=$_POST['answer1'];
$question2=$_POST['question2'];
$answer2=$_POST['answer2'];
?>
<p align="center">用户注册信息确认</p>
<table width="650" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
  <form id="form1" name="form1" method="post" action="reg_code.php">
    <tr>
      <td width="196" height="30" align="right" bgcolor="#FFFFFF">用户名：</td>
      <td width="447" height="30" align="left" bgcolor="#FFFFFF"><?php echo $username; ?>
      <input name="username" type="hidden" id="username" value="<?php echo $username; ?>" /></td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">密码：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><?php echo $password; ?>
      <input name="password" type="hidden" id="password" value="<?php echo $password; ?>" />
      </td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">真实姓名：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><?php echo $truename; ?>
      <input name="truename" type="hidden" id="truename" value="<?php echo $truename; ?>" />
      </td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">性别：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><?php echo $sex; ?>
      <input name="sex" type="hidden" id="sex" value="<?php echo $sex; ?>" />
      </td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">出生日期：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><?php echo $birthday; ?>
      <input name="birthday" type="hidden" id="birthday" value="<?php echo $birthday; ?>" />
      </td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">QQ：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><?php echo $qq; ?>
      <input name="qq" type="hidden" id="qq" value="<?php echo $qq; ?>" />
      </td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">E-mail：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><?php echo $email; ?>
      <input name="email" type="hidden" id="email" value="<?php echo $email; ?>" />
      </td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">头像：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><img src="<?php echo $headimage; ?>" />
      <input name="headimage" type="hidden" id="headimage" value="<?php echo $headimage; ?>" />
      </td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">自我简介：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><?php echo $introduce; ?>
      <input name="introduce" type="hidden" id="introduce" value="<?php echo $introduce; ?>" />
      </td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">密码提示问题1：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><?php echo $question1; ?>
      <input name="question1" type="hidden" id="question1" value="<?php echo $question1; ?>" />
      </td>
    </tr>
    <tr>
      <td height="30" align="right" bgcolor="#FFFFFF">密码提示问题1答案：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><?php echo $answer1; ?>
      <input name="answer1" type="hidden" id="answer1" value="<?php echo $answer1; ?>" />
      </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">密码提示问题2：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><?php echo $question2; ?>
      <input name="question2" type="hidden" id="question2" value="<?php echo $question2; ?>" />
      </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">密码提示问题2答案：</td>
      <td height="30" align="left" bgcolor="#FFFFFF"><?php echo $answer2; ?>
      <input name="answer2" type="hidden" id="answer2" value="<?php echo $answer2; ?>" />
      </td>
    </tr>
    <tr>
      <td height="30" colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="提交" onclick="return check_form()" />
        &nbsp;
        <input type="button" name="button2" id="button2" value="返回" onclick="history.go(-1)" /></td>
    </tr>
  </form>
</table>
<?php 
}
}
?>
</body>
</html>
