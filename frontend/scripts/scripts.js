$(document).ready(function() {
    var sidecartOpen = function() {
        $('.cart-overlay').toggleClass('open');
        $('.sideCart').toggleClass('open');
        $('body').toggleClass('has-overlay');
    };


    $('.add-to-cart').on('click', function(e) {
        e.preventDefault();
        sidecartOpen();
    });

    $('.cart-overlay').on('click', function(e) {
        e.preventDefault();
        sidecartOpen();
    });

    $('.closeCart').on('click', function(e) {
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
    });



});
