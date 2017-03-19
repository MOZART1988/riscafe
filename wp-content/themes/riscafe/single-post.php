<?php
$product = get_post(get_query_var('post'));
$image = get_field('product_image', $product);
$image_final = wp_get_attachment_image_url($image['id'], 'large');
?>
<html data-livestyle-extension="available" class="">
<?=render_head()?>

<body class="">
<div id="site_container">
    <div class="site_wrapper">
        <div class="container">
            <?=get_header()?>
        </div>

    </div>
    <div class="site_wrapper">
        <div class="container">
            <div class="main-content white-bg">
                <div class="product-image">
                    <img src="<?=$image_final?>" alt="">
                </div>
                <div class="product-info">
                    <h1><?=$product->post_title?></h1>
                    <div class="product-price">₸<?=get_field('product_price', $product)?></div>
                    <p><?=$product->post_content?></p>
                    <div class="product-amount">
                        <span>Количество</span>
                        <select name="" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>

                    <a href="#add_to_card" data-id="<?=$product->ID?>" class="add-to-cart add-card">Добавить в корзину</a>
                </div>
            </div>
        </div>
    </div>
    <?=get_footer()?>
</div>
</body>

</html>
