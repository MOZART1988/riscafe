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

                <h1>Моя корзина (<span class="card-count"></span>)</h1>
                <?php if (!empty($_SESSION['card'])):?>
                <table class="cart-table">
                    <tr>
                        <th>товар</th>
                        <th>наименование</th>
                        <th>количество</th>
                        <th>итого</th>
                    </tr>
                    <?php foreach ($_SESSION['card'] as $id => $count):?>
                        <?php
                        $product = get_post($id);
                        $image = get_field('product_image', $product);
                        $image_final = wp_get_attachment_image_url($image['id'], 'small');
                        ?>
                        <tr>
                            <td>
                                <a href="">
                                    <img src="<?=$image_final?>" alt="" class="cart-image">
                                </a>
                            </td>
                            <td>
                                <p class="cart-item-title"><?=$product->post_title?></p>
                                <span>Цена: ₸<?=get_field('product_price', $product)?></span>
                                <a href="#remove-link" data-id="<?=$product->ID?>" class="remove-link">Удалить из корзины</a>
                            </td>
                            <td>
                                <div class="opt-quontity" data-id="<?=$product->ID?>" data-price="<?=get_field('product_price', $product)?>" data-count="<?=$count?>">
                                    <span class="quont-minus btn">-</span>
                                    <input type="text" value="<?=$count?>" disabled="disabled">
                                    <span class="quont-plus btn">+</span>
                                </div>
                            </td>
                            <td class="for-one-position">₸<span class="counter"><?=get_field('product_price', $product) * $count?></span></td>
                        </tr>
                    <?php endforeach;?>
                </table>
                <?php endif;?>
                <div class="cart-info">
                    <div class="cart-comment-block">
                        <a href="" class="add-comment">Добавить комментарий</a>
                        <form class="comment-form" action="">
                            <textarea name="" id="" cols="30" rows="6"></textarea>
                            <a href="" class="cancel-comment white-button">Отменить</a>
                            <input type="submit" class="red-button" value="Готово">
                        </form>
                    </div>
                    <div class="cart-amount-block">
                        Сумма: <span></span>
                        <div class="cart-note">Бесплатная доставка при заказе на сумму от 3 000 тенге.</div>
                        <a href="/order/" class="red-button pull-right">Оформить заявку</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?=get_footer()?>
</div>
</body>
</html>
