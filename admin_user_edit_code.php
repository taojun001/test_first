<?php include('admin_check.php'); ?>
<?php 
include('conn.php'); 
session_start();


$userid=$_POST['userid'];
$po=$_POST['po'];


$sql="select * from user where userid=".$userid;//��ѯ��ǰ�ĵ�����˵�Ȩ�޼�
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
$rs=mysql_fetch_array($qr);


$sql1="select count(*) as count from user where po=1";//ͳ��user�����ж��ٸ�����Ա
mysql_query("set names 'gb2312'");
$qr1=mysql_db_query('sxydb',$sql1,$conn);
$rs1=mysql_fetch_array($qr1);


if($rs['po']==1 and $rs1['count']==1 and $po==2)//�����ǰ�ĵ�������ǹ���Ա �� ����Ա������ֻ��1�� �� ǰ�洫������Ҫ�ĵ�Ȩ���Ƿǹ���Ա
{
	echo "<script>alert('����Ψһ�Ĺ���Ա������ݲ��ܸ�Ϊ�ǹ���Ա�������޷������̨��');location.href='admin_user_list.php'</script>";
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

$sql="select * from user where userid=".$userid;
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
$rs=mysql_fetch_array($qr);

if($password!=$rs['password'])
{
	$password=substr(md5($_POST['password']),8,16);
	$sql="update user set password='".$password."',truename='".$truename."',sex='".$sex."',birthday='".$birthday."',qq='".$qq."',email='".$email."',headimage='".$headimage."',introduce='".$introduce."',question1='".$question1."',answer1='".$answer1."',question2='".$question2."',answer2='".$answer2."',po='".$po."' where userid=".$userid;
}
else
{
	$sql="update user set truename='".$truename."',sex='".$sex."',birthday='".$birthday."',qq='".$qq."',email='".$email."',headimage='".$headimage."',introduce='".$introduce."',question1='".$question1."',answer1='".$answer1."',question2='".$question2."',answer2='".$answer2."',po='".$po."' where userid=".$userid;
}

mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);


echo "<script>alert('�޸ĳɹ���');location.href='admin_user_list.php'</script>";
}
?>