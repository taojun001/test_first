<?php include('admin_check.php'); ?>
<?php include('conn.php'); ?>
<?php session_start(); ?>
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
</style>
<script>
function check_form()
{
	if(form1.title.value=="")
	{
		alert("新闻标题不能为空！");
		return false;
	}
	
	if(form1.content.value=="")
	{
		alert("新闻内容不能为空！");
		return false;
	}
}
</script>
<script charset="utf-8" src="editor/kindeditor-all.js"></script>
<script charset="utf-8" src="editor/lang/zh-CN.js"></script>

<script type="text/javascript">
KindEditor.ready(function(K)
{

        window.editor = K.create('textarea', { 
        cssPath : 'editor/plugins/code/prettify.css', 
        uploadJson: 'editor/php/upload_json.php',
		fileManagerJson: 'editor/php/file_manager_json.php',
        allowFileManager : true,    
        afterCreate : function() { 
         this.sync(); 
        }, 
        afterBlur:function(){ 
            this.sync(); 
        }                 
    }); 

});
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>

<body>
<?php 
$newsid=$_GET['newsid'];

$sql="select * from news where newsid=".$newsid;
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
$rs=mysql_fetch_array($qr);
?>
<p align="center">新闻修改</p>
<table width="800" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#6699CC">
<form id="form1" name="form1" method="post" action="admin_news_edit_code.php">
  <tr>
    <td width="107" height="35" align="right" bgcolor="#FFFFFF">所属类别：</td>
    <td width="686" height="35" align="left" bgcolor="#FFFFFF">
    <select name="newscategoryid" id="newscategoryid">
    <?php 
	$sqlc="select * from newscategory";
	mysql_query("set names 'gb2312'");
	$qrc=mysql_db_query('sxydb',$sqlc,$conn);
	
	while($rsc=mysql_fetch_array($qrc))
	{
	?>
      <option value="<?php echo $rsc['newscategoryid'] ?>" <?php if ($rsc['newscategoryid']==$rs['newscategoryid']) {?>selected="selected"<?php }?>><?php echo $rsc['newscategory'] ?></option>
    <?php 
	}
	?> 
    </select>
    <input name="newsid" type="hidden" id="newsid" value="<?php echo $newsid; ?>" />    </td>
  </tr>
  <tr>
    <td height="35" align="right" bgcolor="#FFFFFF">新闻标题：</td>
    <td height="35" align="left" bgcolor="#FFFFFF"><input name="title" type="text" id="title" value="<?php echo $rs['title']?>" /></td>
  </tr>
  <tr>
    <td height="35" align="right" bgcolor="#FFFFFF">新闻内容：</td>
    <td height="35" align="left" bgcolor="#FFFFFF"><textarea name="content" id="content" cols="92" rows="20"><?php echo $rs['content']?></textarea></td>
  </tr>
  <tr>
    <td height="35" colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="提交" onclick="return check_form()" />
    &nbsp;
    <input type="reset" name="button2" id="button2" value="重置" /></td>
  </tr>
</form>
</table>
<p>&nbsp; </p>
</body>
</html>
