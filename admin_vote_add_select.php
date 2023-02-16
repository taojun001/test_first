<?php include('admin_check.php'); ?>
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
body {
	background-color: #FFFFFF;
}
-->
</style></head>

<body>
<p align="center">添加投票</p>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
<form id="form1" name="form1" method="post" action="admin_vote_add.php">
  <tr>
    <td height="20" align="center">选择选项数：
      <select name="cnum" id="cnum">
      <?php 
	  for($i=1;$i<=10;$i++)
	  {
	  ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php 
		}
		?>
      </select>
    <input type="submit" name="button" id="button" value="提交" /></td>
  </tr>
</form>
</table>
<p>&nbsp; </p>
</body>
</html>
