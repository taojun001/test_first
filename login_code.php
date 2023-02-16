<?php
include('conn.php'); 
session_start();

$username=$_POST['username'];
$password=substr(md5($_POST['password']),8,16);
$vc=$_POST['vc'];

$sql="select * from user where username='".$username."' and password='".$password."'";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);

if($_SESSION['svc']==$vc)
{
	if($rs=mysql_fetch_array($qr))
	{
		$_SESSION['susername']=$username;
		$_SESSION['spo']=$rs['po'];
		echo "<script>alert('登录成功！');location.href='index.php'</script>";
	}
	else
	{
		echo "<script>alert('用户名或密码错！');location.href='index.php'</script>";
	}
}
else
{
	echo "<script>alert('验证码错！');location.href='index.php'</script>";
}
?>