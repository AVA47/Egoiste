<?php
session_start();
include '../core.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $vacancyId = $_GET['id'];
    $sql = "DELETE FROM `vakan` WHERE `id` = $vacancyId";
    if ($link->query($sql) === TRUE) {
        $_SESSION['success_message1'] = "Вакансия успешно удалена.";
    } else {
        $_SESSION['error_message1'] = "Ошибка при удалении вакансии: " . $link->error;
    }
    header("Location: admin_panel.php");
    exit();
} else {
    $_SESSION['error_message1'] = "Неверный запрос.";
    header("Location: admin_panel.php");
    exit();
}