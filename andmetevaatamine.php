<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta http-equiv="Content-Type" content="text/html; =UTF-8">
    </head>
    <body class="data">
    <header>
    <div class="navigatisoon">
        <nav id="nav" role='navigation'>
         <a class="menuu"></a>
            <ul>
                <li><a href="index.html">Avaleht</a></li>
                <li><a href="andmetesisestus.html">Andmete sisestamine</a></li>
                <li class="active"><a href="andmetevaatamine.php">Andmete vaatamine</a></li>
            </ul>
        </nav>
        </div>
        </header>




<h2>Join</h2>

<?php
include 'connect.php';

$sql ="SELECT `kooli andmed`.kooliID,`kooli andmed`.`kooli nimi`,`kooli andmed`.`kooli aadress`,`kooli andmed`.`kooli email`,`kooli andmed`.`kooli telefon nr.`,`opetajate andmed`.`opetaja eesnimi`,`opetajate andmed`.`opetaja perenimi`,`opetajate andmed`.`opetaja email`, `opetajate andmed`.`opetaja telefon nr.`,`parimad opilased`.`opilase eesnimi`,`parimad opilased`.`opilase perenimi`,`personali andmed`.`personali eesnimi`,`personali andmed`.`personali perenimi`,`personali andmed`.`personali email`, `personali andmed`.`personali telefon nr.`
FROM `kooli andmed`
JOIN `opetajate andmed` ON `kooli andmed`.kooliID=`opetajate andmed`.opetajaID
JOIN `parimad opilased` ON `kooli andmed`.kooliID=`parimad opilased`.opilaseID
JOIN `personali andmed` ON `kooli andmed`.kooliID=`personali andmed`.personaliID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
        <tr>
            <th>ID</th>
            <th>Koolid</th>
            <th>Koolide aadressid</th>
            <th>Koolide emailid</th>
            <th>Koolide Telefoni nr.</th>
            <th>Õpetajate eesnimed</th>
            <th>Õpetajate perenimed</th>
            <th>Õpetajate emailid</th>
            <th>Õpetajate telefoni nr.</th>
            <th>Parimate õpilaste eesnimed</th>
            <th>Parimate õpilaste perenimed</th>
            <th>Personalide eesnimed</th>
            <th>Personalide perenimed</th>
            <th>Personalide emailid</th>
            <th>Personalide telefoni nr.</th>
            <th>Kustuta</th>
        </tr>";
    echo "<form action='koolikustutamine.php' method='post'>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["kooliID"].
        "</td><td>".$row["Koolid"].
        "</td><td>".$row["kooli aadress"].
        "</td><td>".$row["kooli email"].
        "</td><td>".$row["kooli telefon nr."].
        "</td><td>".$row["opetaja eesnimi"].
        "</td><td>".$row["opetaja perenimi"].
        "</td><td>".$row["opetaja email"].
        "</td><td>".$row["opetaja telefon nr."].
        "</td><td>".$row["opilase eesnimi"].
        "</td><td>".$row["opilase perenimi"].
        "</td><td>".$row["personali eesnimi"].
        "</td><td>".$row["personali perenimi"].
        "</td><td>".$row["personali email"].
        "</td><td>".$row["personali telefon nr."].
        "</td><td><input type='checkbox' name='kustuta[]' value=". $row["kooliID"]."/></td></tr>";
    }
    echo "</table>";
	echo "<input type='submit' value='Kinnita'>";
    echo "</form>";
    } else {
    echo "<br>Tulemused puuduvad.";
}


$conn->close();
?>
 
 
</body>
</html>