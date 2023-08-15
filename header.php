<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://192.168.1.53/clone/index.php">Tella Jogos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="http://127.0.0.1/clone/sobre.php">Sobre</a>
        <a class="nav-link active" ria-current="page" href="http://127.0.0.1/clone/admin/">Admin</a>
        <?php
        if(isset($_SESSION['user'])){
          if($_SESSION['user'] == 'admin'){
            echo '<a class="nav-link active" ria-current="page" href="http://127.0.0.1/clone/logout.php">Logout</a>';
          }
        }
        ?>

    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
  </div></div>
</nav>