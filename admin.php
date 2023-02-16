<?php include('admin_check.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<style type="text/css">
<!--
body {
	background-color: #6699CC;
}
body,td,th {
	font-size: 12px;
}
-->
</style></head>

<body>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20%" height="800" align="center" valign="top"><table width="95%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td height="30" align="center" bgcolor="#CCDDEE">后台管理系统</td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_user_list.php" target="admin_content">用户管理</a></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_news_add.php" target="admin_content">添加新闻</a></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_news_list.php" target="admin_content">新闻管理</a></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_newscategory_add.php" target="admin_content">添加新闻类别</a></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_newscategory_list.php" target="admin_content">新闻类别管理</a></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_vote_list.php" target="admin_content">投票管理</a></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><a href="admin_vote_add_select.php" target="admin_content">添加投票</a></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#FFFFFF"><a href="login_out.php">退出后台</a></td>
      </tr>
    </table></td>
    <td width="80%" height="800"><iframe src="admin_welcome.php" width="100%" height="100%" name="admin_content" frameborder="0" /></td>
  </tr>
</table>
</body>
</html>
