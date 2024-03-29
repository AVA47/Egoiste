<footer id="footer">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">

                    <div class="companyinfo">
                        <h2><b><span>E</span>GOISTE</b></h2>
                        <p><b>Кофе от 69 руб.</b>
                            <br>
                            Любимые напитки, эклеры, круассаны, сэндвичи и десерты.
                        </p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <div class="asd">
                            <h2>О нас</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Кофе с собой</a></li>
                                <li><a href="#">Еда навынос</a></li>
                                <li><a href="#">Оплата картой</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <div class="asd">
                            <h2>Оставьте нам сообщение</h2>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Ваше Имя" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Ваш Email" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Ваше сообщение" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                            </form>
                        </div>
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
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Авласенок А.В. © 2024 || Egoiste</p>
            </div>
        </div>
    </div>
</footer>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
<script src="js/main1.js"></script>