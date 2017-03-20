<html data-livestyle-extension="available" class="">
<?=render_head()?>
<body class="">
<?=render_body_gtm()?>
<div id="site_container">
    <div class="site_wrapper">
        <div class="container">
            <?php get_header() ?>
        </div>
    </div>
    <?=generate_slider()?>
    <div class="site_wrapper">
        <div class="container">
            <div class="main-content">
                <h2>Попробуйте наше меню</h2>

                <?php foreach(get_categories(['hide_empty'=>0]) as $category):?>
                    <?php if (get_field('show_on_mainpage', $category)): ?>
                        <?=riscafe_category_item($category)?>
                    <?php endif;?>
                <?php endforeach; ?>
                <div class="menu-item">
                    <a href="/lunch/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/lunch.jpg" alt=""></a>
                    <a href="/lunch/" class="menu-item--link">Бизнес ланчи ></a>
                </div>
            </div>
        </div>
    </div>
    <?php get_footer()?>
</div>

</body>

</html>