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
                <?php
                    $categories = get_categories(['hide_empty'=>0, 'child_of'=>get_category_by_slug('mainpage-category')->term_id]);
                    foreach($categories as $category) {
                        echo riscafe_category_item($category);
                    }

                ?>
            </div>
        </div>
    </div>
    <?php get_footer()?>
</div>

</body>

</html>