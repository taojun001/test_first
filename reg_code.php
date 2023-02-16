<?php 
include('conn.php');

$username=$_POST['username'];
$password=substr(md5($_POST['password']),8,16);
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

$sql="insert into user(username,password,truename,sex,birthday,qq,email,headimage,introduce,question1,answer1,question2,answer2) values('".$username."','".$password."','".$truename."','".$sex."','".$birthday."','".$qq."','".$email."','".$headimage."','".$introduce."','".$question1."','".$answer1."','".$question2."','".$answer2."')";
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);
echo "<script>alert('×¢²á³É¹¦£¡');location.href='index.php'</script>";
?>