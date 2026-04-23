<?php
    // Mostrar errores
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    // Incluir la conexión
    require_once "conexion.php";
    // Comprobar que hay id_libro en la URL
    // Si la hay, crea una variable con SELECT

    $sql_categorias = "SELECT * FROM categorias";
    
    if (isset($_GET['id_categoria'])) {
        $id_categoria = $_GET['id_categoria'];
        
        $conexion->query("UPDATE categorias SET visitas=visitas+1 WHERE id=$id_categoria");
        $sql_productos = "SELECT productos.nombre, categorias.nombre, tipos.nombre, productos.fabricante, productos.graduacion, productos.precio, productos.imagen FROM productos JOIN categorias ON productos.categoria=categorias.id JOIN tipos ON productos.tipo=tipos.id WHERE productos.categoria=$id_categoria";
    } else {
        $sql_productos = "SELECT productos.nombre, categorias.nombre, tipos.nombre, productos.fabricante, productos.graduacion, productos.precio, productos.imagen FROM productos JOIN categorias ON productos.categoria=categorias.id JOIN tipos ON productos.tipo=tipos.id";
    }

    $obtener_categorias = $conexion->query($sql_categorias);
    $obtener_productos = $conexion->query($sql_productos);
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
        <title>Cerveceria de Noah - Nuestros productos</title>
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
                    <h1>Nuestros productos</h1>
                    <p>Disfrute de la mejor selección.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Añadir aquí PHP para mostrar los productos. Si no hay categoría en la URL, mostrará todos. -->
    <section class="breakfast-menu">
        <?php
            if ($obtener_productos->num_rows > 0) {
                while($fila=$obtener_productos->fetch_array()) {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="breakfast-menu-content">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="left-image">
                                                <img src="./img/imgcerveceria/<?php echo $fila[6] ?>" alt="<?php echo $fila[0] ?>" width="150px" height="300px">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <h2><?php echo $fila[0] ?></h2>
                                            <ul>
                                                <li>Categoría: <?php echo $fila[1] ?></li>
                                                <li>Tipo: <?php echo $fila[2] ?></li>
                                                <li>Fabricante: <?php echo $fila[3] ?></li>
                                                <li>Graduación: <?php echo $fila[4] ?></li>
                                                <li>Precio: <?php echo $fila[5] ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No hay productos.";
            }
        ?>
    </section>


    <!-- 
    <section class="lunch-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="lunch-menu-content">
                        <div class="row">
                            <div class="col-md-7">
                                <h2>Lunch Menu</h2>
                                <div id="owl-lunch" class="owl-carousel owl-theme">
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <img src="img/lunch_item.jpg" alt="">
                                            <div class="price">$6.50</div>
                                            <div class="text-content">
                                                <h4>Mumble Ditch Corn</h4>
                                                <p>Dreamcatcher squid ennui cliche chicharros nes echo  small batch jean ditcher meal...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <img src="img/breakfast_item.jpg" alt="">
                                            <div class="price">$11.75</div>
                                            <div class="text-content">
                                                <h4>Wayfare Lomo Core</h4>
                                                <p>Dreamcatcher squid ennui cliche chicharros nes echo  small batch jean ditcher meal...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <img src="img/dinner_item.jpg" alt="">
                                            <div class="price">$16.50</div>
                                            <div class="text-content">
                                                <h4>Taiyaki Gastro Tousled</h4>
                                                <p>Dreamcatcher squid ennui cliche chicharros nes echo  small batch jean ditcher meal...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="left-image">
                                    <img src="img/lunch_menu.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <!--
    <section class="dinner-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="dinner-menu-content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="left-image">
                                    <img src="img/dinner_menu.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h2>Dinner Menu</h2>
                                <div id="owl-dinner" class="owl-carousel owl-theme">
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <img src="img/dinner_item.jpg" alt="">
                                            <div class="price">$8.25</div>
                                            <div class="text-content">
                                                <h4>Meal Apples Almonds</h4>
                                                <p>Dreamcatcher squid ennui cliche chicharros nes echo  small batch jean ditcher meal...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <img src="img/lunch_item.jpg" alt="">
                                            <div class="price">$12.50</div>
                                            <div class="text-content">
                                                <h4>Ditch Corn Art</h4>
                                                <p>Dreamcatcher squid ennui cliche chicharros nes echo  small batch jean ditcher meal...</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <img src="img/breakfast_item.jpg" alt="">
                                            <div class="price">$16.00</div>
                                            <div class="text-content">
                                                <h4>Kale Chips Art Party</h4>
                                                <p>Dreamcatcher squid ennui cliche chicharros nes echo  small batch jean ditcher meal...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->


    <!--
    <section id="book-table">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Book Your Table Now</h2>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <div class="left-image">
                        <img src="img/book_left_image.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="right-info">
                        <h4>Reservation</h4>
                        <form id="form-submit" action="" method="get">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <select required name='day' onchange='this.form.()'>
                                            <option value="">Select day</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <select required name='hour' onchange='this.form.()'>
                                            <option value="">Select hour</option>
                                            <option value="10-00">10:00</option>
                                            <option value="12-00">12:00</option>
                                            <option value="14-00">14:00</option>
                                            <option value="16-00">16:00</option>
                                            <option value="18-00">18:00</option>
                                            <option value="20-00">20:00</option>
                                            <option value="22-00">22:00</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <input name="name" type="name" class="form-control" id="name" placeholder="Full name" required="">
                                    </fieldset> 
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <input name="phone" type="phone" class="form-control" id="phone" placeholder="Phone number" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <select required class="person" name='persons' onchange='this.form.()'>
                                            <option value="">How many persons?</option>
                                            <option value="1-Person">1 Person</option>
                                            <option value="2-Persons">2 Persons</option>
                                            <option value="3-Persons">3 Persons</option>
                                            <option value="4-Persons">4 Persons</option>
                                            <option value="5-Persons">5 Persons</option>
                                            <option value="6-Persons">6 Persons</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="btn">Book Table</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->



    <?php include "footer.php" ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>	-->
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