<?php

if ( ! function_exists( 'riscafe_category_item' ) ) :
    function riscafe_category_item($category) {
        $image_id			 = get_product_category_image_id( $category->term_id );
        $thumbnail_product	 = wp_get_attachment_image_src( $image_id, 'medium' );
        $result = [];
        $result[] = '<div class="menu-item">';
        $result[] = '<a href="'.get_term_link($category).'"><img src="'.$thumbnail_product[0].'" alt="">';
        $result[] = '<a href="'.get_term_link($category).'" class="menu-item--link">'.$category->name.' ></a>';
        $result[] = '</div>';

        return join("\n", $result);
    }
endif;
