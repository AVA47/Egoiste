<?
session_start();
require "core.php";
$sql = "SELECT * FROM products";
$product_query = mysqli_query($link, $sql);
?>

<? include 'header.php' ?>
<br>
<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><b><span>E</span>GOISTE</b></h1>
                                <h2>Кофе с собой</h2>
                                <p>«Сладкая еда — это главный источник позитивных эмоций», — рассказывает Женя
                                    Шпехт, — «Так уж устроен наш организм с детства! Нам всем нравится сладкое.
                                    Сладкие продукты — это зачастую быстро усваиваемые углеводы (читайте: быстрый
                                    источник нашей энергии).</p>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/barista2.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><b><span>E</span>GOISTE</b></h1>
                                <h2>Еда на вынос</h2>
                                <p>Существует огромное количество источников, из которых мы достаем или с помощью
                                    которых получаем заветную сладость, дополняя ею другие базовые вкусы. Источники
                                    эти очень разные и оказывают они разное влияние на нас с вами. В этой статье я
                                    расскажу как раз о них.</p>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar" style="margin-bottom: 30px;">
                    <h2>Товары</h2>
                    <div class="panel-group category-products2" id="accordian">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Чай</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Кофе</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Какао</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Коктели</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">Еда с собой</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-sidebar">
                    <h2>Информация</h2>
                    <div class="panel-group category-products2" id="accordian">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="about.php#our-products">Наше продукция</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="about.php#slider-carousel1">Наша команда</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="left-sidebar">
                    <h2>Популярное</h2>
                </div>
                <div class="features_items" id="tovar">
                    <?php while ($product = mysqli_fetch_assoc($product_query)) : ?>
                    <div class="col-sm-4">
                        <br>
                        <div class="single-products">
                            <div class="product-image-wrapper">
                                <div class="productinfo text-center">
                                    <img src="<?= $product['img'] ?>" alt="" />
                                    <h2>от <?= $product['price'] ?> руб</h2>
                                    <p><?= $product['name'] ?></p>
                                    <a href="product/tovar.php?id=<?= $product['id'] ?>"
                                        class="btn btn-default add-to-cart">Заказать на дом</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile ?>

                    <?php
                    // Закрыть соединение с базой данных
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<? include 'footer.php' ?>
</body>

</html>