<?php
include 'connect.php';

$K_nimi=$_POST['K_nimi'];
$K_aadress=$_POST['K_aadress'];
$K_email=$_POST['K_email'];
$K_telefoninr=$_POST['K_telefoninr'];

$O_eesnimi=$_POST['O_eesnimi'];
$O_perenimi=$_POST['O_perenimi'];
$O_email=$_POST['O_email'];
$O_telefoninr=$_POST['O_telefoninr'];

$PO_eesnimi=$_POST['PO_eesnimi'];
$PO_perenimi=$_POST['PO_perenimi'];

$P_eesnimi=$_POST['P_eesnimi'];
$P_perenimi=$_POST['P_perenimi'];
$P_email=$_POST['P_email'];
$P_telefoninr=$_POST['P_telefoninr'];


$sql1 = "INSERT INTO `kooli andmed` (`kooli nimi`, `kooli aadress`, `kooli email`, `kooli telefon nr.`)
VALUES ('$K_nimi','$K_aadress','$K_email','K_telefoninr')"; 

if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}


$sql2 = "INSERT INTO `opetajate andmed` (`opetaja eesnimi`,`opetaja perenimi`,`opetaja email`,`opetaja telefon nr.`)
VALUES ('$O_eesnimi','$O_perenimi','$O_email','$O_telefoninr')";

if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$sql3 = "INSERT INTO `parimad opilased` (`opilase eesnimi`,`opilase perenimi`)
VALUES ('$PO_eesnimi','$PO_perenimi')";
if ($conn->query($sql3) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
}

$sql4 = "INSERT INTO `personali andmed` (`personali eesnimi`,`personali perenimi`,`personali email`,`personali telefon nr.`)
VALUES ('$P_eesnimi','$P_perenimi','$P_email','$P_telefoninr')";

if ($conn->query($sql4) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
}

$conn->close();

header("Location: confirmation.html");
die();
exit;
?>
<!--
<html>
<br>
<button type="button" onclick="location.href='index.html'">Tagasi</button>
</html>-->
