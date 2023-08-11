<?php
include "include/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Tella Jogos</title>
</head>
<body>
    <?php include "header.php"; ?><br><br>
<center>
    <?php
$sql = "SELECT * FROM jogos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibe os dados
    while($row = $result->fetch_assoc()) {
        $filename = $row['filenameimg'];
        $folder = $row['folder_name'];
        echo "<a class='text-decoration-none' style='color:black' href='games/$folder'><img height='400' widht='400' src='images/". $filename."'><br>";
        echo "<h2>" . $row["nome"]. "</h2><p>" . $row["descricao"]."</p></a><br><br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}
?>
</center>
</body>
</html>