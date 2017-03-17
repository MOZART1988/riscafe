<?php
$category = get_category(get_query_var('cat'));
$subs = get_term_children(get_term($category)->term_id, 'category');
?>
<html data-livestyle-extension="available" class="">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="utf-8">
    <title>Доставка суши, пиццы Алматы</title>
    <meta name="fb_admins_meta_tag" content="">
    <link rel="shortcut icon" href="https://static.wixstatic.com/media/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png" type="image/png">
    <link rel="apple-touch-icon" href="https://static.wixstatic.com/media/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png" type="image/png">
    <link rel="stylesheet" href="<?=esc_url( get_template_directory_uri() ); ?>/style.css">
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
</head>
<body class="">
<div id="site_container">
    <div class="site_wrapper">
        <div class="container">
            <?php get_header() ?>
        </div>
    </div>
    <div class="cycle-slideshow" data-cycle-timeout=5000 data-cycle-caption-plugin=caption2 data-cycle-overlay-fx-out="slideUp" data-cycle-overlay-fx-in="slideDown">
        <div class="cycle-overlay"></div>
        <img src="http://malsup.github.io/images/p2.jpg" data-cycle-title="Spring" data-cycle-desc="Sonnenberg Gardens">
        <img src="http://malsup.github.io/images/p3.jpg" data-cycle-title="ewrwr" data-cycle-desc="wrwerer Gardens">
        <img src="http://malsup.github.io/images/p4.jpg" data-cycle-title="Sp34234234ring" data-cycle-desc="kiukukyik Gardens">
    </div>
    <div class="site_wrapper">
        <div class="container">
            <?php if ($subs):?>
                <div class="main-content">
                    <h2><?=$category->name?></h2>
                    <?php foreach($subs as $category):?>
                        <?=riscafe_category_item($category);?>
                    <?php endforeach;?>
                </div>
            <?php else : ?>
            <?php endif; ?>

        </div>
    </div>
    <?php get_footer()?>
</div>

</body>

</html>