<?php
    spl_autoload_register(function($class) {
        include './php/class/Message/'.$class.'.class.php';
    });

    include './php/class/Session/Session.class.php';

    $session = new Session();
    if($session->validateSession('email')){
        
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
    <title>PACTO</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/tiempo.css" rel="stylesheet" />
</head>

<body>
        <!-- Navigation-->
        <?php
            require "./view/navbarPrincipal.php"
        ?>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
           
            <span class="site-heading-upper text-primary mb-3">Estacion Metereologica Pacto</span>
            <span class="site-heading-lower">Bienvenidos</span>
        </h1>
        <?php
            require "./view/navbar.php"
        ?>
        </header>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <?php
                        echo $message_out;
                    ?>
                    <div class="col-xl-9 mx-auto" id="temperatura_inicio">
                        <!-- <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Pacto</span>
                                <span class="section-heading-lower">19&deg;C</span>
                                <span class="section-heading-upper">Martes, 29 Junio</span>
                                <span class="section-heading-upper">Max: 19&deg;C</span>
                                <span class="section-heading-upper">Min :19&deg;C</span>
                                <p></p>
                                <span class="section-heading-upper">Previsión para 7 días</span>
                            </h2>

                            <tr>
                                <td>Miércoles T:17&deg;C</td>
                                <td>|</td>
                                <td>Jueves T:17&deg;C</td>
                                <td>|</td>
                                <td>Viernes T:17&deg;C</td>
                                <td>|</td>
                                <td>Sábado T:17&deg;C</td>
                                <td>|</td>
                                <td>Domingo T:17&deg;C</td>
                                <td>|</td>
                                <td>Lunes T:17&deg;C</td>
                            </tr>
                        </div> -->
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
        <script src="js/temperatura/temperatura_print.js"></script>
        
</body>

</html>