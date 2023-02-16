<?php include('admin_check.php'); ?>
<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
body,td,th {
	font-size: 12px;
}
-->
</style></head>

<body>
<p>&nbsp;</p>
<p align="center">欢迎管理员<?php echo $_SESSION['susername']; ?>!</p>
<p>&nbsp;</p>
</body>
</html>
