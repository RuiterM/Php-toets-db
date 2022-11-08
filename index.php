<?php
$db = new PDO("mysql:host=localhost;dbname=autos", "root","");
$query = $db->prepare("SELECT naam FROM merk");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$teller = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
</head>

<h2>Auto merken</h2>

<table>
    <tr>
        <th>naam</th>
        <th>model</th>
    </tr>
    <tr>
        <td><?php
            foreach ($result as $data) {;
                echo $data['naam']. "<br>";
                $teller++;
            }
            echo "<br>er zijn ".$teller-1," merken"
            ?></td>
        <td><?php
            $query2 = $db->prepare("SELECT * FROM model");
            $query2->execute();
            $result2 = $query2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result2 as $data2) {

                echo $data2["merk_id"],"". $data2['naam']. "<br>";
                $teller++;
            }
            ?></td>
    </tr>
</table>
<br>
<button><a class="text-reset text-decoration-none" href="insert.php">Merk toevoegen</a></button>
</body>
</html>