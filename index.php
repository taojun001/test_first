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
-->
</style>
<script>
function check_form()
{
	if(form1.username.value.length<5 || form1.username.value.length>20)
	{
		alert("�û���������5-20λ֮�䣡");
		return false;
	}
	
	if(form1.password.value.length<5 || form1.password.value.length>20)
	{
		alert("���������5-20λ֮�䣡");
		return false;
	}
	
	if(form1.vc.value.length!=4)
	{
		alert("��֤�����Ϊ4λ��");
		return false;
	}
}

function check_forms()
{
	if(form2.keywords.value=="")
	{
		alert("�����ؼ��ֲ���Ϊ�գ�");
		return false;
	}
}

/*
���ϣ���ڱ�ҳ�ж϶�ѡ�Ƿ�Ϊ�գ�����ʹ�������JS��ʽ�������Ϳ��Ա��⵽��һ��ҳ������ж���
function check_multi()
{
	var c_id=document.getElementsByName("cid[]");
	var id="";
	for(i=0;i<c_id.length;i++)
	{
		if(c_id[i].checked)
		{
			id=1;
		}
	}
	if(id=="")
	{
		alert("��ѡͶƱ������ѡ��һ�");
		return false;
	}
}
*/
</script>
</head>

<body>
<table width="200" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#6699FF">
  <tr>
    <td height="25" align="center">�û���¼</td>
  </tr>
  <tr>
    <td height="150" align="center" bgcolor="#FFFFFF">
    <?php 
	if($_SESSION['susername']!="")
	{
	?>
    ��ӭ<?php echo $_SESSION['susername']; ?>!<br /><br />
	<a href="login_out.php">ע��</a>&nbsp;<a href="user_edit.php">�����޸�</a><?php if($_SESSION['spo']==1) {?>&nbsp;<a href="admin.php">�������</a><?php }?>
    <?php 
	}
	else
	{
	?>
    <table width="200" border="0" cellspacing="0" cellpadding="0">
    <form id="form1" name="form1" method="post" action="login_code.php">
      <tr>
        <td width="74" height="30" align="right">�û�����</td>
        <td width="126" height="30" align="left"><input name="username" type="text" id="username" size="12" /></td>
      </tr>
      <tr>
        <td height="30" align="right">���룺</td>
        <td height="30" align="left"><input name="password" type="password" id="password" size="12" /></td>
      </tr>
      <tr>
        <td height="30" align="right">��֤�룺</td>
        <td height="30" align="left"><input name="vc" type="text" id="vc" size="4" />
		<img src="vc.php" align="absbottom" onclick="this.src=this.src+'?time='+Math.random()" style="cursor:pointer" /></td>
      </tr>
      <tr>
        <td height="30" colspan="2" align="center"><a href="reg.php">ע��</a>&nbsp;<a href="get_password.php">��������</a>
          <input type="submit" name="button" id="button" value="�ύ" onclick="return check_form()"/></td>
        </tr>
    </form>
    </table>
    <?php 
	}
	?>
    
    </td>
  </tr>
</table>
<p>&nbsp;</p>


<?php 
$sqlc="select * from newscategory where hidden=0";
mysql_query("set names 'gb2312'");
$qrc=mysql_db_query('sxydb',$sqlc,$conn);

while($rsc=mysql_fetch_array($qrc))
{
 ?>     
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#6699FF">
  <tr>
    <td height="25"><?php echo $rsc['newscategory'] ?></td>
    <td align="right"><a href="news_list.php?newscategoryid=<?php echo $rsc['newscategoryid'] ?>">more...</a></td>
  </tr>
  <tr>
    <td height="150" colspan="2" align="center" bgcolor="#FFFFFF">
    <table width="90%" border="0" cellspacing="0" cellpadding="0">
<?php 
$sql="select * from news where newscategoryid=".$rsc['newscategoryid']." order by pubtime desc limit 5";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);

while($rs=mysql_fetch_array($qr))
{
 ?>     
      <tr>
        <td height="25" align="left"><a href="news_show.php?newsid=<?php echo $rs['newsid'] ?>"><?php echo $rs['title'] ?></a></td>
        <td height="25" align="right"><?php echo date('Y-m-d',strtotime($rs['pubtime'])) ?></td>
      </tr>
<?php 
}
?>      
    </table></td>
  </tr>
</table><br />
<?php 
}
?> 
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
<form id="form2" name="form2" method="post" action="news_list.php">
  <tr>
    <td align="center">��������������
      <select name="condition" id="condition">
        <option value="title">����</option>
        <option value="author">����</option>
        <option value="content">����</option>
      </select>
     &nbsp;�ؼ���
    <input type="text" name="keywords" id="keywords" placeholder="�����������ؼ���" />
    <input type="submit" name="button2" id="button2" value="����" onclick="return check_forms()" /></td>
  </tr>
</form>
</table>


<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="250" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#6699FF">
  <tr>
    <td height="30" align="center">���ߵ���</td>
  </tr>
  <tr>
    <td height="150" bgcolor="#FFFFFF">
    
    
<?php 
$sql="select * from question where hidden=0";
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);

while($rs=mysql_fetch_array($qr))
{
?>    
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
     <form id="form3" name="form3" method="post" action="vote_add_code.php">
      <tr>
        <td height="25">���⣺<?php echo $rs['qcontent'] ?></td>
      </tr>
      <?php 
		$sqlcn="select count(*) from choice where qid=".$rs['qid'];
		mysql_query("set names 'gb2312'");
		$qrcn=mysql_db_query('sxydb',$sqlcn,$conn);
		$rscn=mysql_fetch_array($qrcn);
		
		$num=$rscn[0];
	  	  
	    $sqlc="select * from choice where qid=".$rs['qid']." order by cid";
		mysql_query("set names 'gb2312'");
		$qrc=mysql_db_query('sxydb',$sqlc,$conn);
		
		$i=1;
		while($rsc=mysql_fetch_array($qrc) and $i<=$num)
		{
		
		/* 
		��ʵ������Ĵ����е���࣬û��Ҫͳ����ѡ������Ϊ�������ġ���������Ĵ���Ϳ����ˡ�
		$sqlc="select * from choice where qid=".$rs['qid']." order by cid";
		mysql_query("set names 'gb2312'");
		$qrc=mysql_db_query('sxydb',$sqlc,$conn);
		
		$i=1;
		while($rsc=mysql_fetch_array($qrc))
		{

		 */
	  ?>
      <tr>
        <td height="25">
        <?php if ($rs['multi']==0)  {?>
        <input type="radio" name="cid" id="radio" value="<?php echo $rsc['cid'] ?>" <?php if ($i==1) {?>checked="checked"<?php }?> />
        <?php } else { ?>
        <input type="checkbox" name="cid[]" id="cid[]" value="<?php echo $rsc['cid'] ?>" />
        <?php }?>
        <?php echo $i; ?>.<?php echo $rsc['ccontent'] ?></td>
      </tr>
	  <?php 
	  	$i++;
        }
      ?>       
      <tr>
        <td height="25" align="center"><input type="submit" name="button3" id="button3" value="ͶƱ" <?php if($rs['multi']==1) {?>onclick="return check_multi()"<?php }?> /><!--���ʹ����JS���ж϶�ѡ�Ƿ�Ϊ�գ���ô����Ҫ������������if���-->
          &nbsp;
          <input type="button" name="button4" id="button4" value="�鿴���" onclick="javascript:window.open('vote_result.php?qid=<?php echo $rs['qid'] ?>','','width=600,height=300')" /></td>
      </tr>
    </form>
    </table>
    <?php 
}
?>    
    
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
