<?php
	require_once 'connect.php';
	$id_statiune=$_GET['id_statiune'];
	$del ="DELETE FROM `statiune` WHERE `id_statiune` = '$id_statiune'";
	if(mysqli_query($con,$del))
	{
			echo "<script type='text/javascript'> alert('Statiunea s-a şters cu succes!')</script>";	
		echo "<script type='text/javascript'> window.location='sterge_statiune.php'</script>";								
	}
										
	else
	{
		echo "<script type='text/javascript'> alert('Nu s-a putut şterge!')</script>";	
	}
										
?>