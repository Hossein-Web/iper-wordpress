(function ($) {
const header = $('#header');

// $(window).on('load', () => {
// 	WebFont.load({
// 		google: {
// 			families: ["Roboto:100,300,400,700"]
// 		}
// 	});
// 	setTimeout(function () {
// 		$(window).scroll(function () {
// 			let scrolled = $(window).scrollTop();
// 			if (scrolled > 350) {
// 				header.addClass('scrolled');
// 			} else {
// 				header.removeClass('scrolled');
// 			}
// 		});
// 	}, 2000);
// 	AOS.init();
// });

// center 404 not found
var timer;
var viewportHeight = $(window).height();

$(window).on('load', function () {
	init_position_not_found();
});

$(window).resize(function () {
	clearTimeout(timer);
	timer = setTimeout('init_position_not_found()', 100);
});

function init_position_not_found() {
	viewportHeight = $(window).height();
	var headerWrapHeight = $('.not-found').height();
	var targetMargin = (headerWrapHeight - viewportHeight) / 2;
	$('.not-found').animate({
		'margin-top': -targetMargin
	}, 1000);
};

// Top live prices
let topLivePricesSection = $( '.top-live-prices' );
let menu_wrapper = $( '.menu-wrapper' );
let header_element = $( 'header' );


let currencySlider = $('.currency-list-wrapper').bxSlider({
	pager: false,
	slideMargin: 50,
	controls: false,
	speed: 50500,
	useCSS: true,
	ticker: true,
	tickerHover: true,
	slideWidth: 195,
	responsive: true,
	minSlides: 1,
	maxSlides: 5,
	wrapperClass: 'currency-list-wrapper'
});
if ( window.matchMedia("(max-width: 576px)").matches ) {
	currencySlider.reloadSlider({
		pager: false,
		slideMargin: 2,
		controls: false,
		speed: 50500,
		useCSS: true,
		ticker: true,
		tickerHover: true,
		slideWidth: 190,
		responsive: true,
		minSlides: 1,
		maxSlides: 5,
		wrapperClass: 'currency-list-wrapper'
	});
}

$(window).on( 'scroll', function (e) {
	// let menu_wrapper_padding = topLivePricesSection.outerHeight() + header_element.outerHeight();
	// console.log(menu_wrapper_padding);
	// console.log('top-live-prices '+ topLivePricesSection.outerHeight() );
	// console.log('header '+ header_element.outerHeight() );
	if ( $(this).scrollTop() > topLivePricesSection.outerHeight() ) {
		topLivePricesSection.addClass( 'fixed-to-bottom' );
		header_element.addClass( 'sticky' );
		let menu_wrapper_padding = topLivePricesSection.outerHeight() + header_element.outerHeight();
		$('#main-page').css( 'padding-top', menu_wrapper_padding );
	}else if ( topLivePricesSection.hasClass( 'fixed-to-bottom' ) ){
		topLivePricesSection.removeClass( 'fixed-to-bottom' );
		header_element.removeClass( 'sticky' );
		$('#main-page').css( 'padding-top', '0' );
		// mainPage.css( 'padding-top', '0' );
	}
} );

tabInit();

//sticky menu
// $(window).on( 'scroll', function () {
//     let header = $('.header');
//     let sticky = header.offset().top;
//         if (window.pageYOffset >= 137) {
//            header.addClass( 'sticky' );
//            $('.header-bottom').css('padding-top', '100px');
//         } else {
//             header.removeClass( 'sticky' );
//             $('.header-bottom').css('padding-top', '21px');
//         }
//         console.log( $('.top-live-prices').height() );
// } );

// $(window).on( 'scroll', function (e) {
// console.log( $(this).scrollTop() );
// if ($(this).scrollTop()>70) {
// topLivePricesSection.addClass( 'fixed-to-bottom' );
// mainPage.css( 'padding-top', '70px' );
// header.addClass( 'sticky' );
// }else {
// topLivePricesSection.removeClass( 'fixed-to-bottom' );
// mainPage.css( 'padding-top', '0' );
// header.removeClass( 'sticky' );
// }
// } );

//mobile menu
let body = $('body');
let mobileWrapper = $('.header__mobile-menu-wrapper');
let mainPage = $('#main-page');
let mobileOverlay = $('#mobile-overlay');

function mobileClose() {
	if (mobileWrapper.hasClass('mobile-menu-open')) {
		mobileWrapper.removeClass('mobile-menu-open');

		if (mainPage.hasClass('menu-translate')) {
			mainPage.removeClass('menu-translate');
		}
		body.removeClass('mobile-menu-active');
		mobileOverlay.css('display', 'none');
	}
}

function mobileOpen() {
	mobileWrapper.addClass('mobile-menu-open');
	mainPage.addClass('menu-translate');
	body.addClass('mobile-menu-active');
	mobileOverlay.css('display', 'block');
}

$('.mobile-menu-button').on('click', function (e) {
	e.stopPropagation();
	e.preventDefault();
	mobileOpen();
});

$('#mobile-overlay').on('click', function (e) {
	e.stopPropagation();
	e.preventDefault();
	mobileClose();
});

$('.mobile-close-button').on('click', function (e) {
	e.stopPropagation();
	e.preventDefault();
	mobileClose();
});

	$( '.mobile-menu-body .has_submenu > a' ).on( 'click', function (e) {
		e.preventDefault();
	} );

	$('.mobile-menu-body .has_submenu').on( 'click', function (e) {
		e.stopPropagation();
		$( this ).toggleClass( 'active' );
	} );

//search form
$('.search>span').on('click', function (e) {
	e.stopPropagation();
	e.preventDefault();
	let search_form = $('.search__form');
	search_form.toggleClass('search-open');

	setTimeout( function () {
		$('#s').focus();
	}, 300 );
});

// $( '.search__form' ).on( 'focusout', function () {
// 	if ( $(this).hasClass( 'search-open' ) ) {
// 		$(this).removeClass( 'search-open') ;
// 	}
// } );

//notification
$('.notification span').on('click', function () {
	$('.notification__notification-list').toggleClass('active');
});

// Header bottom slider
let latest_news_articles = new Swiper('.latest-news-articles__slider> .swiper-container', {
	// direction: 'vertical',
	slidesPerView: 1,
	loop: true,
	autoplay: {
		delay: 3000
	},
	effect: 'fade',
});

// Post-slider slider
let post_slider_slider = new Swiper('.post-slider__slider> .swiper-container', {
	navigation: {
		nextEl: '.post-slider__slider .navigation-button--next',
		prevEl: '.post-slider__slider .navigation-button--prev',
	},
	autoHeight: true
});

// Tile post
let tile_post = new Swiper('.tile-post .swiper-container', {
	spaceBetween: 5,
	loop: true,
	slidesPerView: 1.2,
	speed: 1000,
	autoplay: {
		delay: 3000
	},
	breakpoints: {
		577: {
			spaceBetween: 20
		},
		992: {
			slidesPerView: 2,
			spaceBetween: 20
		}
	}

});

//offer posts
var mySwiper = new Swiper('.offer-posts__slider-container > .swiper-container ', {
	speed: 400,
	spaceBetween: 20,
	slidesPerView: 1.2,
	breakpoints: {
		576: {
			slidesPerView: 1.8,
			spaceBetween: 10

		},
		768: {
			slidesPerView: 2.5
		},
		992: {
			slidesPerView: 4,
			spaceBetween: 20
		}
	}
});
//comments section scroll
if ($('.comments__wrapper').length) {
	new SimpleBar($('.comments__wrapper')[0], {
		classNames: {
			// defaults
			scrollbar: 'simplebar-scrollbar',
			track: 'simplebar-track'
		}
	});
}

// Post small slider
var mySwiper = new Swiper('.slider-post-small-slider .swiper-container', {
	speed: 400,
	slidesPerView: 1,
	navigation: {
		nextEl: '.slider-post-small-slider .navigation-button--next',
		prevEl: '.slider-post-small-slider .navigation-button--prev',
	},
});

//services slider
var services = new Swiper('.services-slider__slider-container .swiper-container', {
	speed: 400,
	spaceBetween: 10,
	slidesPerView: 1.8,
	pagination: {
		el: '.swiper-pagination',
		type: 'bullets',
		clickable: true
	},
	breakpoints: {
		577: {
			spaceBetween: 30,
		},
		768: {
			slidesPerView: 2.5,
		},
		992: {
			slidesPerView: 4,
		}
	}
});

//Mega menu
$('.tab-title > div').on('click', function () {
	let tab_content = $(this).data('tab');
	$('div[data-tabc =' + tab_content + ']').toggleClass('active');
});

//Suggest bourse slider
let suggest_bourse = new Swiper('.suggest-bourse .swiper-container', {
	spaceBetween: 10,
	loop: true,
	slidesPerView: 2.1,
	speed: 1000,
	autoplay: {
		delay: 3000
	},
	breakpoints: {
		577: {
			slidesPerView: 3.1,
			spaceBetween: 20,
		},
		992: {
			slidesPerView: 4.2
		},
		1200: {
			slidesPerView: 6
		}
	}

});

// Social media hover events
$('.footer-social-media li').on('mouseover', function (e) {
	$(this).addClass('active');
	$(this).siblings().removeClass('active')
});

// Side categories
$( '.side-categories .has-subcategory span' ).on( 'click', function (e) {
	$('.side-categories .has-subcategory').toggleClass( 'active' );
});


//Ajax request in post like
const Toast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 10000,
	timerProgressBar: true,
	didOpen: (toast) => {
		toast.addEventListener('mouseenter', Swal.stopTimer)
		toast.addEventListener('mouseleave', Swal.resumeTimer)
	}
});
function loader(el, status) {
	if (typeof status == "undefined" || status == null) {
		status = "active";
	}
	if (typeof el == "undefined" || el == null) {
		el = $('body');
	}
	if (status == 'active') {
		el.addClass('loader-overly');
		el.append('<div class="loader"><i class="icon-markaz-blank"></i></div>');
	} else {
		el.removeClass('loader-overly');
		el.find('.loader').remove();
	}
}



/* like ajax  */
$('.post-item-like').on('click', function (e) {
	e.preventDefault();
	let ele = $(this);

	let data = {};
	data['postid'] = ele.data('postid');
	data['nonce'] = ele.data('nonce');
	data['type'] = ele.data('type');
	data['action'] = 'ivahid_post_like';

	let ajax_url = ele.data('ajax_url');

	loader(ele);

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: ajax_url,
		data: data,
		complete: function () {
			loader(ele, 'deactive');
		},
		success: function (data) {
			if ( data.status == 1 ) {
				Toast.fire({
					icon: 'success',
					title: 'با موفقیت انجام شد',
					footer: data.message,
				});
				ele.toggleClass('active');
				if (ele.find('.count')) {
					ele.find('.count').html(data.info.count);
				}
			} else {
				Toast.fire({
					icon: 'error',
					title: 'متاسفانه انجام نشد',
					footer: data.message,
				});
			}
		},
		error: function () {
			Toast.fire({
				icon: 'error',
				title: 'متاسفانه انجام نشد',
				footer: 'در ارسال درخواست مشکلی وجود دارد.',
			});
		}
	});
});

// Side video slider
let side_video = new Swiper('.side-video-slider .swiper-container', {
	direction: 'vertical',
	loop: true,
	slidesPerView: 1,
	speed: 500,
	autoplay: {
		delay: 2000
	},
	effect: 'fade',
	// autoHeight: true
});
side_video.on('transitionStart', function () {
	$( '.side-video-slider .swiper-slide-prev' ).toggleClass( 'slide-change' );
});
side_video.on('transitionEnd', function () {
	$( '.side-video-slider .swiper-slide-prev' ).removeClass( 'slide-change' );
});

})(jQuery);