<?php
session_start();

include '../core.php';

function addVacancyToDatabase($name, $zp, $description)
{
    global $link;

    $sql = "INSERT INTO `vakan` (`name`, `zp`, `descriptions`) VALUES (?, ?, ?)";

    $stmt = $link->prepare($sql);
    $stmt->bind_param("sss", $name, $zp, $description);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['add_vacancy'])) {
    $name = $_POST['name'];
    $zp = $_POST['zp'];
    $description = $_POST['description'];

    if (addVacancyToDatabase($name, $zp, $description)) {
        $_SESSION['success_message1'] = "Вакансия успешно добавлена.";
    } else {
        $_SESSION['error_message1'] = "Ошибка при добавлении вакансии: " . $link->error;
    }
}

header("Location: admin_panel.php");
exit();