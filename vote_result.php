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
-->
</style></head>

<body>
<p align="center">�鿴���</p>
<?php 
$qid=$_GET['qid'];

$sql="select * from question where qid=".$qid;
mysql_query("set names 'gb2312'");
$qr=mysql_db_query('sxydb',$sql,$conn);
$rs=mysql_fetch_array($qr);
?>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FF9900">
  <tr>
    <td height="25">���⣺<?php echo $rs['qcontent'] ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="500" border="0" cellpadding="1" cellspacing="1" bgcolor="#FF9900">
      <tr>
        <td height="20" align="center" bgcolor="#FFFFFF">���</td>
        <td height="20" align="center" bgcolor="#FFFFFF">ѡ��</td>
        <td height="20" align="center" bgcolor="#FFFFFF">Ʊ��</td>
        <td height="20" align="center" bgcolor="#FFFFFF">����</td>
        <td height="20" align="center" bgcolor="#FFFFFF">��״ͼ</td>
      </tr>
<?php 
		$sqlcn="select count(*) from choice where qid=".$rs['qid'];
		mysql_query("set names 'gb2312'");
		$qrcn=mysql_db_query('sxydb',$sqlcn,$conn);
		$rscn=mysql_fetch_array($qrcn);
		
		$num=$rscn[0];
	  	  
	    $sqlc="select * from choice where qid=".$rs['qid'];
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
        <td height="20" align="center" bgcolor="#FFFFFF"><?php echo $i; ?></td>
        <td height="20" align="center" bgcolor="#FFFFFF"><?php echo $rsc['ccontent'] ?></td>
        <td height="20" align="center" bgcolor="#FFFFFF"><?php echo $rsc['amount'] ?></td>
        <td height="20" align="center" bgcolor="#FFFFFF">
        <?php 
		$sqlp="select sum(amount) as total from choice where qid=".$rs['qid'];
		mysql_query("set names 'gb2312'");
		$qrp=mysql_db_query('sxydb',$sqlp,$conn);
		$rsp=mysql_fetch_array($qrp);
		
		if($rsp['total']==0)
		{
			$percent="0.00%";
		}
		else
		{
		$percent=number_format(($rsc['amount']/$rsp['total'])*100,2)."%";
		}
		?>
        <?php echo $percent ?>
        </td>
        <td height="20" align="center" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="15" <?php if ($percent!="0.00%") {?>background="images/votebg.jpg"<?php }?> width="<?php echo $percent ?>">&nbsp;</td>
            <td height="15">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
<?php 
$i++;
}
?>      
    </table></td>
  </tr>
</table>
<p align="center">[<a href="javascript:window.close()">�رմ���</a>]</p>
</body>
</html>
