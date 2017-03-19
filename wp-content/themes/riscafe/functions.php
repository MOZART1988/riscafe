<?php

add_action('init', 'session_begin', 1);
add_action('wp_logout', 'session_end');
add_action('wp_login', 'session_end');

function session_begin() {
    if(!session_id()) {
        session_start();
    }
}

function session_end() {
    session_destroy ();
}

function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

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
        <link rel="stylesheet" href="'.esc_url( get_template_directory_uri() ).'/styles/style.css">
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
        <script src="'.esc_url( get_template_directory_uri() ).'/scripts/scripts.js"></script>
    </head>
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
        $result[] = '<a href="' . get_post_permalink($product->id) . '"><img src="'.$image_final.'" alt=""></a>';
        $result[] = '<a href="' . get_post_permalink($product->id) . '" class="category-menu-link">'.$product->post_title.' ></a>';
        $result[] = '<span class="item-price">₸'.get_field('product_price', $product).'</span>';
        $result[] = '<a href="" class="addtocart-black" data-id="'.$product->ID.'">в корзину</a>';
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