<?php
	require_once 'connect.php';
	$id_tip_camera=$_GET['id_tip_camera'];
	$del ="DELETE FROM `tip_camera` WHERE `id_tip_camera` = '$id_tip_camera'";
	if(mysqli_query($con,$del))
	{
		echo "<script type='text/javascript'> alert('Camera s-a şters cu succes!')</script>";	
		echo "<script type='text/javascript'> window.location='sterge_camere.php'</script>";								
	}
										
	else
	{
		echo "<script type='text/javascript'> alert('Nu s-a putut şterge!')</script>";	
	}
										
?>