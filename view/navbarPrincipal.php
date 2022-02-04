
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-auto" id="mainNav">
    <img class="logo-nav" src="assets/img/logo.png">
        <div class="container">
            <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                    if(!$session->validateSession('email')){
                        echo '<ul class="navbar-nav mx-auto">';
                        echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.php">Inicio</a></li>';
                        echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="login.php">Iniciar sesión</a></li>';
                        echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="registrate.php">Regístrate</a></li>';
                        echo '</ul>';
                    }else{
                        echo '<ul class="navbar-nav mx-auto">';
                        echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.php">Inicio</a></li>';
                        echo '<li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="./php/functions/login/logout.php">Cerrar sesión</a></li>';
                        echo '</ul>';
                    }
                ?>
            </div>
        </div>
    </nav>
