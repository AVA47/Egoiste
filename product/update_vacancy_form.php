<?php
include '../core.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $vacancyId = $_GET['id'];
    $sql = "SELECT * FROM `vakan` WHERE `id` = $vacancyId";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        $vacancy = $result->fetch_assoc(); // Получить данные о вакансии для формы изменения
    } else {
        echo "Вакансия не найдена.";
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
        if (isset($_SESSION['error_message1'])) {
            echo '<div class="error-message">' . $_SESSION['error_message1'] . '</div>';
            unset($_SESSION['error_message1']);
        }
        ?>
        <form action="update_vacancy_process.php" method="post">
            <div class="main-admin-block-inputs" id="update_Vacancy">
                <div class="main-admin-block-inputs-block">
                    <div class="main-admin-block__p_h">
                        <p>Изменение вакансии</p>
                    </div>
                </div>

                <div class="main-admin-block-right">
                    <input type="hidden" name="id" value="<?php echo $vacancy['id']; ?>">
                    <div class="main-admin-block__input-name">
                        <input type="text" name="name" required placeholder="Название"
                            value="<?php echo $vacancy['name']; ?>">
                    </div>
                    <div class="main-admin-block-right-cost">
                        <input type="text" name="zp" required placeholder="Зарплата"
                            value="<?php echo $vacancy['zp']; ?>">
                    </div>
                    <div class="main-admin-block-right__textarea">
                        <textarea name="description" required
                            placeholder="Описание"><?php echo $vacancy['descriptions']; ?></textarea>
                    </div>
                    <div class="main-admin-block-right-updateVacancy">
                        <input type="submit" name="update_vacancy" value="Изменить вакансию">
                    </div>
                </div>
            </div>
        </form>
    </body>

</html>