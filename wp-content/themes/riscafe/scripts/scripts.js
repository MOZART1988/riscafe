$(document).ready(function() {
    card_count();
    update_summ($('.cart-amount-block').find('span'));
    var sidecartOpen = function () {
        $('.cart-overlay').toggleClass('open');
        $('.sideCart').toggleClass('open');
        $('body').toggleClass('has-overlay');
    };

    $('a.menu-toggle').on('click', function(e){
        e.preventDefault();
        $('.main-nav').toggleClass('open');
    });

    $('a.close-menu').on('click', function(e){
        e.preventDefault();
        $('.main-nav').toggleClass('open');
    });

    $('.main-nav li.has-child>a').on('click', function(e){
        e.preventDefault();
        $(this).next('ul').slideToggle();
    })


    $('.add-card').on('click', function (e) {
    	e.preventDefault();
        var id = $(this).attr('data-id');
        var count = $(this).prev().find('select option:selected').text();
        update_card(id, count, true);
    });

    $('body').on('click', '.addtocart-black', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        update_card(id, 1, true);
    });

    $('body').on('click', '.remove-link', function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        update_card(id, 'remove', false);
        $(this).parent().parent().remove();
        update_summ($('.cart-amount-block').find('span'));
    });

    $('body').on('click', '.delete-item', function(e) {
        e.preventDefault();
        var id = $('.delete-item').attr('data-id');
        update_card(id, 'remove', false);
	});

    $('.cart-overlay').on('click', function (e) {
        e.preventDefault();
        sidecartOpen();
    });

    $('.closeCart').on('click', function (e) {
        e.preventDefault();
        sidecartOpen();
    });

    $('.quont-minus').click(function() {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        update_card_minus_one($(this).parent().attr('data-id'));
        update_summ($('.cart-amount-block').find('span'));
        card_count();
        calculate_one_position(count, $(this).parent().attr('data-price'), $(this).parent().parent().next().find('.counter'));
        return false;
    });
    $('.quont-plus').click(function() {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) + 1;
        $input.val(count);
        $input.change();
        update_card($(this).parent().attr('data-id'), 1, false);
        update_summ($('.cart-amount-block').find('span'));
        calculate_one_position(count, $(this).parent().attr('data-price'), $(this).parent().parent().next().find('.counter'));
        return false;
    });

    $('.add-comment').on('click', function(e){
        e.preventDefault();
        $(this).hide();
        $('.comment-form').show();
    });

    $('.cancel-comment').on('click', function(e){
        e.preventDefault();
        $('.comment-form').hide();
        $('.add-comment').show();
    });

    function calculate_one_position(count, price, container) {
        result = parseInt(count) * parseInt(price);
        container.html(result);
    }

    function update_card(product_id, count, is_open) {
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: "GET",
            data: "custom_action=update_card&product_id=" + product_id + "&count=" + count,
            success: function (data) {
                $.ajax({
                    url: "/wp-admin/admin-ajax.php",
                    type: "GET",
                    data: "custom_action=render_card",
                    success: function (data) {
                    	$('.cart-body-ajax').html(data);
                    	if (is_open) {
                            sidecartOpen();
						}
                        card_count();
                        update_summ($('.sideCart-sum').find('span'));
                    }
                });
            }
        });
    };

    function update_card_minus_one(id) {
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: "GET",
            data: "custom_action=card-minus-one&id="+id,
        });
    }

    function update_summ(container) {
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: "GET",
            data: "custom_action=update_summ",
            success: function (data) {
                container.html(data);
            }
        });
    }

    function card_count() {
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: "GET",
            data: "custom_action=update_count",
            success: function (data) {
            	if (data == 'none') {
            	    $('.cart-widget-button-container').find('svg').find('text').html('0');
                    $('.card-count').html('0');
				} else {
                    $('.cart-widget-button-container').find('svg').find('text').html(data);
                    $('.card-count').html(data);
				}

            }
        });
	}

	$('#order-form').on("submit", function(){
	    var form = $(this);
        $.ajax({
            url: "/wp-admin/admin-ajax.php?custom_action=send_order",
            type: "POST",
            dataType: 'html',
            data: form.serialize(),
            success: function (data) {


                if (data == 'success') {
                    $('.main-content.white-bg').html('<h1>Спасибо за Ваш заказ! Мы обязательно свяжемся с Вами в ближайшее время</h1>');
                } else {
                    $('.main-content.white-bg').html('<h1>Что - то пошло не так, попробуйте снова</h1>');
                }

            }
        });
	    return false;
    });

    $('#feedback-form').on("submit", function(){
        var form = $(this);
        $.ajax({
            url: "/wp-admin/admin-ajax.php?custom_action=send_feedback",
            type: "POST",
            dataType: 'html',
            data: form.serialize(),
            success: function (data) {


                if (data == 'success') {
                    $('.ajax-form').html('<div class="contacts-info"><p>Спасибо за Ваше сообщение</p></div>');
                } else {
                    $('.ajax-form').html('<div class="contacts-info"><p>Что - то пошло не так, попробуйте снова</p></div>');
                }

            }
        });
        return false;
    });
});