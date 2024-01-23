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
<body class="vh-100 gradient-custom" >
    <?php include "header.php"; ?><br><br>
<center>
    <?php
$sql = "SELECT * FROM jogos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibe os dados
    while($row = $result->fetch_assoc()) {
        $filename = htmlspecialchars($row['filenameimg']);
        $folder = htmlspecialchars($row['folder_name']);
        $name = htmlspecialchars($row["nome"]);
        $description = htmlspecialchars($row["descricao"]);
        echo "<a class='text-decoration-none' style='color:black' href='games/$folder'><img height='400' widht='400' src='images/". $filename."'><br>";
        echo "<h2>" . $name. "</h2><p>" . $description ."</p></a><br><br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}
?>
</center>
</body>
<style>
    .gradient-custom {
/* fallback for old browsers */
background: #6a11cb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
h2,p{
    color:white;
}
</style>
</html>