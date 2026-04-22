<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--
Victory HTML CSS Template
https://templatemo.com/tm-507-victory
-->
        <title>Cerveceria de Noah - Contacto</title>
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

    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contáctanos</h1>
                    <p>Siéntete libre de consultar o sugerir cualquier cosa.</p>
                </div>
            </div>
        </div>
    </section>



    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-heading">
                        <h2>Mensaje</h2>
                    </div>
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Tu nombre..." required="">
                                </fieldset>
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Tu email..." required="">
                                </fieldset>
                                <fieldset>
                                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Tu teléfono..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Tu mensaje..." required=""></textarea>
                                </fieldset>
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Enviar Mensaje</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="section-heading contact-info">
                        <h2>Información de contacto</h2>
                        <p>Pellentesque nec orci in erat venenatis viverra. Vivamus in lorem et leo feugiat ullamcorper. Donec volutpat fermentum erat non aliquet. Cras fermentum, risus a blandit sodales, erat turpis eleifend lacus, venenatis mollis leo lorem vel eros. Quisque et sem tempus, feugiat urna iaculis, tempor metus.<br><br><em>Calle de Cervantes 3, <br>Quart de Poblet 46930</em></p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="map">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="map">
        <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
        -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3079.4032619398213!2d-0.442975323394862!3d39.482807871605104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604ff779223b39%3A0xc60596edf6e35ebd!2sCentro%20de%20FP%20SOLVAM!5e0!3m2!1ses!2ses!4v1776850572608!5m2!1ses!2ses" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
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