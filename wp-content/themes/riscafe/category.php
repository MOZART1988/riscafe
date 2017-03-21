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
    <?=generate_slider()?>
    <div class="site_wrapper">
        <div class="container">
            <div class="main-content">
                <h2><?=get_category(get_query_var('cat'))->name;?></h2>
                <?php if ( has_term_have_children( get_category(get_query_var('cat'))->cat_ID)):?>
                    <?php $categories = get_categories(['child_of'=>get_category(get_query_var( 'cat' ) )->cat_ID, 'hide_empty'=>false]);?>
                    <?php foreach($categories as $category):?>
                        <?=riscafe_category_item($category)?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="category-block">
                    <?php $category = get_category(get_query_var( 'cat' ) );?>
                    <?php $products = get_posts(['category'=>$category->term_id, 'posts_per_page'=>'-1', 'order'=>'ASC']);?>
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
