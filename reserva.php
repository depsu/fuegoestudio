<?php
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $human = intval($_POST['human']);
    $from = 'Demo Contact Form';
    $to = 'rivera.ale98@gmail.com';
    $subject = 'Message from Contact Demo ';

    $body = "From: $name\n E-Mail: $email\n Message:\n $message";

    // Check if name has been entered
    if (!$_POST['name']) {
        $errName = 'Please enter your name';
    }

    // Check if email has been entered and is valid
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errEmail = 'Please enter a valid email address';
    }

    //Check if message has been entered
    if (!$_POST['message']) {
        $errMessage = 'Please enter your message';
    }
    //Check if simple anti-bot test is correct
    if ($human !== 5) {
        $errHuman = 'Your anti-spam is incorrect';
    }

    // If there are no errors, send the email
    if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
        if (mail($to, $subject, $body, $from)) {
            $result = '<div class="alert alert-success">Thank You! I will be in touch</div>';
        } else {
            $result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
        }
    }
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio Fuego</title>

    <!--estilos globales css-->
    <link rel="shortcut icon" href="/imagenes/icono-pagina.png" />

    <link rel="stylesheet" href="/bootstrap.min.css">

    <link rel="stylesheet" href="/css/global/classtocss_apply.css">
    <link rel="stylesheet" href="/css/main.css">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>


    <!--estilos pagina home css-->
    <link rel="stylesheet" href="/css/home.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">



</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: rgb(10, 10, 10) !important;">
        <div class="container">
            <a class="navbar-brand" href="/"><img class="logo-nav" src="/imagenes/logo-nav2.svg"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/nosotros">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/ficha-tecnica">Ficha Técnica</a>
                    </li>
                    <li class="nav-item nav--reservaTuHora">
                        <a class="nav-link " href="/reserva">Reserva tu hora</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header text-center">Contact Form Example</h1>
                <form class="form-horizontal" role="form" method="post" action="reserva.php">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                            <?php echo "<p class='text-danger'>$errName</p>"; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                            <?php echo "<p class='text-danger'>$errEmail</p>"; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']); ?></textarea>
                            <?php echo "<p class='text-danger'>$errMessage</p>"; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                            <?php echo "<p class='text-danger'>$errHuman</p>"; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php echo $result; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>





    <!--Footer-->
    <footer>
        <div class="redes-sociales">
            <div class="contenedor-imagenes">
                <div>
                    <img src="/imagenes/footer-facebook.png" alt="facebook">
                </div>
                <div>
                    <img src="/imagenes/footer-instagram.png" alt="instagram">
                </div>
            </div>
        </div>
        <div class="informacion">
            <div class="imagen-y-horario container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-8 col-sm-12 imagen-informacion">
                        <div class="contendor-imagen-informacion">
                            <img class="centrar mw-100" src="/imagenes/footer-logo.png" alt="logo">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 horario ">

                        <p class="contenedor-texto-llamada">
                            <span style="display: inline-block;
                            font-weight: 700;
                            padding-bottom: 7px;">
                                Horario de Atención
                            </span><br>
                            Lunes a Viernes: 9:00 a 20:00 hrs. <br>
                            sábado: 9:00 a 18:00 hrs.<br>
                            Domingo: cerrado
                        </p>

                        <div class="contenedor-telefono">
                            <img src="/imagenes/footer-llamada.png" alt="llamada">
                            <span class="telefono">
                                +569 85002654<br>
                            </span>
                        </div>
                        <a href="https://goo.gl/maps/qJ4vGxm9uB54rGyT8"><img src="/imagenes/footer-ubicacion.png" alt="llamada">
                            <span class="telefono">Av. Libertador Bernardo O'Higgins 2118, Santiago</span></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--Botón whatsapp-->
    <a href="https://api.whatsapp.com/send?phone=56985002654" class="whatsapp" target="_blank"> <i class="fab fa-whatsapp whatsapp-icon"></i></a>


    <!--Script home-->
    <script defer src="/js/home.js"></script>

    <!--Global script-->
    <script defer src="/librerias/bootstrap.bundle.min.js"></script>
    <script defer src="/js/main.js"></script>


</body>

</html>