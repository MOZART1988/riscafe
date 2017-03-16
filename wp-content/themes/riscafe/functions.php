<?php

if ( ! function_exists( 'riscafe_category_item' ) ) :
    function riscafe_category_item($category) {
        $result = [];
        $result[] = '<div class="menu-item">';
        $result[] = '<a href="'.get_term_link($category).'"><img src="'.z_taxonomy_image_url(get_term($category)->term_id).'" alt="">';
        $result[] = '<a href="'.get_term_link($category).'" class="menu-item--link">'.$category->name.' ></a>';
        $result[] = '</div>';

        return join("\n", $result);
    }
endif;
