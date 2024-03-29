<?php
session_start();
require "core.php";

// Выполните запрос на получение списка вакансий
$sql = "SELECT * FROM vakan";
$vacancy_query = mysqli_query($link, $sql);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Egoiste - Контакты</title>
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
                                <li><a href="about.php">О нас</a></li>
                                <li><a href="index.php#tovar">Товары</a></li>
                                <li><a href="contact.php">Контакты</a></li>
                                <li><a href="#.php">Вакансии</a></li>
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
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <?php while ($vacancy = mysqli_fetch_assoc($vacancy_query)) : ?>
            <!-- Вывод информации о каждой вакансии -->
            <div class="col-sm-4">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <h2><?= $vacancy['name'] ?></h2>
                        <p>Зарплата: от <?= $vacancy['zp'] ?> руб/месяц</p>
                        <a href="contact.php" class="btn btn-default add-to-cart">Перейти к контактам</a>
                    </div>
                </div>
            </div>
            <?php endwhile ?>

            <?php mysqli_close($link); ?>
        </div>
    </div>