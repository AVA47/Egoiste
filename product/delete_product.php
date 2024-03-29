<?php

session_start();
include '../core.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $productId = $_GET['id'];
    $sql = "DELETE FROM `products` WHERE `id` = $productId";
    if ($link->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Товар успешно удален.";
    } else {
        $_SESSION['error_message'] =  "Ошибка при удалении товара: " . $link->error;
    }
    header("Location: admin_panel.php");
    exit();
} else {
    $_SESSION['error_message1'] = "Неверный запрос.";
    header("Location: admin_panel.php");
    exit();
}