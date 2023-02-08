<?php
	require_once 'connect.php';

	$id_rezervare=$_GET['id_rezervare'];
	$del ="DELETE FROM `rezervare` WHERE `id_rezervare` = '$id_rezervare'";
	if(mysqli_query($con,$del))
	{
		echo "<script type='text/javascript'> alert('Rezervarea s-a şters cu succes!')</script>";									
	}
										
	else
	{
		echo "<script type='text/javascript'> alert('Nu s-a putut şterge!')</script>";	
	}
										
	header("location:lista_rezervari.php");
?>


