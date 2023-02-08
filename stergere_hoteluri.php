<?php
	require_once 'connect.php';
	$id_hotel=$_GET['id_hotel'];
	$del ="DELETE FROM `hotel` WHERE `id_hotel` = '$id_hotel'";
	if(mysqli_query($con,$del))
	{
				echo "<script type='text/javascript'> alert('Hotelul s-a sters cu succes!')</script>";
				echo "<script type='text/javascript'> window.location='sterge_hoteluri.php'</script>";

		}else {
			echo "<script>alert('Hotelul nu s-a putut sterge!')</script>";
		}


?>
   