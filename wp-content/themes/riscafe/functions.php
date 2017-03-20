<?php

add_action('init', 'session_begin', 1);
add_action('wp_logout', 'session_end');
add_action('wp_login', 'session_end');

function session_begin()
{
    if (!session_id()) {
        session_start();
    }
}

function session_end()
{
    session_destroy();
}

function wpse27856_set_content_type()
{
    return "text/html";
}

add_filter('wp_mail_content_type', 'wpse27856_set_content_type');

function render_head_gtm()
{
    return '
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':
new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=
\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,\'script\',\'dataLayer\',\'GTM-KGZTJQ2\');</script>
<!-- End Google Tag Manager -->';
}

function render_body_gtm()
{
    return '
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KGZTJQ2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    ';
}

function render_head()
{
    return '
        <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta charset="utf-8">
        <title>Доставка суши, пиццы Алматы</title>
        <meta name="fb_admins_meta_tag" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="https://static.wixstatic.com/media/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png" type="image/png">
        <link rel="apple-touch-icon" href="https://static.wixstatic.com/media/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/eeccb4_d1c2e1000eb74aea97b3e8d6e00035bd%7Emv2.png" type="image/png">
        <link rel="stylesheet" href="' . esc_url(get_template_directory_uri()) . '/styles/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <!-- <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Anton:n,b,i,bi|Basic:n,b,i,bi|Caudex:n,b,i,bi|Chelsea+Market:n,b,i,bi|Corben:n,b,i,bi|EB+Garamond:n,b,i,bi|Enriqueta:n,b,i,bi|Forum:n,b,i,bi|Fredericka+the+Great:n,b,i,bi|Jockey+One:n,b,i,bi|Josefin+Slab:n,b,i,bi|Jura:n,b,i,bi|Kelly+Slab:n,b,i,bi|Marck+Script:n,b,i,bi|Lobster:n,b,i,bi|Mr+De+Haviland:n,b,i,bi|Niconne:n,b,i,bi|Noticia+Text:n,b,i,bi|Overlock:n,b,i,bi|Patrick+Hand:n,b,i,bi|Play:n,b,i,bi|Sarina:n,b,i,bi|Signika:n,b,i,bi|Spinnaker:n,b,i,bi|Monoton:n,b,i,bi|Sacramento:n,b,i,bi|Cookie:n,b,i,bi|Raleway:n,b,i,bi|Open+Sans+Condensed:300:n,b,i,bi|Amatic+SC:n,b,i,bi|Cinzel:n,b,i,bi|Sail:n,b,i,bi|Playfair+Display:n,b,i,bi|Libre+Baskerville:n,b,i,bi|&amp;subset=latin-ext,cyrillic,japanese,korean,arabic,hebrew,latin" id="font_googleFonts"> -->
        <link rel="stylesheet" href="https://static.parastorage.com/services/santa-resources/resources/viewer/user-site-fonts/v3/languages.css" id="font_langauges">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="http://malsup.github.com/jquery.cycle2.js"></script>
        <meta name="description" content="Вкусная корейская, японская и европейская кухня. Доставка по Алматы бесплатная.">
        <meta name="keywords" content="заказать пиццу, заказать суши, доставка пиццы, доставка суши, доставка еды, заказать еду, корейские блюда, заказать роллы">
        <meta property="og:title" content="Доставка суши, пиццы Алматы">
        <meta property="og:url" content="https://www.riscafe.com">
        <meta property="og:description" content="Вкусная корейская, японская и европейская кухня. Доставка по Алматы бесплатная.">
        <script src="' . esc_url(get_template_directory_uri()) . '/scripts/scripts.js"></script>
        ' . render_head_gtm() . '
    </head>
    ';
}

function generate_slider()
{
    return '
    <div class="cycle-slideshow" data-cycle-timeout=5000 data-cycle-caption-plugin=caption2 data-cycle-overlay-fx-out="slideUp" data-cycle-overlay-fx-in="slideDown">
        <div class="cycle-overlay"></div>
        <img src="'.esc_url( get_template_directory_uri() ).'/images/slide1.jpg" data-cycle-desc="Стейки, шашлыки, крылышки BBQ">
        <img src="'.esc_url( get_template_directory_uri() ).'/images/slide4.jpg" data-cycle-desc="В день рождения 20% скидка на все">
        <img src="'.esc_url( get_template_directory_uri() ).'/images/slide5.jpg" data-cycle-desc="Суши, роллы и целые сеты">
        <img src="'.esc_url( get_template_directory_uri() ).'/images/slide2.jpg" data-cycle-desc="Вкуснейшая пицца">
        <img src="'.esc_url( get_template_directory_uri() ).'/images/slide3.jpg" data-cycle-desc="При заказе на сумму от 5000 тенге - напиток в подарок">
    </div>
    ';
}

if (!function_exists('riscafe_category_item')) :
    function riscafe_category_item($category)
    {
        $result = [];
        $result[] = '<div class="menu-item">';
        $result[] = '<a href="' . get_term_link($category) . '"><img src="' . z_taxonomy_image_url($category->term_id, 'medium') . '" alt=""></a>';
        $result[] = '<a href="' . get_term_link($category) . '" class="menu-item--link">' . $category->name . ' ></a>';
        $result[] = '</div>';

        return join("\n", $result);
    }
endif;

if (!function_exists('riscafe_product_item')) :
    function riscafe_product_item($product)
    {
        $image = get_field('product_image', $product);
        $image_final = wp_get_attachment_image_url($image['id'], 'medium');
        $result = [];
        $result[] = '<div class="category-menu-item">';
        $result[] = '<a href="' . get_post_permalink($product) . '"><img src="' . $image_final . '" alt=""></a>';
        $result[] = '<a href="' . get_post_permalink($product) . '" class="category-menu-link">' . $product->post_title . ' </a>';
        $result[] = '<span class="item-price">₸' . get_field('product_price', $product) . '</span>';
        $result[] = '<a href="" class="addtocart-black" data-id="' . $product->ID . '">в корзину</a>';
        $result[] = '</div>';

        return join("\n", $result);
    }
endif;

if (!function_exists('has_term_have_children')):
    function has_term_have_children($term_id = '', $taxonomy = 'category')
    {
        // Check if we have a term value, if not, return false
        if (!$term_id)
            return false;

        // Get term children
        $term_children = get_term_children(filter_var($term_id, FILTER_VALIDATE_INT), filter_var($taxonomy, FILTER_SANITIZE_STRING));

        // Return false if we have an empty array or WP_Error object
        if (empty($term_children) || is_wp_error($term_children))
            return false;

        return true;
    }
endif;