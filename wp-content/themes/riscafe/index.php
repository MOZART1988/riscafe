<html data-livestyle-extension="available" class="">
<?=render_head()?>
<body class="">
<div id="site_container">
    <div class="site_wrapper">
        <div class="container">
            <?php get_header() ?>
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
                <h2>Попробуйте наше меню</h2>

                <?php foreach(get_categories(['hide_empty'=>0]) as $category):?>
                    <?php if (get_field('show_on_mainpage', $category)): ?>
                        <?=riscafe_category_item($category)?>
                    <?php endif;?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php get_footer()?>
</div>

</body>

</html>