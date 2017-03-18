$(document).ready(function() {
    card_count();
    var sidecartOpen = function () {
        $('.cart-overlay').toggleClass('open');
        $('.sideCart').toggleClass('open');
    };


    $('.add-to-cart').on('click', function (e) {
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
                    	$('.cart-body').html(data);
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
				} else {
                    $('.cart-widget-button-container').find('svg').find('text').html(data);
				}

            }
        });
	}
});