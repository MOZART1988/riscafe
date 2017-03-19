$(document).ready(function() {
    card_count();
    var sidecartOpen = function () {
        $('.cart-overlay').toggleClass('open');
        $('.sideCart').toggleClass('open');
    };


    $('.add-card').on('click', function (e) {
    	e.preventDefault();
        var id = $(this).attr('data-id');
        var count = $(this).prev().find('select option:selected').text();
        update_card(id, count, true);
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
        return false;
    });
    $('.quont-plus').click(function() {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
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
                    }
                });
            }
        });
    };

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
});