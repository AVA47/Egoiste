<?php
session_start();
include '../core.php';

if (isset($_POST['update_vacancy'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $zp = $_POST['zp'];
    $description = $_POST['description'];

    // Подготовка SQL запроса для обновления данных вакансии
    $sql = "UPDATE `vakan` SET `name`=?, `zp`=?, `descriptions`=? WHERE `id`=?";

    // Подготовка и выполнение подготовленного выражения
    $stmt = $link->prepare($sql);
    $stmt->bind_param("sssi", $name, $zp, $description, $id);

    if ($stmt->execute()) {
        // Если запрос выполнен успешно, установить сообщение об успехе
        $_SESSION['success_message1'] = "Вакансия успешно обновлена.";
        header("Location: admin_panel.php"); // Редирект на форму с обновленными данными
        exit();
    } else {
        // Если произошла ошибка при выполнении запроса, установить сообщение об ошибке
        $_SESSION['error_message1'] = "Ошибка при обновлении вакансии: " . $link->error;
        header("Location: admin_panel.php"); // Редирект на форму с обновленными данными
        exit();
    }
} else {
    // Если форма была отправлена без соответствующего параметра, перенаправить пользователя
    $_SESSION['error_message1'] = "Неверный запрос.";
    header("Location: admin_panel.php");
    exit();
}