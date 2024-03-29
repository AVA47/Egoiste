<?php
session_start();

include 'core.php';

function addProductToDatabase($name, $price, $obrabotka, $roasting, $flavor, $description, $img)
{
    global $link;

    $sql = "INSERT INTO `products` (`name`, `price`, `obrabotka`, `roasting`, `flavor`, `descriptions`, `img`) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $link->prepare($sql);
    $stmt->bind_param("sssssss", $name, $price, $obrabotka, $roasting, $flavor, $description, $img);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $obrabotka = $_POST['obrabotka'];
    $roasting = $_POST['roasting'];
    $flavor = $_POST['flavor'];
    $description = $_POST['description'];

    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $img_name = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];

        $img_path = 'assets/img/' . $img_name;
        if (move_uploaded_file($img_tmp, $img_path)) {
            if (addProductToDatabase($name, $price, $obrabotka, $roasting, $flavor, $description, $img_path)) {
                $_SESSION['success_message'] = "Товар успешно добавлен в базу данных.";
            } else {
                $_SESSION['error_message'] = "Ошибка при добавлении товара: " . $link->error;
            }
        } else {
            $_SESSION['error_message'] = "Ошибка при перемещении изображения товара.";
        }
    } else {
        $_SESSION['error_message'] = "Ошибка при загрузке изображения товара.";
    }
}

header("Location: product/admin_panel.php");
exit();
