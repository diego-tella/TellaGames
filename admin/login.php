<?php include "../include/connection.php"; 
session_start();

if(isset($_SESSION['user'])){
  if($_SESSION['user'] == 'admin'){
    header('location: index.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   
    <title>Administracao</title>
</head>
<body>
    <?php include "../header.php";?>
    <section class="vh-100 gradient-custom">
  <form action="" method="POST">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <div class="form-outline form-white mb-4">
                <input type="text" placeholder="User" name="user" id="typeEmailX" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" placeholder="Password" name="password" id="typePasswordX" class="form-control form-control-lg" />
              </div>
              <?php 
                if(isset($_POST['login'])){
                  $user = $_POST['user'];
                  $senha = $_POST['password'];
                  $encPass = md5($senha);
                  $query = "SELECT * FROM users WHERE nome = ? AND senha = ?";
                  $stmt = $conn->prepare($query);
                  $stmt->bind_param("ss", $user, $encPass);

                  $stmt->execute();

                  $result = $stmt->get_result();

                  if ($result->num_rows > 0) {
                    echo "Login bem-sucedido!<br><br>";
                    $_SESSION['user'] = 'admin';
                    sleep(2);
                    header('location: index.php');
                  } else {
                    echo "Login falhou. Verifique as credenciais.<br><br>";
                  }
                }
                ?>

              <button class="btn btn-outline-light btn-lg px-5" name="login" type="submit">Login</button>

             

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</form>

</section>
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
</style>
</html>