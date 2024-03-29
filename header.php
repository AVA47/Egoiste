<!DOCTYPE html>
<html lang="en">

<head>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Egoiste - Кофе</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/favicon.ico">
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
                                <li><a href="#" class="active">Главная</a></li>
                                <li class="dropdown"><a href="about.php">О нас</a></li>
                                <li class="dropdown"><a href="#">Товар<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Чай</a></li>
                                        <li><a href="#">Кофе</a></li>
                                        <li><a href="#">Какао</a></li>
                                        <li><a href="#">Еда</a></li>
                                    </ul>
                                </li>
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