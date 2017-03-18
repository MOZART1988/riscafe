<?php

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
        $result[] = '<a href="' . get_post_embed_url($product) . '"><img src="'.$image_final.'" alt=""></a>';
        $result[] = '<a href="' . get_post_embed_url($product) . '" class="category-menu-link">'.$product->post_title.' ></a>';
        $result[] = '<span class="item-price">₸'.get_field('product_price', $product).'</span>';
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