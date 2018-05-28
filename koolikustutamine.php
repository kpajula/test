<?php
include 'connect.php';

foreach($_POST['kustuta'] as $item){
	$sql = "DELETE FROM `kooli andmed` WHERE kooliID='$item';";
		if ($conn->query($sql) === TRUE) {
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		
	$sql = "DELETE FROM `opetajate andmed` WHERE kooliID=$item;";
		if ($conn->query($sql) === TRUE) {
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	$sql = "DELETE FROM `parimad opilased` WHERE kooliID=$item;";
		if ($conn->query($sql) === TRUE) {
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	$sql = "DELETE FROM `personali andmed` WHERE kooliID=$item;";
		if ($conn->query($sql) === TRUE) {
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}
}
header("Refresh:0; url=andmetevaatamine.php");
$conn->close();
?>