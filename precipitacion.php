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
    <title>Pacto</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/tiempo.css" rel="stylesheet" />
    <!-- bar-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <style type="text/css"></style>
</head>


<body>
    <header>
        <!-- Navigation-->
        <?php
            require "./view/navbarPrincipal.php"
        ?>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
        </h1>
        <?php
            require "./view/navbar.php"
        ?>
    </header>
    <section class="page-section cta">
        <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
    </section>
    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Precipitación</span>

                            <div class="container mt-5" style="align-items: center;">
                                <div class=" row">
                                    <div class="col-md-8 ">
                                        <table class="table">
                                            <thead class="table-success table-striped">
                                                <tr style="font-size: 14px;">
                                                    <th>Precipitación</th>
                                                    <th>Dia-Hora</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr style="font-size: 12px;">
                                                        <th>200</th>
                                                        <th>2021-07-01 18:00</th>
                                                    </tr>
                                                    <tr style="font-size: 12px;">
                                                        <th>200</th>
                                                        <th>2021-07-01 18:00</th>
                                                    </tr>
                                                    <tr style="font-size: 12px;">
                                                        <th>150</th>
                                                        <th>2021-07-01 18:00</th>
                                                    </tr>
                                            </tbody>
                                        </table>
                                        <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                        <li class="page-item">
                                                        <a class="page-link" href="temperatura.php?pagina=>"> Anterior</a>
                                                        </li>
                                                        <li class="page-item">
                                                        <a class="page-link" href="temperatura.php">1</a>
                                                        </li>
                                                        <li class="page-item">
                                                        <a class="page-link" href="temperatura.php">Siguiente</a>
                                                        </li>
                                                    </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </h2>
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
    <script src="Highcharts-4.1.5/js/highcharts.js"></script>
    <script src="Highcharts-4.1.5/js/modules/exporting.js"></script>
    <script src="js/highcharts/highchartsPrecipitacion.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>