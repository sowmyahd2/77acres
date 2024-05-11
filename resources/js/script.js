(function ($) {

	"use strict";

	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if ($('.preloader').length) {
			$('.preloader').delay(200).fadeOut(500);
		}
	}


	//Open Main Menu
	if ($('.main-header .nav-toggler .toggler-btn').length) {
		$('.main-header .nav-toggler .toggler-btn').on('click', function (e) {
			e.preventDefault();
			$(this).toggleClass('active');
			$('body').toggleClass('side-content-visible');
		});

		//Hide Form
		$('.hidden-bar .cross-icon').on('click', function (e) {
			e.preventDefault();
			$('body').removeClass('side-content-visible');
			$(".main-header .nav-toggler .toggler-btn").removeClass('active');
		});
	}



	//Update Header Style and Scroll to Top
	function headerStyle() {
		if ($('.main-header').length) {
			var windowpos = $(window).scrollTop();
			var siteHeader = $('.main-header');
			var sticky_header = $('.main-header .sticky-header');
			var scrollLink = $('.scroll-to-top');
			if (windowpos > 200) {
				siteHeader.addClass('fixed-header');
				sticky_header.addClass("animated slideInDown");
				scrollLink.fadeIn(300);
			} else {
				siteHeader.removeClass('fixed-header');
				sticky_header.removeClass("animated slideInDown");
				scrollLink.fadeOut(300);
			}
		}
	}

	headerStyle();


	//Submenu Dropdown Toggle
	if ($('.main-header li.dropdown ul').length) {
		$('.main-header li.dropdown').append('<div class="dropdown-btn"><span class="la la-angle-down"></span></div>');

		//Dropdown Button
		$('.main-header li.dropdown .dropdown-btn').on('click', function () {
			$(this).prev('ul').slideToggle(500);
		});

		//Megamenu Toggle
		$('.main-header .main-menu li.dropdown .dropdown-btn').on('click', function () {
			$(this).prev('.mega-menu').slideToggle(500);
		});

		//Disable dropdown parent link
		$('.main-header .navigation li.dropdown > a,.hidden-bar .side-menu li.dropdown > a').on('click', function (e) {
			e.preventDefault();
		});
	}

	//Banner Carousel
	if ($('.banner-carousel').length) {
		$('.banner-carousel').owlCarousel({
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 15000,
			mouseDrag: false,
			touchDrag: false,
			autoHeight: true,
			autoplay: true,
			autoplayTimeout: 10000,
			navText: ['<span class="la la-long-arrow-left"></span>', '<span class="la la-long-arrow-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				1024: {
					items: 1
				},
			}
		});
	}

	//Recent Property Carousel
	if ($('.recent-property-carousel').length) {
		$('.recent-property-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 700,
			autoplay: false,
			navText: ['<span class="la la-angle-left"></span>', '<span class="la la-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				768: {
					items: 2
				},
				1024: {
					items: 3
				}
			}
		});
	}

	//Single Item Carousel
	if ($('.single-item-carousel').length) {
		$('.single-item-carousel').owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			smartSpeed: 700,
			autoplay: true,
			navText: ['<span class="la la-angle-left"></span>', '<span class="la la-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				1024: {
					items: 1
				}
			}
		});
	}

	//Property Carousel
	if ($('.property-carousel').length) {
		$('.property-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 1000,
			autoplay: true,
			navText: ['<span class="la la-caret-square-o-left"></span>', '<span class="la la-caret-square-o-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				1024: {
					items: 1
				}
			}
		});
	}

	//Popular Places Carousel
	if ($('.popular-places-carousel').length) {
		$('.popular-places-carousel').owlCarousel({
			loop: true,
			margin: 20,
			nav: true,
			smartSpeed: 1000,
			autoplay: true,
			navText: ['<span class="la la-caret-square-o-left"></span>', '<span class="la la-caret-square-o-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				800: {
					items: 3
				},
				1200: {
					items: 4
				},
				1800: {
					items: 5
				}
			}
		});
	}

	//Testimonial Carousel
	if ($('.testimonial-carousel').length) {
		$('.testimonial-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: false,
			smartSpeed: 700,
			autoplay: true,
			navText: ['<span class="la la-angle-left"></span>', '<span class="la la-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				992: {
					items: 2
				},
				1024: {
					items: 2
				}
			}
		});
	}

	//Testimonial Carousel
	if ($('.testimonial-carousel-two').length) {
		$('.testimonial-carousel-two').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 700,
			autoplay: true,
			navText: ['<span class="la la-caret-square-o-left"></span>', '<span class="la la-caret-square-o-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				800: {
					items: 1
				},
				1024: {
					items: 1
				}
			}
		});
	}

	//Agents Carousel
	if ($('.otherpro-carousel').length) {
		$('.otherpro-carousel').owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			smartSpeed: 700,
			autoplay: false,
			navText: ['<span class="la la-angle-left"></span>', '<span class="la la-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				768: {
					items: 1
				},
				1024: {
					items: 4
				}
			}
		});
	}

	//Agents Property Carousel
	if ($('.agent-property-carousel').length) {
		$('.agent-property-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 700,
			autoplay: false,
			navText: ['<span class="la la-angle-left"></span>', '<span class="la la-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				768: {
					items: 2
				},
				1024: {
					items: 3
				}
			}
		});
	}

	//Sponsors Carousel
	if ($('.sponsors-carousel').length) {
		$('.sponsors-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			smartSpeed: 700,
			autoplay: true,
			navText: ['<span class="la la-angle-left"></span>', '<span class="la la-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				768: {
					items: 3
				},
				1024: {
					items: 4
				}
			}
		});
	}

	// Product Carousel Slider
	if ($('.property-detail .image-carousel').length && $('.property-detail .thumbs-carousel').length) {

		var $sync1 = $(".property-detail .image-carousel"),
			$sync2 = $(".property-detail .thumbs-carousel"),
			flag = false,
			duration = 500;

		$sync1
			.owlCarousel({
				loop: false,
				items: 1,
				margin: 0,
				nav: false,
				navText: ['<span class="icon la la-angle-left"></span>', '<span class="icon la la-angle-right"></span>'],
				dots: false,
				autoplay: true,
				autoplayTimeout: 5000
			})
			.on('changed.owl.carousel', function (e) {
				if (!flag) {
					flag = false;
					$sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
					flag = false;
				}
			});

		$sync2
			.owlCarousel({
				loop: false,
				margin: 10,
				items: 1,
				nav: true,
				navText: ['<span class="icon la la-arrow-circle-o-left"></span>', '<span class="icon la la-arrow-circle-o-right"></span>'],
				dots: false,
				center: false,
				autoplay: true,
				autoplayTimeout: 5000,
				responsive: {
					0: {
						items: 2,
						autoWidth: false
					},
					400: {
						items: 2,
						autoWidth: false
					},
					600: {
						items: 3,
						autoWidth: false
					},
					800: {
						items: 5,
						autoWidth: false
					},
					1024: {
						items: 4,
						autoWidth: false
					}
				},
			})

			.on('click', '.owl-item', function () {
				$sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
			})
			.on('changed.owl.carousel', function (e) {
				if (!flag) {
					flag = true;
					$sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
					flag = false;
				}
			});

	}

	//Sortable Masonary with Filters
	function enableMasonry() {
		if ($('.sortable-masonry').length) {

			var winDow = $(window);
			// Needed variables
			var $container = $('.sortable-masonry .items-container');
			var $filter = $('.filter-btns');

			$container.isotope({
				filter: '*',
				masonry: {
					columnWidth: '.masonry-item.small-column'
				},
				animationOptions: {
					duration: 500,
					easing: 'linear'
				}
			});


			// Isotope Filter 
			$filter.find('li').on('click', function () {
				var selector = $(this).attr('data-filter');

				try {
					$container.isotope({
						filter: selector,
						animationOptions: {
							duration: 500,
							easing: 'linear',
							queue: false
						}
					});
				} catch (err) {

				}
				return false;
			});


			winDow.on('resize', function () {
				var selector = $filter.find('li.active').attr('data-filter');

				$container.isotope({
					filter: selector,
					animationOptions: {
						duration: 500,
						easing: 'linear',
						queue: false
					}
				});
			});


			var filterItemA = $('.filter-btns li');

			filterItemA.on('click', function () {
				var $this = $(this);
				if (!$this.hasClass('active')) {
					filterItemA.removeClass('active');
					$this.addClass('active');
				}
			});
		}
	}

	enableMasonry();

	//Default Masonary
	function defaultMasonry() {
		if ($('.masonry-items-container').length) {

			var winDow = $(window);
			// Needed variables
			var $container = $('.masonry-items-container');

			$container.isotope({
				itemSelector: '.masonry-item',
				masonry: {
					columnWidth: 1
				},
				animationOptions: {
					duration: 500,
					easing: 'linear'
				}
			});

			winDow.on('resize', function () {

				$container.isotope({
					itemSelector: '.masonry-item',
					animationOptions: {
						duration: 500,
						easing: 'linear',
						queue: false
					}
				});
			});
		}
	}

	defaultMasonry();

	//Price Range Slider
	if ($('.price-range-slider').length) {
		$(".price-range-slider").slider({
			range: true,
			min: 10000,
			max: 1000000,
			values: [10000, 1000000],
			slide: function (event, ui) {
				$("input.price-amount").val(" ₹ " + ui.values[0] + " - " + " ₹ " + ui.values[1]);
			}
		});

		$("input.price-amount").val(" ₹ " + $(".price-range-slider").slider("values", 0) + " - ₹ " + $(".price-range-slider").slider("values", 1));
	}

	//Price Range Slider
	if ($('.area-range-slider').length) {
		$(".area-range-slider").slider({
			range: true,
			min: 0,
			max: 1000,
			values: [100, 900],
			slide: function (event, ui) {
				$("input.property-amount").val(ui.values[0] + " - " + ui.values[1]);
			}
		});

		$("input.property-amount").val($(".area-range-slider").slider("values", 0) + " - " + $(".area-range-slider").slider("values", 1));
	}


	//Custom Seclect Box
	if ($('.custom-select-box').length) {
		$('.custom-select-box').selectmenu().selectmenu('menuWidget').addClass('overflow');
	}

	//Gallery Filters
	if ($('.filter-list').length) {
		$('.filter-list').mixItUp({});
	}


	//Fact Counter + Text Count
	if ($('.count-box').length) {
		$('.count-box').appear(function () {

			var $t = $(this),
				n = $t.find(".count-text").attr("data-stop"),
				r = parseInt($t.find(".count-text").attr("data-speed"), 10);

			if (!$t.hasClass("counted")) {
				$t.addClass("counted");
				$({
					countNum: $t.find(".count-text").text()
				}).animate({
					countNum: n
				}, {
					duration: r,
					easing: "linear",
					step: function () {
						$t.find(".count-text").text(Math.floor(this.countNum));
					},
					complete: function () {
						$t.find(".count-text").text(this.countNum);
					}
				});
			}

		}, {
			accY: 0
		});
	}

	//Progress Bar
	if ($('.progress-line').length) {
		$('.progress-line').appear(function () {
			var el = $(this);
			var percent = el.data('width');
			$(el).css('width', percent + '%');
		}, {
			accY: 0
		});
	}

	//Tabs Box
	if ($('.tabs-box').length) {
		$('.tabs-box .tab-buttons .tab-btn').on('click', function (e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));

			if ($(target).is(':visible')) {
				return false;
			} else {
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				$(target).fadeIn(300);
				$(target).addClass('active-tab');
			}
		});
	}

	//Accordion Box
	if ($('.accordion-box').length) {
		$(".accordion-box").on('click', '.acc-btn', function () {

			var outerBox = $(this).parents('.accordion-box');
			var target = $(this).parents('.accordion');

			if ($(this).hasClass('active') !== true) {
				$(outerBox).find('.accordion .acc-btn').removeClass('active ');
			}

			if ($(this).next('.acc-content').is(':visible')) {
				return false;
			} else {
				$(this).addClass('active');
				$(outerBox).children('.accordion').removeClass('active-block animated fadeInUp');
				$(outerBox).find('.accordion').children('.acc-content').slideUp(300);
				target.addClass('active-block animated fadeInUp');
				$(this).next('.acc-content').slideDown(300);
			}
		});
	}

	//Event Countdown Timer
	if ($('.time-countdown').length) {
		$('.time-countdown').each(function () {
			var $this = $(this),
				finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function (event) {
				var $this = $(this).html(event.strftime('' + '<div class="counter-column"><span class="count">%D</span>Days</div> ' + '<div class="counter-column"><span class="count">%H</span>Hours</div>  ' + '<div class="counter-column"><span class="count">%M</span>Mints</div>  ' + '<div class="counter-column"><span class="count">%S</span>Sec</div>'));
			});
		});
	}


	//LightBox / Fancybox
	if ($('.lightbox-image').length) {
		$('.lightbox-image').fancybox({
			openEffect: 'fade',
			closeEffect: 'fade',
			helpers: {
				media: {}
			}
		});
	}


	// Scroll to a Specific Div
	if ($('.scroll-to-target').length) {
		$(".scroll-to-target").on('click', function () {
			var target = $(this).attr('data-target');
			// animate
			$('html, body').animate({
				scrollTop: $(target).offset().top
			}, 1500);

		});
	}

	// Elements Animation
	if ($('.wow').length) {
		var wow = new WOW({
			boxClass: 'wow', // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset: 0, // distance to the element when triggering the animation (default is 0)
			mobile: false, // trigger animations on mobile devices (default is true)
			live: true // act on asynchronously loaded content (default is true)
		});
		wow.init();
	}

	function fullHeight() {
		$('.full-height').css("height", $(window).height());
	}
	fullHeight()

	/* ==========================================================================
		When document is resize, do
	   ========================================================================== */
	$(window).on('resize', function () {
		fullHeight();
	});

	/* ==========================================================================
	   When document is Scrollig, do
	   ========================================================================== */

	$(window).on('scroll', function () {
		headerStyle();
	});

	/* ==========================================================================
	   When document is loading, do
	   ========================================================================== */
	$(window).on('load', function () {
		handlePreloader();
		enableMasonry();
		defaultMasonry();


	});

	$(document).ready(function () {
		$('#option-droup-demo').multiselect({
			enableClickableOptGroups: true
		});

		$('#option-buy').multiselect({
			enableClickableOptGroups: true
		});

		$('#option-rent').multiselect({
			enableClickableOptGroups: true
		});

		$('#option-lease').multiselect({
			enableClickableOptGroups: true
		});


		/***************searchbar property changing js****************/


		$("#type").change(function () {
			var val = $(this).val();
			if (val == "rent") {
				$("#pro_rent").css("display", "block");
				$("#pro_buy").css("display", "none");
				$("#pro_lease").css("display", "none");
				$("#pro_none").css("display", "none");
			} else if (val == "buy") {
				$("#pro_rent").css("display", "none");
				$("#pro_buy").css("display", "block");
				$("#pro_lease").css("display", "none");
				$("#pro_none").css("display", "none");
			} else if (val == "lease") {
				$("#pro_rent").css("display", "none");
				$("#pro_buy").css("display", "none");
				$("#pro_lease").css("display", "block");
				$("#pro_none").css("display", "none");
			} else if (val == "item0") {
				$("#pro_rent").css("display", "none");
				$("#pro_buy").css("display", "none");
				$("#pro_lease").css("display", "none");
				$("#pro_none").css("display", "block");
			}
		});

	});



	/* ==========================================================================
	     post properties js
	     ========================================================================== */



	//--------------------------------------------------------
	//the hide and show will starts here

	$('#fixed_error .close').click(function () {
		$(this).closest(".flash-error").fadeOut();
	});
	$('#fixed_error_red .close').click(function () {
		$(this).closest(".flash-error-red").fadeOut();
	});

	/*var dismiss = $('.close').attr('data-dismiss');
	$('.close').on('click', function(){
	    $(this).closest('.'+ dismiss).fadeOut();
	});*/
	//---------------------------
	$(document).on('change', '#priceper', function () {
		var pp = $("#priceper").val();
		var ba = $("#builduparea").val();
		if (pp == "" || pp == "0") {
			$("#pricecalerror").html("Please enter price per area");
			$("#priceper").focus();
			return false;
		}
		if (ba == "" || ba == "0") {
			$("#pricecalerror").html("Please enter build up area");
			$("#builduparea").focus();
			return false;
		}
		$("#pricecalerror").html("");
		var priceper = parseInt(pp);
		var builduparea = parseInt(ba);
		var totalprice = priceper * builduparea;
		$("#price").val(totalprice);

	});
	//---------------------------
	$(document).on('change', '#builduparea', function () {
		var pp = $("#priceper").val();
		var ba = $("#builduparea").val();
		if (pp == "" || pp == "0") {
			$("#pricecalerror").html("Please enter price per area");
			$("#priceper").focus();
			return false;
		}
		if (ba == "" || ba == "0") {
			$("#pricecalerror").html("Please enter build up area");
			$("#builduparea").focus();
			return false;
		}
		$("#pricecalerror").html("");
		var priceper = parseInt(pp);
		var builduparea = parseInt(ba);
		var totalprice = priceper * builduparea;
		$("#price").val(totalprice);

	});

	//---------------------------------
	$(document).on('change', '#sub_categoty', function () {
		var val = $(this).val();
		if (val == 5) {
			$("#basic_status").hide();
			$("#basic_propertyage").hide();
		} else {
			$("#basic_status").show();
			$("#basic_propertyage").show();
		}
	});
	//---------------------------------
	$(document).on('click', '#rerastatus', function () {
		var val = $(this).val();
		if (val == "yes") {
			$("#basic_reraid").show();
			$("#basic_reraurl").show();
		} else {
			$("#basic_reraid").hide();
			$("#basic_reraurl").hide();
		}
	});
	//------------------
	$(".property_typecheck").change(function () {
		if ($(this).is(":checked")) {
			var val = $(this).val();
			if (val == "2") {
				$("#basic_resale").hide();
				$("#basic_status").hide();
			} else {
				$("#basic_resale").show();
				$("#basic_status").show();
			}
		}
	});


	$(function () {
		$("#wizard").steps({
			headerTag: "h2",
			bodyTag: "section",
			transitionEffect: "slideLeft"
		});
	});
	$(document).ready(function () {
		uploadHBR.init({
			"target": "#uploads",
			"textNew": "ADD",
			"textTitle": "Click here or drag to upload an imagem",
			"textTitleRemove": "Click here remove the imagem"
		});
		$('#reset').click(function () {
			uploadHBR.reset('#uploads');
		});



	});


	$(document).on('click', '.property-type', function () {
		var val = $(this).val();
		if (val == "agricultural") {
			$(".project-category").hide();
		} else {
			$(".project-category").show();
		}
	});


	/* ==========================================================================
	     post project js
	     ========================================================================== */

	$(document).ready(function () {
		$(".property_typecheck").change(function () {
			if ($(this).is(":checked")) {
				var val = $(this).val();
				if (val == "1") {
					$(".display_for_sell").show();
					$(".display_for_rent").hide();
					$(".display_for_lease").hide();
				} else if (val == "2") {
					$(".display_for_rent").show();
					$(".display_for_sell").hide();
					$(".display_for_lease").hide();
				} else if (val == "3") {
					$(".display_for_rent").hide();
					$(".display_for_sell").hide();
					$(".display_for_lease").show();
				}
			}
		});



		/***************submit properties page buy property changing js****************/
		$(".main_category").change(function () {
			var val = $(this).val();
			if (val == "residential") {
				$(".sub_category").html("<option value='' selected disabled>Select a subcategory</option><option value='apartments'>Residential Apartments</option><option value='house'>House</option><option value='villa'>Villa</option><option value='residentialland'>Residential Land / Plots</option>");
			} else if (val == "commercial") {
				$(".sub_category").html("<option value='' selected disabled>Select a subcategory</option><option value='shopsoffice'>Shops / Office</option><option value='commercial'>Commercial / Industrial land</option><option value='factory'>Factory / Warehouse</option><option value='hotel'>Hotel</option><option value='resorts'>Resorts</option><option value='cold'>Cold storage</option>");
			} else if (val == "agricultural") {
				$(".sub_category").html("<option value='' selected disabled>Select a subcategory</option><option value='agriland'>Agricultural land</option><option value='farm'>Farm House</option>");
			} else if (val == "zero") {
				$(".sub_category").html("<option value=''>--select one--</option>");
			}
		});



		/***************submit properties page rent property changing js****************/
		$(".main_category1").change(function () {
			var val = $(this).val();
			if (val == "residential1") {
				$(".sub_category1").html("<option value='' selected disabled>Select a subcategory</option><option value='rrapartment'>Residential Apartment</option><option value='rsapartment'>Service / Studio Apartment</option><option value='rhouse'>House / Villa</option><option value='rroom'>Room</option><option value='rpg'>PG / Homestay</option>");
			} else if (val == "commercial1") {
				$(".sub_category1").html("<option value='' selected disabled>Select a subcategory</option><option value='rshops'>Shops / Office</option><option value='rcommercial'>Commercial / Industrial land</option><option value='rfactory'>Factory / Warehouse</option><option value='rhotel'>Hotel</option><option value='rresorts'>Resorts</option><option value='rcold'>Cold storage</option>");
			} else if (val == "agricultural1") {
				$(".sub_category1").html("<option value='' selected disabled>Select a subcategory</option><option value='ragriland'>Agricultural land</option><option value='rfarm'>Farm House</option>");
			} else if (val == "zero1") {
				$(".sub_category1").html("<option value=''>--select one--</option>");
			}
		});


		/***************submit properties page Lease property changing js****************/
		$(".main_category2").change(function () {
			var val = $(this).val();
			if (val == "residential2") {
				$(".sub_category2").html("<option value='' selected disabled>Select a subcategory</option><option value='lrapartment'>Residential Apartment</option><option value='lstapartment'>Service / Studio Apartment</option><option value='lhouse'>House / Villa</option><option value='lroom'>Room</option>");
			} else if (val == "commercial2") {
				$(".sub_category2").html("<option value='' selected disabled>Select a subcategory</option><option value='lshops'>Shops / Office</option><option value='lcommercial'>Commercial / Industrial land</option><option value='lfactory'>Factory / Warehouse</option><option value='lhotel'>Hotel</option><option value='lresorts'>Resorts</option><option value='lcold'>Cold storage</option>");
			} else if (val == "agricultural2") {
				$(".sub_category2").html("<option value='' selected disabled>Select a subcategory</option><option value='lagriland'>Agricultural land</option><option value='lfarm'>Farm House</option>");
			} else if (val == "zero2") {
				$(".sub_category2").html("<option value=''>--select one--</option>");
			}
		});

	});



	$(document).on('change', '.furnishing', function () {
		var val = $(this).val();
		if (val == "Furnished") {
			$(".furnishing-amenities").show();
		} else if (val == "semi-furnished") {
			$(".furnishing-amenities").show();
		} else if (val == "unfurnished") {
			$(".furnishing-amenities").hide();
		} else {
			$(".furnishing-amenities").hide();
		}

	});

	$(document).on('change', '.propertystatus', function () {
		var val = $(this).val();
		if (val == 2) {
			$(".basic_age").hide();
		} else {
			$(".basic_age").show();
		}
	});
	$(document).on('click', '.rerastatus', function () {
		var val = $(this).val();
		if (val == "yes") {
			$(".basic_reraid").show();
			$(".basic_reraurl").show();
		} else {
			$(".basic_reraid").hide();
			$(".basic_reraurl").hide();
		}
	});


		/***************submit properties page sell sub property changing and display property details js****************/
	$(document).on('change', '.sub_category', function () {
		var val = $(this).val();
		if (val == "apartments") {
			$(".basic_age").show();
			$(".rerastatus").show();
			$("#sell-residential-apartment").show();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "house") {
			$(".basic_age").show();
			$(".rerastatus").hide();
			$("#sell-residential-house").show();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "villa") {
			$(".basic_age").show();
			$(".rerastatus").show();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").show();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "residentialland") {
			$(".rerastatus").show();
			$(".basic_age").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").show();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "shopsoffice") {
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").show();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "commercial") {
			$(".rerastatus").hide();
			$(".basic_age").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").show();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "factory") {
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").show();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "hotel") {
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").show();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "resorts") {
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").show();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "cold") {
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").show();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "agriland") {
			$(".basic_status").hide();
			$(".rerastatus").hide();
			$(".basic_age").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").show();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		}else if (val == "farm") {
			$(".basic_status").hide();
			$(".rerastatus").hide();
			$(".basic_age").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").show();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		}
	});
	
	
	/***************submit properties page rent sub property changing and display property details js****************/
	$(document).on('change', '.sub_category1', function () {
		var val = $(this).val();
		if (val == "rrapartment" || val == "rsapartment") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#rent-residential-apartment").show();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "rhouse") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").show();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "rroom" || val == "rpg") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").show();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		} else if (val == "rshops") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").show();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		}else if (val == "rcommercial") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").show();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		}else if (val == "rfactory") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").show();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		}else if (val == "rhotel") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").show();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		}else if (val == "rresorts") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").show();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		}else if (val == "rcold") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").show();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		}else if (val == "ragriland") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").show();
			$("#rent-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		}else if (val == "rfarm") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").show();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
		}
	});
	
	
	/***************submit properties page lease sub property changing and display property details js****************/
	$(document).on('change', '.sub_category2', function () {
		var val = $(this).val();
		if (val == "lrapartment" || val == "lstapartment") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#lease-residential-apartment").show();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
		} else if (val == "lhouse") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").show();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
		} else if (val == "lroom" || val == "lpg") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").show();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
		} else if (val == "lshops") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").show();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
		}else if (val == "lcommercial") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").show();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
		}else if (val == "lfactory") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").show();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
		}else if (val == "lhotel") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").show();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
		}else if (val == "lresorts") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").show();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
		}else if (val == "lcold") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").show();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").show();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
		}else if (val == "lagriland") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").show();
			$("#lease-agriculture-farm").hide();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
		}else if (val == "lfarm") {
			$(".basic_status").show();
			$(".rerastatus").hide();
			$(".basic_age").hide();
			$("#lease-residential-apartment").hide();
			$("#lease-residential-house").hide();
			$("#lease-residential-roompg").hide();
			$("#lease-commercial-shop").hide();
			$("#lease-commercial-land").hide();
			$("#lease-commercial-factory").hide();
			$("#lease-commercial-hotel").hide();
			$("#lease-commercial-resort").hide();
			$("#lease-commercial-cold").hide();
			$("#lease-agriculture-land").hide();
			$("#lease-agriculture-farm").show();
			$("#sell-residential-apartment").hide();
			$("#sell-residential-house").hide();
			$("#sell-residential-villa").hide();
			$("#sell-residential-plots").hide();
			$("#sell-commercial-shop").hide();
			$("#sell-commercial-land").hide();
			$("#sell-commercial-factory").hide();
			$("#sell-commercial-hotel").hide();
			$("#sell-commercial-resort").hide();
			$("#sell-commercial-cold").hide();
			$("#sell-agriculture-land").hide();
			$("#sell-agriculture-farm").hide();
			$("#rent-residential-apartment").hide();
			$("#rent-residential-house").hide();
			$("#rent-residential-roompg").hide();
			$("#rent-commercial-shop").hide();
			$("#rent-commercial-land").hide();
			$("#rent-commercial-factory").hide();
			$("#rent-commercial-hotel").hide();
			$("#rent-commercial-resort").hide();
			$("#rent-commercial-cold").hide();
			$("#rent-agriculture-land").hide();
			$("#rent-agriculture-farm").hide();
		}
	});

	/************* furnishing aminities quantity script *********************/
	$(document).ready(function () {


		var incrementPlus;
		var incrementMinus;

		var buttonPlus = $(".quantity-right-plus");
		var buttonMinus = $(".quantity-left-minus");

		var incrementPlus = buttonPlus.click(function () {
			var $n = $(this)
				.parent(".input-group-btn")
				.parent(".input-group")
				.find(".quantity");
			$n.val(Number($n.val()) + 1);
		});

		var incrementMinus = buttonMinus.click(function () {
			var $n = $(this)
				.parent(".input-group-btn")
				.parent(".input-group")
				.find(".quantity");
			var amount = Number($n.val());
			if (amount > 0) {
				$n.val(amount - 1);
			}
		});

	});
	/************* user image upload script *********************/
	$(function () {
		$("[type=file]").mnFileInput();
		$(".widthPreview").mnFileInput({
			'preview': '.preview'
		});
	});


	/*************proprety shortlist icon change script *********************/
	$(".shortlist-icon").click(function () {
		const icon = this.querySelector('i');

		if (icon.classList.contains('la-heart-o')) {
			icon.classList.remove('la-heart-o');
			icon.classList.add('la-heart');
		} else {
			icon.classList.remove('la-heart');
			icon.classList.add('la-heart-o');
		}
	});

	/* === === === === === === === === === === === === === === === === === === === === === === === === ==
	       apply filter sidebar open and close js
	       ========================================================================== */



	/* === === === === === === === === === === === === === === === === === === === === === === === === ==
	      submit property page increment and decerement js code
	       ========================================================================== */


})(window.jQuery);
