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
    <div class="site_wrapper">
        <div class="container">
            <div class="main-content white-bg">
                <div class="contacts-text">
                    <h4>Будем рады видеть вас!</h4>
                    <p>В нашем кафе вы по достоинству оцените блюда западной, восточной и корейской кухни</p>
                </div>
                <div class="contacts-info">
                    <p>г. Алматы, улица Ауэзова 118/69, уг. ул. Бухар Жырау</p>
                    <p>Ежедневно 10:00–24:00</p>
                    <table>
                        <tr>
                            <td>Бронирование столиков:</td>
                            <td>8 (727) 275 4688</td>
                            <td>8 (701) 218 7013</td>
                        </tr>
                        <tr>
                            <td>Доставка блюд:</td>
                            <td>8 (727) 275 4426</td>
                            <td>8 (708) 070 9870</td>
                        </tr>
                    </table>
                    <p>Бесплатная доставка при заказе от 3000 тенге в черте города Алматы. </p>
                    <p>За его пределами доставка рассчитывается оператором.</p>
                </div>
                <div class="map-block">
                    <img src="<?=esc_url( get_template_directory_uri() )?>/images/map.png" alt="">
                    <div class="map-item">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A701001fedee7086e26dbf0c6cb2435af0a7b900f58ff5bc2152defa79f9d812f&amp;width=100%&amp;height=348&amp;lang=ru_RU&amp;scroll=true"></script>
                    </div>                    
                </div>
                <div class="ajax-form">
                <form id="feedback-form" class="feedback-form">
                    <input type="text" placeholder="Ваше имя" name="name" required>
                    <input type="email" placeholder="Ваш E-mail" name="email" required>
                    <textarea name="message" required id="" cols="30" rows="10" placeholder="Поле для отзыва. Нам важно ваше мнение"></textarea>
                    <input type="submit" value="отправить" class="red-button">
                </form>
                </div>
            </div>
        </div>
    </div>
    <?=get_footer()?>
</div>
</body>

</html>
