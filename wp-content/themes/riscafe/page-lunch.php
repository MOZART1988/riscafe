<?php
$product = get_post(get_query_var('post'));
$image = get_field('product_image', $product);
$image_final = wp_get_attachment_image_url($image['id'], 'large');
?>
<html data-livestyle-extension="available" class="">
<?=render_head()?>

<body class="">
<?=render_body_gtm()?>
<div id="site_container">
    <div class="site_wrapper">
        <div class="container">
            <?=get_header()?>
        </div>

    </div>
    <?=generate_slider()?>
    <div class="site_wrapper">
        <div class="container">
            <div class="main-content">
                <h2>ПОПРОБУЙТЕ НАШЕ МЕНЮ</h2>
                <div class="category-block">
                    <div class="lanch-menu-item">
                        <div class="lanch-title">Понедельник</div>
                        <p>Первое</p>
                        <ul>
                            <li>Суп лапша с курицей</li>
                            <li>Суп гречневый</li>
                        </ul>
                        <p>Второе</p>
                        <ul>
                            <li>Удон с говядиной</li>
                            <li>Крылышки буфало</li>
                            <li>Картофельные ломтики</li>
                        </ul>
                        <p>Салаты/закуски</p>
                        <ul>
                            <li>Салат с цветной капустой   и майонезом</li>
                            <li>Овощной микс</li>
                        </ul>
                        <p>Десерт</p>
                        <ul>
                            <li>Торт зебра</li>
                        </ul>
                    </div>
                    <div class="lanch-menu-item">
                        <div class="lanch-title">Вторник</div>
                        <p>Первое</p>
                        <ul>
                            <li>Картофельный суп с копченостями</li>
                            <li>Суп с редькой - по корейски</li>
                        </ul>
                        <p>Второе</p>
                        <ul>
                            <li>Мясо в фольге</li>
                            <li>Хе из курицы</li>
                            <li>Рис</li>
                        </ul>
                        <p>Салаты/закуски</p>
                        <ul>
                            <li>Салат японский</li>
                            <li>Роллы</li>
                        </ul>
                        <p>Десерт</p>
                        <ul>
                            <li>Панкейки</li>
                        </ul>
                    </div>
                    <div class="lanch-menu-item">
                        <div class="lanch-title">Среда</div>
                        <p>Первое</p>
                        <ul>
                            <li>Сырный суп</li>
                            <li>Суп с клецками</li>
                        </ul>
                        <p>Второе</p>
                        <ul>
                            <li>Гуляш</li>
                            <li>Курица в уляре</li>
                            <li>Макароны</li>
                            <li>Сложный гарнир</li>
                        </ul>
                        <p>Салаты/закуски</p>
                        <ul>
                            <li>Свекла с майонезом</li>
                            <li>Нисуаз с рыбной консервой</li>
                        </ul>
                        <p>Десерт</p>
                        <ul>
                            <li>Пирог яблочный</li>
                        </ul>
                    </div>
                    <div class="lanch-menu-item">
                        <div class="lanch-title">Четверг</div>
                        <p>Первое</p>
                        <ul>
                            <li>Уха по-японски</li>
                            <li>Суп грибной</li>
                        </ul>
                        <p>Второе</p>
                        <ul>
                            <li>Гуйру лагман</li>
                            <li>Котлеты по-домашнему</li>
                            <li>Гарнир</li>
                        </ul>
                        <p>Салаты/закуски</p>
                        <ul>
                            <li>Селедка под шубой</li>
                            <li>Витаминный</li>
                        </ul>
                        <p>Десерт</p>
                        <ul>
                            <li>Булочки</li>
                        </ul>
                    </div>
                    <div class="lanch-menu-item">
                        <div class="lanch-title">Пятница</div>
                        <p>Первое</p>
                        <ul>
                            <li>Суп гороховый с копченостями</li>
                            <li>Кукси</li>
                        </ul>
                        <p>Второе</p>
                        <ul>
                            <li>Пигодя дрожжевые</li>
                            <li>Чахохбили из курицы</li>
                            <li>Рис</li>
                        </ul>
                        <p>Салаты/закуски</p>
                        <ul>
                            <li>Микс с курицей</li>
                            <li>Роллы</li>
                        </ul>
                        <p>Десерт</p>
                        <ul>
                            <li>Муравейник</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?=get_footer()?>
</div>
</body>

</html>
