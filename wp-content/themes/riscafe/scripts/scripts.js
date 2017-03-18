$(document).ready(function() {
	var sidecartOpen = function(){
		$('.cart-overlay').toggleClass('open');
		$('.sideCart').toggleClass('open');
	};


	$('.add-to-cart').on('click', function(e){
		e.preventDefault();
		sidecartOpen();
	});

	$('.cart-overlay').on('click', function(e){
		e.preventDefault();
		sidecartOpen();
	});

	$('.closeCart').on('click', function(e){
		e.preventDefault();
		sidecartOpen();
	});
});