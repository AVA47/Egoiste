<?php
include '../core.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $productId = $_GET['id'];
    $sql = "SELECT * FROM `products` WHERE `id` = $productId";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc(); // Получить данные о товаре для формы изменения
    } else {
        echo "Товар не найден.";
        exit();
    }
} else {
    echo "Неверный запрос.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_admin.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/main1.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <title>Редактор</title>
</head>

<body>
    <header id="header">
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="admin_panel.php"><img src="../images/home/logo назад.png"
                                    style="text-align: center" /></a>
                            <?php
                            if ($_SESSION['user']) {
                                // Если вошел пользователь (любого типа), показываем "Выход"
                                if ($_SESSION['user']['type'] == 1) {
                                    // Если тип пользователя - admin, показываем "Редактор"
                                    echo  "<div class='editor1'> 
							<a href='../function/logout.php'><input type='submit' value='Выйти' style='
								border: 2px solid #fe980f;
								padding: 3px 19px;
								border-radius: 5px;
								background-color: white;
								cursor: pointer;
								margin-left: 7px;
								color: #600c00;
							'></a>
							</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <body>
        <?php
        if (isset($_SESSION['error_message'])) {
            echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']);
        }
        ?>
        <form action="update_product_process.php" method="post" enctype="multipart/form-data">
            <div class="main-admin-block-update" id="update_Tovar">
                <div class="main-admin-update-p">
                    <div class="main-admin-update__p">
                        <p>Обновить товар</p>
                    </div>
                </div>
                <div class="main-admin-block-right">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <div class="main-admin-block__input-name">
                        <input type="text" id="nameUpdate" name="name" placeholder="Новое название"
                            value="<?php echo $product['name']; ?>">
                    </div>
                    <div class="main-admin-block-right-cost">
                        <input type="text" id="costUpdate" name="price" placeholder="Новая цена"
                            value="<?php echo $product['price']; ?>">
                    </div>
                    <div class="main-admin-block__input-obrabotka">
                        <input type="text" id="obrabotkaUpdate" name="obrabotka" placeholder="Новый способ обработки"
                            value="<?php echo $product['obrabotka']; ?>">
                    </div>
                    <div class="main-admin-block__input-roasting">
                        <input type="text" id="roastingUpdate" name="roasting" placeholder="Новый способ обжарки"
                            value="<?php echo $product['roasting']; ?>">
                    </div>
                    <div class="main-admin-block__input-flavor">
                        <input type="text" id="flavorUpdate" name="flavor" placeholder="Новый вкусовой профиль"
                            value="<?php echo $product['flavor']; ?>">
                    </div>
                    <div class="main-admin-block-right__textarea">
                        <textarea name="description" id="descriptionUpdate"
                            placeholder="Новое описание"><?php echo $product['description']; ?></textarea>
                    </div>
                    <div class="main-admin-block-right-img__p">
                        <p>Изображения</p>
                    </div>
                    <div class="main-admin-block-right-img__input">
                        <input type="file" name="img" id="img__file">
                    </div>
                    <div class="main-admin-block-right-addTovar">
                        <input type="submit" name="updateProduct" value="Обновить товар">
                    </div>
        </form>
    </body>

</html>