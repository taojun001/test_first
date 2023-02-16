<?php 
session_start();

if($_SESSION['spo']!=1)
{
	echo "<script>location.href='404.html'</script>";
}
?>