<?php 
include('conn.php'); 
session_start();

$username=$_POST['username'];
$password=$_POST['password'];
$truename=$_POST['truename'];
$sex=$_POST['sex'];
$birthday=$_POST['birthday'];
$qq=$_POST['qq'];
$email=$_POST['email'];
$headimage=$_POST['headimage'];
$introduce=$_POST['introduce'];
$question1=$_POST['question1'];
$answer1=$_POST['answer1'];
$question2=$_POST['question2'];
$answer2=$_POST['answer2'];

$sql="select * from user where username='".$username."'";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
$rs=mysql_fetch_array($qr);

if($password!=$rs['password'])
{
	$password=substr(md5($_POST['password']),8,16);
	$sql="update user set password='".$password."',truename='".$truename."',sex='".$sex."',birthday='".$birthday."',qq='".$qq."',email='".$email."',headimage='".$headimage."',introduce='".$introduce."',question1='".$question1."',answer1='".$answer1."',question2='".$question2."',answer2='".$answer2."' where username='".$username."'";
}
else
{
	$sql="update user set truename='".$truename."',sex='".$sex."',birthday='".$birthday."',qq='".$qq."',email='".$email."',headimage='".$headimage."',introduce='".$introduce."',question1='".$question1."',answer1='".$answer1."',question2='".$question2."',answer2='".$answer2."' where username='".$username."'";
}
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

echo "<script>alert('ÐÞ¸Ä³É¹¦£¡');location.href='index.php'</script>";

?>