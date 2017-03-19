<?php
$product = get_post(get_query_var('post'));
$image = get_field('product_image', $product);
$image_final = wp_get_attachment_image_url($image['id'], 'larges');
if (!session_id()) {
    session_start();
}
?>
<html data-livestyle-extension="available" class="">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="utf-8">
    <title>Доставка суши, пиццы Алматы</title>
    <meta name="fb_admins_meta_tag" content="">
    <link rel="shortcut icon" href="https://static.wixstatic.com/media/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png" type="image/png">
    <link rel="apple-touch-icon" href="https://static.wixstatic.com/media/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png" type="image/png">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <!-- <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Anton:n,b,i,bi|Basic:n,b,i,bi|Caudex:n,b,i,bi|Chelsea+Market:n,b,i,bi|Corben:n,b,i,bi|EB+Garamond:n,b,i,bi|Enriqueta:n,b,i,bi|Forum:n,b,i,bi|Fredericka+the+Great:n,b,i,bi|Jockey+One:n,b,i,bi|Josefin+Slab:n,b,i,bi|Jura:n,b,i,bi|Kelly+Slab:n,b,i,bi|Marck+Script:n,b,i,bi|Lobster:n,b,i,bi|Mr+De+Haviland:n,b,i,bi|Niconne:n,b,i,bi|Noticia+Text:n,b,i,bi|Overlock:n,b,i,bi|Patrick+Hand:n,b,i,bi|Play:n,b,i,bi|Sarina:n,b,i,bi|Signika:n,b,i,bi|Spinnaker:n,b,i,bi|Monoton:n,b,i,bi|Sacramento:n,b,i,bi|Cookie:n,b,i,bi|Raleway:n,b,i,bi|Open+Sans+Condensed:300:n,b,i,bi|Amatic+SC:n,b,i,bi|Cinzel:n,b,i,bi|Sail:n,b,i,bi|Playfair+Display:n,b,i,bi|Libre+Baskerville:n,b,i,bi|&amp;subset=latin-ext,cyrillic,japanese,korean,arabic,hebrew,latin" id="font_googleFonts"> -->
    <link rel="stylesheet" href="https://static.parastorage.com/services/santa-resources/resources/viewer/user-site-fonts/v3/languages.css" id="font_langauges">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
    <meta name="description" content="Вкусная корейская, японская и европейская кухня. Доставка по Алматы бесплатная.">
    <meta name="keywords" content="заказать пиццу, заказать суши, доставка пиццы, доставка суши, доставка еды, заказать еду, корейские блюда, заказать роллы">
    <meta property="og:title" content="Доставка суши, пиццы Алматы">
    <meta property="og:url" content="https://www.riscafe.com">
    <meta property="og:description" content="Вкусная корейская, японская и европейская кухня. Доставка по Алматы бесплатная.">
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/scripts/scripts.js"></script>
</head>

<body class="">
<div id="site_container">
    <div class="site_wrapper">
        <div class="container">
            <?=get_header()?>
        </div>
    </div>
    <div class="site_wrapper">
        <div class="container">
            <div class="main-content white-bg">

                <h1>Моя корзина (<span class="card-count"></span>)</h1>
                <?php if (!empty($_SESSION['card'])):?>
                <table class="cart-table">
                    <tr>
                        <th>товар</th>
                        <th>наименование</th>
                        <th>количество</th>
                        <th>итого</th>
                    </tr>
                    <?php foreach ($_SESSION['card'] as $id => $count):?>
                        <?php
                        $product = get_post($id);
                        $image = get_field('product_image', $product);
                        $image_final = wp_get_attachment_image_url($image['id'], 'small');
                        ?>
                        <tr>
                            <td>
                                <a href="">
                                    <img src="<?=$image_final?>" alt="" class="cart-image">
                                </a>
                            </td>
                            <td>
                                <p class="cart-item-title"><?=$product->post_title?></p>
                                <span>Цена: ₸<?=get_field('product_price', $product)?></span>
                                <a href="" class="remove-link">Удалить из корзины</a>
                            </td>
                            <td>
                                <div class="opt-quontity">
                                    <span class="quont-minus btn">-</span>
                                    <input type="text" value="1">
                                    <span class="quont-plus btn">+</span>
                                </div>
                            </td>
                            <td class="for-one-position">₸<span></span></td>
                        </tr>
                    <?php endforeach;?>
                </table>
                <?php endif;?>
                <div class="cart-info">
                    <div class="cart-comment-block">
                        <a href="" class="add-comment">Добавить комментарий</a>
                        <form class="comment-form" action="">
                            <textarea name="" id="" cols="30" rows="6"></textarea>
                            <a href="" class="cancel-comment white-button">Отменить</a>
                            <input type="submit" class="red-button" value="Готово">
                        </form>
                    </div>
                    <div class="cart-amount-block">
                        Сумма: <span>₸21,970 </span>
                        <div class="cart-note">Бесплатная доставка при заказе на сумму от 3 000 тенге.</div>
                        <a href="" class="red-button pull-right">Оформить заявку</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?=get_footer()?>
</div>
</body>
</html>
