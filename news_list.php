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
$newscategoryid=$_GET['newscategoryid'];

if($newscategoryid!="")
{
$sqlc="select * from newscategory where newscategoryid=".$newscategoryid;
mysql_query("set names 'gb2312'");
$qrc=mysql_db_query('sxydb',$sqlc,$conn);
$rsc=mysql_fetch_array($qrc);
}
?>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#6699FF">
  <tr>
    <td height="25"><?php if($newscategoryid!="") { echo $rsc['newscategory']; } else { ?>搜索结果如下：<?php }?></td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td height="150" colspan="2" align="center" bgcolor="#FFFFFF"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<?php 
if($newscategoryid!="")
{
	$sqlcp="select count(*) from news where newscategoryid=".$newscategoryid;
	mysql_query("set names 'gb2312'");
	$qrcp=mysql_db_query('sxydb',$sqlcp,$conn);
	$rscp=mysql_fetch_array($qrcp);
	
	$num=$rscp[0];
	$pages=ceil($num/5);
	
	if($_GET['currentpage']=="")
	{
		$currentpage=1;
	}
	else
	{
		$currentpage=$_GET['currentpage'];
	}
	
	$sql="select * from news where newscategoryid=".$newscategoryid." order by pubtime desc limit ".(($currentpage-1)*5).",5";
}
else
{
	$condition=$_REQUEST['condition'];
	$keywords=$_REQUEST['keywords'];

	$sqlcp="select count(*) from news,newscategory where ".$condition." like '%".$keywords."%' and news.newscategoryid=newscategory.newscategoryid and hidden=0";
	mysql_query("set names 'gb2312'");
	$qrcp=mysql_db_query('sxydb',$sqlcp,$conn);
	$rscp=mysql_fetch_array($qrcp);
	
	$num=$rscp[0];
	$pages=ceil($num/5);
	
	if($_GET['currentpage']=="")
	{
		$currentpage=1;
	}
	else
	{
		$currentpage=$_GET['currentpage'];
	}

	$sql="select * from news,newscategory where ".$condition." like '%".$keywords."%' and news.newscategoryid=newscategory.newscategoryid and hidden=0 order by pubtime desc limit ".(($currentpage-1)*5).",5";

}

mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);

if($num==0)
{
?>
       <tr>
        <td height="25" colspan="2" align="center" style="color:#FF0000">未找到符合条件的记录！</td>
       </tr>
<?php
}
else
{
	while($rs=mysql_fetch_array($qr))
	{
	?>
		  <tr>
			<td height="25" align="left"><a href="news_show.php?newsid=<?php echo $rs['newsid'] ?>"><?php echo $rs['title'] ?></a></td>
			<td height="25" align="right"><?php echo date('Y-m-d',strtotime($rs['pubtime'])) ?></td>
		  </tr>
	<?php 
	}
}
?>
    </table></td>
  </tr>
</table>
<?php 
if($num!=0)
{
?>
<p align="center">共<?php echo $num; ?>条记录&nbsp;当前是第<?php echo $currentpage; ?>页/共<?php echo $pages; ?>页

<?php 
if($currentpage!=1)
{
?>
<a href="?currentpage=1&newscategoryid=<?php echo $newscategoryid ?>&condition=<?php echo $condition ?>&keywords=<?php echo $keywords ?>">第一页</a>
<a href="?currentpage=<?php echo $currentpage-1 ?>&newscategoryid=<?php echo $newscategoryid ?>&condition=<?php echo $condition ?>&keywords=<?php echo $keywords ?>">上一页</a>
<?php 
}
?>

<?php 
if($currentpage!=$pages)
{
?>
<a href="?currentpage=<?php echo $currentpage+1 ?>&newscategoryid=<?php echo $newscategoryid ?>&condition=<?php echo $condition ?>&keywords=<?php echo $keywords ?>">下一页</a>
<a href="?currentpage=<?php echo $pages ?>&newscategoryid=<?php echo $newscategoryid ?>&condition=<?php echo $condition ?>&keywords=<?php echo $keywords ?>">最后一页</a>
<?php 
}
?>&nbsp;
看第
<?php 
for($i=1;$i<=$pages;$i++)
{
	if($currentpage==$i)
	{
		echo $i;
	}
	else
	{
?>
    	<a href="?currentpage=<?php echo $i ?>&newscategoryid=<?php echo $newscategoryid ?>&condition=<?php echo $condition ?>&keywords=<?php echo $keywords ?>"><?php echo $i; ?></a>
<?php 
	}
}
?>
页
</p>
<?php 
}
?>
</body>
</html>
