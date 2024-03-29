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
                                <li><a href="#">Контакты</a></li>
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
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-info">
                        <h2>Свяжитесь с нами</h2>
                        <p>Мы всегда готовы ответить на ваши вопросы и предоставить необходимую информацию.</p>
                        <ul>
                            <li><i class="fa fa-map-marker"></i> Адрес: ул. Кофейная, 123, Город</li>
                            <li><i class="fa fa-phone"></i> Телефон: +7 (123) 456-7890</li>
                            <li><i class="fa fa-envelope"></i> Электронная почта: info@egoiste-cafe.com</li>
                        </ul>
                    </div>
                </div>
                <?php
                session_start();
                require "core.php";

                // Проверяем, была ли отправлена форма и авторизирован ли пользователь
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!isset($_SESSION['user'])) {
                        echo "Авторизуйтесь, чтобы отправить сообщение";
                        exit; // Прерываем выполнение скрипта
                    }

                    // Получаем тип пользователя
                    $user_type = $_SESSION['user']['type'];

                    // Проверяем тип пользователя
                    if ($user_type == 1) {
                        echo "Права есть только у обычного пользователя, ВЫ - администратор";
                        exit; // Прерываем выполнение скрипта
                    }

                    // Получаем данные из формы
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $message = $_POST['message'];

                    // Подготавливаем SQL-запрос для вставки данных
                    $sql = "INSERT INTO `message` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";

                    // Выполняем SQL-запрос
                    if ($link->query($sql) === TRUE) {
                        echo "Сообщение успешно отправлено";
                    } else {
                        echo "Ошибка: " . $sql . "<br>" . $link->error;
                    }

                    // Закрываем соединение с базой данных
                    $link->close();
                }
                ?>

                <div class="col-md-6">
                    <div class="contact-form">
                        <h2>Оставьте нам сообщение</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Ваше Имя" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Ваш Email" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="Ваше сообщение" rows="4"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                        </form>
                    </div>
                </div>

                <script type="text/javascript" charset="utf-8" async
                    src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7c4335d0214cf0da68e7895ec5fdddf062f03ac6504274d452acafcb7d5fa193&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true">
                </script>
            </div>
        </div>
    </section>
</body>