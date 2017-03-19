<?php
$product = get_post(get_query_var('post'));
$image = get_field('product_image', $product);
$image_final = wp_get_attachment_image_url($image['id'], 'larges');
if (!session_id()) {
    session_start();
}
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
                <?php if (empty($_SESSION['card'])): ?>
                    <h1>Корзина пуста</h1>
                <?php else :?>
                <h1>Оформление заказа</h1>
                <form id="order-form" class="order-form">
                    <div class="form-group">
                        <label for="">Ваши имя и фамилия</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email <span>(мы дорожим вашей конфиденциальностью)</span></label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Улица, № дома, № кв.</label>
                        <input type="text" name="adress" required>
                    </div>
                    <div class="form-group">
                        <label for="">Город</label>
                        <input type="text" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="">Номер телефона</label>
                        <input type="text" name="phone" required>
                    </div>
                    <input type="submit" value="Отправить заказ" class="red-button">
                </form>
                <div class="order-cart">
                    <div class="cart-header">
                        <span>Детали заказа</span>
                        <a href="/card/" class="edit-link">Изменить</a>
                    </div>
                    <?php if (!empty($_SESSION['card'])):?>
                    <div class="cart-body">
                        <?php foreach ($_SESSION['card'] as $id=>$count):?>
                            <?php
                            $product = get_post($id);
                            $image = get_field('product_image', $product);
                            $image_final = wp_get_attachment_image_url($image['id'], 'small');
                            ?>
                            <div class="cart-item">
                                <div class="cart-item--image">
                                    <img src="<?=$image_final?>" alt="">
                                </div>
                                <div class="cart-item--info">
                                    <p><?=$product->post_title?></p>
                                    <div class="cart-item--amount">Количетсво: <?=$count?></div>
                                    <div class="cart-item--price">₸<?=get_field('product_price', $product)?></div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?=get_footer()?>
</div>
</body>
</html>
