<?php
    spl_autoload_register(function($class) {
        include './php/class/Message/'.$class.'.class.php';
    });

    include './php/class/Session/Session.class.php';

    $session = new Session();
    if($session->validateSession('email')){
        header('location: ./index.php?message=Ya iniciaste sesión&type=WarningMessage');
    }

    $message = isset($_GET['message']) && isset($_GET['type']) ? MessageFactory::CreateMessage($_GET['type']) : false;

    $message_out = $message ? $message->getMessage($_GET['message']): '';

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Pacto</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/tiempo.css" rel="stylesheet" />
</head>

<body>
  <header>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <img src="assets/img/logo-3.png">
      <div class="container">
        <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase" href="index.php">Inicio</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase" href="registrate.php">Regístrate</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- Navigation-->

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner bg-faded text-center rounded">
            <?php
              echo $message_out;
            ?>
            <h2 class="section-heading mb-5">
              <!-- <img src="assets/img/logo-2.png" /> -->
              <span class="section-heading-lower">Iniciar sesion</span>
            </h2>
          <form method="POST" action="php/functions/login/validar-login.php">
            
            <p>
              <label for="user_login">Correo electronico<br />
                <input type="email" name="email" id="correo" class="input" value="" size="20" required /></label>
            </p>
            <p>
              <label for="user_pass">Contraseña<br />
                <input type="password" name="password" id="password" class="input" value="" size="20" required/></label>
            </p>
            <p class="submit">
              <input type="submit" name="login" class="button" value="Entrar" />
            </p>
          </form>
            <p class="regtext">
              No estas registrado?
              <a href="registrate.php" style="color: green">Registrate Aquí</a>!
            </p>
            <p class="mb-0">
              <a href="actualizar.php" style="color: green">Olvidaste tu contraseña</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    
  </section>

  <?php
        require "./view/footer.php"
    ?>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>