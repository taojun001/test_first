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
$newsid=$_GET['newsid'];

$sql="update news set hits=hits+1 where newsid=".$newsid;
mysql_query("set names 'gb2312'");
mysql_db_query('sxydb',$sql,$conn);

$sql="select * from news where newsid=".$newsid;
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
$rs=mysql_fetch_array($qr);
?>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" align="center" style="font-size:16px; font-weight:bold"><?php echo $rs['title'] ?></td>
  </tr>
  <tr>
    <td height="35" align="center" style="border-bottom:1px #CCCCCC dashed">发表时间：<?php echo $rs['pubtime'] ?>&nbsp;&nbsp;发表人：<?php echo $rs['author'] ?>&nbsp;&nbsp;浏览次数：<?php echo $rs['hits'] ?></td>
  </tr>
  <tr>
    <td height="500" align="left" valign="top" style="padding-top:10px;"><?php echo $rs['content'] ?></td>
  </tr>
</table>
</body>
</html>
