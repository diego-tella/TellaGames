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
            <h2 style="text-align: left;">About</h2>
            <div class="mb-3">
            <textarea name="sobre" rows="7" placeholder="Editar página sobre" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $value; ?></textarea>
            </div>


              <button style="text-align: left;" class="btn btn-outline-light btn-lg px-5" name="enviar_about" type="submit">Editar</button>

             <?php
                if(isset($_POST['enviar_about'])){
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


<section class="vh-100 gradient-custom">
  <form action="" method="POST" enctype="multipart/form-data">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
            <h2 style="text-align: left;">Create new game</h2>
            <div style="text-align:left;" class="mb-3">
            <input name="name" class="form-control" placeholder="Name"><br>
            <input name="description" class="form-control" placeholder="Description">
            <label for="exampleFormControlFile1">Game picture</label>
            <input name="file" type="file" class="form-control-file" id="exampleFormControlFile1">
            <input name="date" hidden value="<?php echo date('Y-m-d'); ?>">
            </div>


              <button style="text-align: left;" class="btn btn-outline-light btn-lg px-5" name="enviar_new_game" type="submit">Create</button>

            </div>
            <?php
              if(isset($_POST['enviar_new_game'])){
                if (!isset($_FILES["file"])) {
                  die("There is no file to upload.");
              }
                $name = $_POST['name'];
                $description = $_POST['description'];
                $date = $_POST['date'];
                $query = "INSERT INTO jogos (nome, descricao, filenameimg, folder_name, last_modifid) VALUES ('?', '?', '?', '?', '$date')";

               
                //upload file (after all)
              
              $filepath = $_FILES['file']['tmp_name'];
              $fileSize = filesize($filepath);
              $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
              $filetype = finfo_file($fileinfo, $filepath);
              
              if ($fileSize === 0) {
                  die("The file is empty.");
              }
              
              if ($fileSize > 3145728) { 
                  die("The file is too large");
              }
              
              $allowedTypes = [
                 'image/png' => 'png',
                 'image/jpeg' => 'jpg'
              ];
              
              if (!in_array($filetype, array_keys($allowedTypes))) {
                  die("File not allowed.");
              }
              
              $filename = basename($filepath); // I'm using the original name here, but you can also change the name of the file here
              $extension = $allowedTypes[$filetype];
              $targetDirectory = __DIR__ . "/images/"; // __DIR__ is the directory of the current PHP file
              
              $newFilepath = $targetDirectory . "/" . $filename . "." . $extension;
              
              if (!copy($filepath, $newFilepath)) { // Copy the file, returns false if failed
                  die("Can't move file.");
              }
              unlink($filepath); // Delete the temp file
              
              echo "File uploaded successfully :)";
              }
            
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</form>

</section>
</body>
</html>