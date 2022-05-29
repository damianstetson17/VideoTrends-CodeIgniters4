<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- boostrap 5.2.0 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <style>
    <?php include "css/header_style.css" ?>
  </style>
  <style>
    <?php include "css/footer_style.css" ?>
  </style>
  <style>
    <?php include "css/home_style.css" ?>
  </style>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VideoTrend - Home</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home">
        <img src="img/logo_videoTrend.png" alt="VideoTrend" width="34" height="34">
        VideoTrend
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= session('profile_name') ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/home">Editar Perfil</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="/">Cerrar Sesión</a></li>
            </ul>
          </li>
      </div>
    </div>
  </nav>

  <div class="grid-search-container">
    <p class="title">Título</p>
    <input class="inputSearch" type="text" name="secondName" />
    <p class="title">Términos de mi búsqueda</p>
    <input class="inputSearch" type="text" name="secondName" />
    <img class="searchVidBtn" src="img/logo_videoTrend.png" alt="VideoTrend" width="34" height="34">
  </div>

  <?= $footer ?>
</body>

</html>