<?php
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    
    require_once "conexion.php";
    
    $sql_blogs = "SELECT * FROM blogs ORDER BY id DESC LIMIT 4";
    $obtener_blogs = $conexion->query($sql_blogs);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--
Victory HTML CSS Template
https://templatemo.com/tm-507-victory
-->
        <title>Cerveceria de Noah - Blog</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
    <?php include "header.php" ?>
    <!--/.header-->

    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Nuestro blog</h1>
                    <p>Aquí encontrarás las historias que tenemos que contarte sobre nuestro día a día.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="blog-page">
        <div class="container">
            <div class="row">
                <?php
                if($obtener_blogs->num_rows > 0) {
                    while($fila=$obtener_blogs->fetch_assoc()) { ?>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="blog-item">
                                <img src="img/blog_item_01.jpg" alt="">
                                <div class="date"><?php echo $fila['fecha'] ?></div>
                                <div class="down-content">
                                    <h4><?php echo $fila['titulo'] ?></h4>
                                    <p><?php echo $fila['texto'] ?></p>
                                    <div class="text-button">
                                        <a href="detalle.php?id_blog=<?php echo $fila['id'] ?>">+ Leer más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php 
                    }
                } ?>
                
    
                <div class="col-md-8 col-md-offset-2">
                    <ul class="page-number">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">&gt;&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="sign-up">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Apúntate para recibir las novedades</h2>
                    </div>
                </div>
            </div>
            <form id="contact" action="" method="get">
                <div class="row">
                    <div class="col-md-4 col-md-offset-3">
                        <fieldset>
                            <input name="email" type="text" class="form-control" id="email" placeholder="Ingresa tu email aquí..." required="">
                        </fieldset>
                    </div>
                    <div class="col-md-2">
                        <fieldset>
                            <button type="submit" id="form-submit" class="btn">Enviar mensaje</button>
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <?php include "footer.php" ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>