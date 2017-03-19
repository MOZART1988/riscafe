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
                <h2><?=get_category(get_query_var('cat'))->name;?></h2>
                <?php if ( has_term_have_children( get_category(get_query_var('cat'))->cat_ID)):?>
                    <?php $categories = get_categories(['child_of'=>get_category(get_query_var( 'cat' ) )->cat_ID, 'hide_empty'=>false,'orderby' => 'id', 'order' => ASC]);?>
                    <?php foreach($categories as $category):?>
                        <?=riscafe_category_item($category)?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="category-block">
                    <?php $category = get_category(get_query_var( 'cat' ) );?>
                    <?php $products = get_posts(['category'=>$category->term_id, 'posts_per_page'=>'50', 'order'=>'ASC']);?>
                    <?php foreach ($products as $product): setup_postdata($product)?>
                        <?=riscafe_product_item($product)?>
                    <?php endforeach;?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?=get_footer()?>
</div>
</body>

</html>
