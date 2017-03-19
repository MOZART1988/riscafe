<?php
$product = get_post(get_query_var('post'));
$image = get_field('product_image', $product);
$image_final = wp_get_attachment_image_url($image['id'], 'large');
?>
<html data-livestyle-extension="available" class="">
<?=render_head()?>

<body class="">
<div id="site_container">
    <div class="site_wrapper">
        <div class="container">
            <?=get_header()?>
        </div>

    </div>
    <div class="cycle-slideshow" data-cycle-timeout=5000 data-cycle-caption-plugin=caption2 data-cycle-overlay-fx-out="slideUp" data-cycle-overlay-fx-in="slideDown">
        <div class="cycle-overlay"></div>
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/slide1.jpg" data-cycle-desc="Стейки, шашалыки, крылышки BBQ">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/slide4.jpg" data-cycle-desc="В день рождения 20% скидка на все">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/slide5.jpg" data-cycle-desc="Суши, роллы и целые сеты">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/slide2.jpg" data-cycle-desc="Вкусгейщая пицца">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/slide3.jpg" data-cycle-desc="При заказе на сумму от 5000 тенге - напиток в подарок">
    </div>
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
