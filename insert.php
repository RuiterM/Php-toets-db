<?php
$melding = "";
$db = new PDO("mysql:host=localhost;dbname=autos", "root","");
if (isset($_POST["verzenden"])) {
    $merk = filter_input(INPUT_POST, "merk", FILTER_SANITIZE_STRING);
    $query = $db->prepare("INSERT INTO merk(naam) VALUES (:merk)");
    $query->bindParam("merk", $merk);
    if ($query->execute()) {
       $melding = $merk." is toegevoegd";
    } else {
        echo "Er is een fout opgetreden!";
    }
    echo "<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h5 style="margin: 50px">
    Invoeren van nieuw merk<br><br>
    Merknaam:
<form method="post">
<input type="text" name="merk">
<br>
<br>
<input type="submit" name="verzenden" value="Verzend"><br>
<br><?php echo $melding; ?>
<br>
    <br>
<button><a class="text-reset text-decoration-none" href="index.php">Terug naar overzicht!</a></button>
</form>
</h5>
</body>
</html>