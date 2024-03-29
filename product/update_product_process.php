<?php
session_start();

include '../core.php';

function updateProduct($link, $productId, $name, $price, $description, $obrabotka, $roasting, $flavor, $img)
{
    $sql = "UPDATE `products` SET `name` = ?, `price` = ?, `obrabotka` = ?, `roasting` = ?, `flavor` = ?, `descriptions` = ?";

    // Если изображение было загружено, обновляем его в запросе
    if (!empty($img)) {
        $sql .= ", `img` = ?";
    }

    $sql .= " WHERE `id` = ?";

    $stmt = $link->prepare($sql);

    // Если изображение было загружено, привязываем его к параметрам
    if (!empty($img)) {
        $stmt->bind_param("sssssssi", $name, $price, $obrabotka, $roasting, $flavor, $description, $img, $productId);
    } else {
        $stmt->bind_param("ssssssi", $name, $price, $obrabotka, $roasting, $flavor, $description, $productId);
    }

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Товар с ID $productId успешно обновлен.";
    } else {
        $_SESSION['error_message'] = "Ошибка при обновлении товара: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateProduct'])) {
    $productId = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $obrabotka = $_POST['obrabotka'];
    $roasting = $_POST['roasting'];
    $flavor = $_POST['flavor'];
    $description = $_POST['description'];

    // Проверяем, загружено ли новое изображение
    if (!empty($_FILES['img']['name'])) {
        $img_name = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];
        $img_path = '../assets/img/' . $img_name;

        if (move_uploaded_file($img_tmp, $img_path)) {
            updateProduct($link, $productId, $name, $price, $description, $obrabotka, $roasting, $flavor, $img_path);
        } else {
            $_SESSION['error_message'] = "Ошибка при перемещении изображения товара.";
        }
    } else {
        // Если изображение не было изменено, обновляем без изменения изображения
        updateProduct($link, $productId, $name, $price, $description, $obrabotka, $roasting, $flavor, null);
    }

    header("Location: admin_panel.php");
    exit();
} else {
    header("Location: admin_panel.php");
    exit();
}