<?php
session_start();
include 'header_admin.php';
if (!$_SESSION['user']) {
    header('Location: ../function/auto.php');
}
if ($_SESSION['products']) {
    header('Location: admin_panel.php');
}
?>
<main class="main">
    <form action="../add_product_process.php" method="post" enctype="multipart/form-data" novalidate>
        <div class="main-admin-block-inputs" id="add_Tovar">
            <div class="main-admin-block-inputs-block">
                <div class="main-admin-block__p_h">
                    <p>Добавление товара</p>
                </div>
            </div>

            <div class="main-admin-block-right">
                <div class="main-admin-block__input-name">
                    <input type="text" name="name" required placeholder="Название">
                </div>
                <div class="main-admin-block-right-cost">
                    <input type="text" name="price" required placeholder="Цена" id="cost">
                </div>
                <div class="main-admin-block__input-obrabotka">
                    <input type="text" name="obrabotka" required placeholder="Способ обработки">
                </div>
                <div class="main-admin-block__input-roasting">
                    <input type="text" name="roasting" required placeholder="Обжарка">
                </div>
                <div class="main-admin-block__input-flavor">
                    <input type="text" name="flavor" required placeholder="Вкусовой профиль">
                </div>
                <div class="main-admin-block-right__textarea">
                    <textarea name="description" required id="description" placeholder="Описание"
                        name="descriptions"></textarea>
                </div>
                <div class="main-admin-block-right-img__p">
                    <p>Изображения</p>
                </div>
                <div class="main-admin-block-right-img__input">
                    <input type="file" name="img" required id="img__file">
                </div>
                <div class="main-admin-block-right-addTovar">
                    <input type="submit" name="add_product" value="Добавить товар">
                </div>
            </div>
            <div class="message">
                <?php
                if (isset($_SESSION['success_message'])) {
                    echo '<p class="good">' . $_SESSION['success_message'] . '</p>';
                    unset($_SESSION['success_message']); // Очищаем сессию после вывода сообщения
                }
                if (isset($_SESSION['error_message'])) {
                    echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']); // Очищаем сессию после вывода сообщения
                }
                ?>
            </div>
        </div>
    </form>
    <br>
    <br>
    <br>
    <div class="main-admin-block-inputs">
        <div class="main-admin-block-inputs-block">
            <div class="main-admin-block__p_h">
                <p>Таблица товаров</p>
            </div>
        </div>

        <div class="main-admin-block-right">
            <table>
                <thead>
                    <tr>
                        <th style="color: black;">ID товара</th>
                        <th style="color: black;">Название товара</th>
                        <th style="color: black;">Изменить</th>
                        <th style="color: black;">Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../core.php';
                    $sql = "SELECT `id`, `name` FROM `products`";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $productId = $row['id'];
                            $productName = $row['name'];
                            echo "<tr>";
                            echo "<td>$productId</td>";
                            echo "<td>$productName</td>";
                            echo "<td><a href='update_product_form.php?id=$productId'>Изменить</a></td>";
                            echo "<td><a href='delete_product.php?id=$productId'>Удалить</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
    <br>
    <form action="add_vacancy_process.php" method="post">
    <div class="main-admin-block-inputs" id="add_Vacancy">
        <div class="main-admin-block-inputs-block">
            <div class="main-admin-block__p_h">
                <p>Добавление вакансии</p>
            </div>
        </div>

        <div class="main-admin-block-right">
            <div class="main-admin-block__input-name">
                <input type="text" name="name" required placeholder="Название">
            </div>
            <div class="main-admin-block-right-cost">
                <input type="text" name="zp" required placeholder="Зарплата">
            </div>
            <div class="main-admin-block-right__textarea">
                <textarea name="description" required placeholder="Описание"></textarea>
            </div>
            <div class="main-admin-block-right-addVacancy">
                <input type="submit" name="add_vacancy" value="Добавить вакансию">
            </div>
        </div>
        <div class="message">
            <?php
            if (isset($_SESSION['success_message1'])) {
                echo '<p class="good">' . $_SESSION['success_message1'] . '</p>';
                unset($_SESSION['success_message1']); // Очищаем сессию после вывода сообщения
            }
            if (isset($_SESSION['error_message1'])) {
                echo '<p class="error">' . $_SESSION['error_message1'] . '</p>';
                unset($_SESSION['error_message1']); // Очищаем сессию после вывода сообщения
            }
            ?>
        </div>
    </div>
</form>
    <br>
    <br>
    <br>
    <div class="main-admin-block-inputs">
        <div class="main-admin-block-inputs-block">
            <div class="main-admin-block__p_h">
                <p>Таблица вакансий</p>
            </div>
        </div>

        <div class="main-admin-block-right">
            <table>
                <thead>
                    <tr>
                        <th style="color: black;">ID вакансии</th>
                        <th style="color: black;">Название вакансии</th>
                        <th style="color: black;">Зарплата</th>
                        <th style="color: black;">Описание</th>
                        <th style="color: black;">Изменить</th>
                        <th style="color: black;">Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../core.php';
                    $sql = "SELECT * FROM `vakan`";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $vacancyId = $row['id'];
                            $vacancyName = $row['name'];
                            $zp = $row['zp'];
                            $description = $row['descriptions'];
                            echo "<tr>";
                            echo "<td>$vacancyId</td>";
                            echo "<td>$vacancyName</td>";
                            echo "<td>$zp</td>";
                            echo "<td>$description</td>";
                            echo "<td><a href='update_vacancy_form.php?id=$vacancyId'>Изменить</a></td>";
                            echo "<td><a href='delete_vacancy.php?id=$vacancyId'>Удалить</a></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script>
const btnUp = {
    el: document.querySelector('.btn-up'),
    show() {
        this.el.classList.remove('btn-up_hide');
    },
    hide() {
        this.el.classList.add('btn-up_hide');
    },
    addEventListener() {
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY || document.documentElement.scrollTop;
            scrollY > 400 ? this.show() : this.hide();
        });
        document.querySelector('.btn-up').onclick = () => {
            window.scrollTo({
                top: 0,
                left: 0,
                behavior: 'smooth'
            });
        }
    }
}
btnUp.addEventListener();
</script>
</body>

</html>