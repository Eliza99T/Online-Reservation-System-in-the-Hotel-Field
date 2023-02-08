<?php
	require_once 'connect.php';
	$id_subt_camera=$_GET['id_subt_camera'];
	$del ="DELETE FROM `subtip_camera` WHERE `id_subt_camera` = '$id_subt_camera'";
	if(mysqli_query($con,$del))
	{
		echo "<script type='text/javascript'> alert('Subtipul camerei s-a şters cu succes!')</script>";	
		echo "<script type='text/javascript'> window.location='sterge_subcamera.php'</script>";								
	}
										
	else
	{
		echo "<script type='text/javascript'> alert('Nu s-a putut şterge!')</script>";	
	}
?>