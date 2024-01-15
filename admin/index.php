<?php
session_start();
include "../include/verify.php";
include "../include/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 
    <title>Administracao</title>
</head>
<body class="vh-100 gradient-custom" >
    <?php include "../header.php"; ?>
    <!---->
    <section class="vh-100 gradient-custom">
  <form action="" method="POST">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <?php
            $query = "SELECT descricao FROM sobre";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $value = $row['descricao'];
                }
            
            }

          ?>
            <div class="mb-md-5 mt-md-4 pb-5">
            <h2 style="text-align: left;">Sobre</h2>
            <div class="mb-3">
            <textarea name="sobre" rows="7" placeholder="Editar página sobre" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $value; ?></textarea>
            </div>


              <button style="text-align: left;" class="btn btn-outline-light btn-lg px-5" name="enviar" type="submit">Editar</button>

             <?php
                if(isset($_POST['enviar'])){
                  $text = $_POST['sobre'];
                  $query = "UPDATE sobre SET descricao = ?";
                  $stmt = $conn->prepare($query);
                  $stmt->bind_param("s", $text);
                  $stmt->execute();
                  echo "<br><br><br>Página sobre atualizada com sucesso.";
              }
             ?>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</form>

</section>

</body>
</html>