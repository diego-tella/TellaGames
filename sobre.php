<?php
session_start();
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
 
    <title>Sobre</title>
</head>
<body class="vh-100 gradient-custom" >
<?php include "header.php"; ?><br>
<h1 style="text-align:center;">About</h1>
<center><div id="div1">
<?php
$query = "SELECT descricao FROM sobre";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $value = $row['descricao'];
        $value = htmlspecialchars($value);
        echo "<h2>$value</h2>";
    }

}
?>
</div></center>
</body>

<style>
h1{
    color:white;
}
h2{ color:white;}
#div1{
    width: 70%;
    text-align:left;
}
</style>
</html>