<?php include('admin_check.php'); ?>
<?php include('conn.php'); ?>
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
<p align="center">�޸�ͶƱ</p>
<?php 
$qid=$_GET['qid'];

$sql="select * from question where qid=".$qid;
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
$rs=mysql_fetch_array($qr);
?>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
<form id="form1" name="form1" method="post" action="admin_vote_edit_code.php">
  <tr>
    <td height="25" align="right">���ͣ�</td>
    <td height="25" align="left"><input type="radio" name="multi" id="radio" value="0" <?php if ($rs['multi']==0) {?>checked="checked"<?php }?> />
      ��ѡ
      <input type="radio" name="multi" id="radio2" value="1" <?php if ($rs['multi']==1) {?>checked="checked"<?php }?>/>
      ��ѡ</td>
  </tr>
  <tr>
    <td width="70" height="25" align="right">���⣺</td>
    <td width="330" height="25" align="left"><input name="qcontent" type="text" id="qcontent" size="45" value="<?php echo $rs['qcontent'] ?>" />
      <input type="hidden" name="qid" id="qid" value="<?php echo $qid ?>" /></td>
  </tr>
<?php 
		$sqlcn="select count(*) from choice where qid=".$qid;
		mysql_query("set names 'gb2312'");
		$qrcn=mysql_db_query('sxydb',$sqlcn,$conn);
		$rscn=mysql_fetch_array($qrcn);
		
		$num=$rscn[0];
	  	  
	    $sqlc="select * from choice where qid=".$qid." order by cid";
		mysql_query("set names 'gb2312'");
		$qrc=mysql_db_query('sxydb',$sqlc,$conn);
		
		$i=1;
		while($rsc=mysql_fetch_array($qrc) and $i<=$num)
		{
?> 
  <tr>
    <td height="25" align="right">ѡ��<?php echo $i ?>��</td>
    <td height="25" align="left"><input name="ccontent[]" type="text" id="ccontent[]" size="35" value="<?php echo $rsc['ccontent'] ?>" />
      <input type="hidden" name="cid[]" id="cid[]" value="<?php echo $rsc['cid'] ?>" /></td>
  </tr>
<?php
$i++; 
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
