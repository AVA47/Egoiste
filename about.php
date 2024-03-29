<?
session_start();
require "core.php";
$sql = "SELECT * FROM products";
$product_query = mysqli_query($link, $sql);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Egoiste - О нас</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
</head>

<body>
    <header id="header">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +7 999 999 99 99</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> cofe_egoiste@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="top__header__right">
                        <?php
                        if ($_SESSION['user']) {
                            // Если вошел пользователь (любого типа), показываем "Выход"
                            if ($_SESSION['user']['type'] == 1) {
                                // Если тип пользователя - admin, показываем "Редактор"
                                echo  "<div class='editor'> 
							<a href='product/admin_panel.php'><input type='submit' value='Редактор' style='
								border: 2px solid #fe980f;
								padding: 3px 19px;
								border-radius: 5px;
								background-color: white;
								cursor: pointer;
								margin-left: 344px;
								margin-top: 3px;
								color: #600c00;
								transition: 0.5s;
							'></a>
							<a href='function/logout.php'><input type='submit' value='Выйти' style='
								border: 2px solid #fe980f;
								padding: 3px 19px;
								border-radius: 5px;
								background-color: white;
								cursor: pointer;
								margin-left: 10px;
								margin-top: 3px;
								color: #600c00;
								transition: 0.5s;
							'></a> 
							</div>";
                            } elseif ($_SESSION['user']['type'] == 2) {
                                // Если тип пользователя - обычный пользователь, показываем "Выйти"
                                echo  "<div class='editor'> 
								<a href='user/busket.php'><input type='submit' value='Корзина' style='
								border: 2px solid #fe980f;
								padding: 3px 19px;
								border-radius: 5px;
								background-color: white;
								cursor: pointer;
								margin-left: 344px;
								margin-top: 3px;
								color: #600c00;
								transition: 0.5s;
							'></a>
							<a href='function/logout.php'><input type='submit' value='Выйти' style='
								border: 2px solid #fe980f;
								padding: 3px 19px;
								border-radius: 5px;
								background-color: white;
								cursor: pointer;
								margin-left: 10px;
								margin-top: 3px;
								color: #600c00;
								transition: 0.5s;
							'></a> 
							</div>";
                            }
                        } else {
                            // Если никто не вошел, показываем "Войти"
                            echo "<div class='editor'> 
						<a href='function/auto.php'><input type='submit' value='Войти' style='
							border: 2px solid #fe980f;
							padding: 3px 19px;
							border-radius: 5px;
							background-color: white;
							cursor: pointer;
							margin-left: 444px;
							margin-top: 3px;
							color: #600c00;
							transition: 0.5s;
						'></a>  
						</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <img src="images/home/logo.png" style="text-align: center" />
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Навигатор</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.php">Главная</a></li>
                                <li><a href="#">О нас</a></li>
                                <li><a href="index.php#tovar">Товары</a></li>
                                <li><a href="contact.php">Контакты</a></li>
                                <li><a href="vacan.php">Вакансии</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form>
                                <input class="place_for_search" type="text" id="text-to-find" value=""
                                    placeholder="Поиск" autofocus>
                        </div>
                        <div class="forma">
                            <form>
                                <input class=" button_for_turn_back" type="button"
                                    onclick="javascript: FindOnPage('text-to-find',false); return false;" value=" "
                                    title="Отменить поиск">
                                <input class="button_for_search" type="submit"
                                    onclick="javascript: FindOnPage('text-to-find',true); return false;" value=" "
                                    title="Начать поиск">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <br>
    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><b><span>E</span>GOISTE</b></h1>
                                    <h2>МЫ - друзья вашего начала дня!</h2>
                                    <p>Добро пожаловать в мир Egoiste, где ваше утро становится настоящим праздником!
                                    </p>
                                    <p>🌟 Разве не замечательно начать свой день с наших ароматных напитков и вкусных
                                        закусок? 🌟</p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/barista1.jpg" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><b><span>E</span>GOISTE</b></h1>
                                    <h2>☕ Уютная атмосфера и дружелюбный персонал:</h2>
                                    <p>Egoiste - это не просто кофейня, это место, где вы можете расслабиться,
                                        насладиться моментом и по-настоящему насладиться своим утром. Наш дружелюбный
                                        персонал готов сделать ваш заказ уникальным и незабываемым.</p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/barista2.jpg" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><b><span>E</span>GOISTE</b></h1>
                                    <h2>🍪 Закуски, что поднимут настроение:</h2>
                                    <p>Наше меню также богато разнообразными закусками - свежими круассанами,
                                        аппетитными сэндвичами и сладкими десертами. Вместе с Egoiste ваш завтрак станет
                                        настоящим гастрономическим приключением!</p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/barista3.jpg" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                        </div>
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-33">
                    <div class="left-sidebar">
                        <h2>Наша компания!</h2>
                        <div class="block1">
                            <div class="block1_img">
                                <img src="images/home/block1.jpg" alt="">
                            </div>
                            <div class="block1_info">
                                <div>
                                    <h1><b><span>E</span>GOISTE</b></h1>
                                    <p>Уникальная компания, предоставляющая своим клиентам утонченные впечатления от
                                        кофе и великолепных закусок. Наша миссия заключается в том, чтобы создавать
                                        неповторимый опыт, где каждый глоток напитка становится настоящим путешествием в
                                        мир вкуса и радости.</p>
                                    <br>
                                    <div class="block1_info_b">
                                        <p>
                                            <b><span>E</span>GOISTE</b> - это не просто кофейня. Это место, где каждый
                                            посетитель может
                                            отвлечься от повседневной суеты, насладиться вкусом и запахом ароматного
                                            кофе, а
                                            также наслаждаться кулинарными изысками, предлагаемыми нашими поварами.
                                        </p>
                                    </div>
                                    <br>
                                    <p><b>МЫ</b> гордимся участием в местном сообществе и прилагаем усилия для
                                        соблюдения
                                        принципов устойчивого развития. Мы поддерживаем проекты, направленные на
                                        улучшение условий жизни в наших регионах и привлекаем внимание к вопросам
                                        социальной ответственности.</p>
                                </div>
                            </div>
                        </div>
                        <div id="slider-carousel1" class="carousel slide" data-ride="carousel1">
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel1" data-slide-to="0" class="active"></li>
                                <li data-target="#slider-carousel1" data-slide-to="1"></li>
                                <li data-target="#slider-carousel1" data-slide-to="2"></li>
                                <li data-target="#slider-carousel1" data-slide-to="3"></li>
                                <li data-target="#slider-carousel1" data-slide-to="4"></li>
                            </ol>
                            <div class="carousel-inner1">
                                <div class="item active">
                                    <img src="images/home/slider1.jpg" class="girl1 img-responsive" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/home/slider2.jpg" class="girl1 img-responsive" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/home/slider3.jpg" class="girl1 img-responsive" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/home/slider4.jpg" class="girl1 img-responsive" alt="" />
                                </div>
                                <div class="item">
                                    <img src="images/home/slider5.jpg" class="girl1 img-responsive" alt="" />
                                </div>
                            </div>
                            <a href="#slider-carousel1" class="left control-carousel hidden-xs" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a href="#slider-carousel1" class="right control-carousel hidden-xs" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                        <h2>Наш коллектив</h2>
                        <div class="block1">
                            <div class="slider-container">
                                <div class="slider">
                                    <div class="slide" data-name="Иван" data-position="Бариста">
                                        <img src="images/people/1.jpg" alt="Бариста Иван">
                                        <div class="info">
                                            <h3>Иван</h3>
                                            <p>Бариста</p>
                                        </div>
                                    </div>
                                    <div class="slide" data-name="Анна" data-position="Сомелье кофе">
                                        <img src="images/people/2.jpg" alt="Сомелье кофе Анна">
                                        <div class="info">
                                            <h3>Анна</h3>
                                            <p>Сомелье кофе</p>
                                        </div>
                                    </div>
                                    <div class="slide" data-name="Дмитрий" data-position="Мастер по обжарке">
                                        <img src="images/people/3.jpg" alt="Мастер по обжарке Дмитрий">
                                        <div class="info">
                                            <h3>Дмитрий</h3>
                                            <p>Мастер по обжарке</p>
                                        </div>
                                    </div>
                                    <div class="slide" data-name="Екатерина" data-position="Кофейный архитектор">
                                        <img src="images/people/4.jpg" alt="Кофейный архитектор Екатерина">
                                        <div class="info">
                                            <h3>Петр</h3>
                                            <p>Кофейный архитектор</p>
                                        </div>
                                    </div>
                                    <div class="slide" data-name="Петр" data-position="Бармен-кофейщик">
                                        <img src="images/people/5.jpg" alt="Бармен-кофейщик Петр">
                                        <div class="info">
                                            <h3>Екатерина</h3>
                                            <p>Бармен-кофейщик</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                            $(document).ready(function() {
                                $('.slider').slick({
                                    slidesToShow: 5,
                                    slidesToScroll: 1,
                                    prevArrow: $('.prev'),
                                    nextArrow: $('.next'),
                                });
                            });
                            </script>
                        </div>
                        <h2>Наше меню</h2>
                        <div class="block2">
                            <div class="block2_img">
                                <a data-fancybox="gallery" href="images/home/menu.jpg">
                                    <img src="images/home/menu.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <script>
                        $(document).ready(function() {
                            // Инициализация Fancybox
                            $("[data-fancybox]").fancybox({
                                // Опции Fancybox
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
    </section>
    <br>
    <section id="our-products">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title text-center">
                        <h2>Наша Продукция</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="product-item">
                        <h3>Эксклюзивный кофе</h3>
                        <p>Мы тщательно отбираем высококачественные сорта кофейных зерен со всего мира, обеспечивая
                            нашим клиентам наилучший опыт настоящего кофейного искусства.</p>
                    </div>
                    <div class="product-item">
                        <h3>Утонченные чаи</h3>
                        <p>Мы предлагаем разнообразные чаи, каждый из которых имеет свой неповторимый вкус и аромат,
                            чтобы удовлетворить самые изысканные вкусовые предпочтения.</p>
                    </div>
                    <div class="product-item">
                        <h3>Великолепные закуски</h3>
                        <p>Наши кулинарные эксперты готовят свежие круассаны, аппетитные сэндвичи и сладкие десерты,
                            чтобы дополнить ваш визит к нам.</p>
                    </div>
                </div>
                <div class="products_img">
                    <div class="col-sm-6">
                        <img src="images/home/products.jpg" alt="Наши Продукты">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section id="our-values">
        <div class="container">
            <div class="section-background"></div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title text-center">
                        <h2>Наши Ценности</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="value-item">
                        <h3>Качество</h3>
                        <p>Мы стремимся к выдающемуся качеству в каждом элементе нашего продукта — от выбора сырья до
                            приготовления и предоставления услуг.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="value-item">
                        <h3>Гостеприимство</h3>
                        <p>Мы создаем уютное пространство, где каждый клиент чувствует себя желанным и может
                            наслаждаться атмосферой вдохновения.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="value-item">
                        <h3>Инновации</h3>
                        <p>Мы постоянно совершенствуем наше меню, внедряя новые идеи и тенденции в мире кофе и
                            гастрономии.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <? include 'footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function() {
        // Инициализация слайдера
        $('.slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
        });

        // Инициализация эффекта приближения
        $('.slide img').each(function() {
            $(this).zoom();
        });

        // Обновление эффекта приближения при наведении
        $('.slide').hover(
            function() {
                $(this).find('img').trigger('zoom.destroy');
                $(this).find('img').zoom({
                    url: $(this).find('img').attr('src')
                });
            },
            function() {
                $(this).find('img').trigger('zoom.destroy');
                $(this).find('img').zoom();
            }
        );
    });
    </script>

</body>

</html>