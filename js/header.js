(function($){
	$(document).ready(function() {


		var isMobile = ($(window).width() < 700);
		$(function () {
			if (!isMobile) { $('meta[name=viewport]').attr('content', 'initial-scale=0.75, maximum-scale=1, user-scalable=yes'); }
			$("#headerMobile .menu_left_mobile").click(oEventsMain.menuMobileLeftClick);
			$("#headerMobile .menu_right_mobile").click(oEventsMain.menuMobileRightClick);
			
			$("#pnl_MobileMenuOverlay").click(oEventsMain.pnl_MobileMenuOverlay_Click);
			$("#FindStore").keypress(oEventsMain.tbx_FindRestaurant_keypress);
			$("#Mobile_FindStore").keypress(oEventsMain.tbx_FindRestaurant_keypress_Mobile);
			//$(document).on("click", ".clickable", oEventsMain.clickable_Click);
			//$(document).on("click", ".search_mobile", oEventsMain.clickableA_Click);
			
			$("#Mobile_FindStore").click(function(event){
			event.stopPropagation();
			});
			
			$(window).scroll(oEventsMain.window_Scroll);
			oFuncsMain.Init();
		});

		var oEventsMain = {
			 HeaderAnimating: false
			,HeaderShrinked: false

			, menuMobileLeftClick: function () {
				oFuncsMain._ShowMobileMenu();
			} //menuMobileLeftClick

			, menuMobileRightClick: function () {
				oFuncsMain._ShowMobileUser();
			} //menuMobileRightClick

			, pnl_MobileMenuOverlay_Click: function () {
				oFuncsMain._ShowMenu();
			} //pnl_MobileMenuOverlay_Click

			, window_Scroll: function (a, b) {
				var dm_isMobile = ($(window).width() < 700);
				var dm_Top = $(window).scrollTop();

				if (!dm_isMobile && !oEventsMain.HeaderAnimating) {
					if (dm_Top > 20 && !oEventsMain.HeaderShrinked) {
						oEventsMain.HeaderShrinked = true;
						$("#header").animate({ 'padding-top': '2px', 'padding-bottom': '2px' }, 'fast', function () { oEventsMain.HeaderAnimating = false; });
						$(".pnl_Social").fadeOut('fast');
					}

					if (dm_Top <= 20 && oEventsMain.HeaderShrinked) {
						oEventsMain.HeaderShrinked = false;
						$("#header").animate({ 'padding-top': '31px', 'padding-bottom': '26px' }, 'slow', function () { oEventsMain.HeaderAnimating = false; });
						$(".pnl_Social").fadeIn('fast');
					}
				}
			} //document_Scroll

				, clickable_Click: function () {
				var dm_url = $(this).find("a:first").attr('href');
				window.location.href = dm_url;
			} //clickable_Click

			, clickableA_Click: function (e) {
				e.stopPropagation();
			} //clickableA_Click
			
			, tbx_FindRestaurant_keypress: function (e) {
				if (e.which == 13) {
				var input = document.getElementById('FindStore');
						var options = {
						componentRestrictions: { country: 'au' }
					};
				var autocomplete = new google.maps.places.Autocomplete(input, options);	
				event.preventDefault();
				var SearchQuery = $(".pac-container .pac-item:first").text();
				var dest_prefix = "store-location?bh-sl-address=";
				var dest_url= dest_prefix + SearchQuery;
				console.log(dest_url);
				window.location.href = dest_url;
				//document.getElementById("bh-sl-submit").submit()
					
				}
			}
			
			, tbx_FindRestaurant_keypress_Mobile: function (e) {
				if (e.which == 13) {
					//oFuncsMain._FindStore();
					var input = document.getElementById('Mobile_FindStore');
						var options = {
						componentRestrictions: { country: 'au' }
					};
				var autocomplete = new google.maps.places.Autocomplete(input, options);	
				event.preventDefault();
				var SearchQuery = $(".pac-container .pac-item:first").text();
				var dest_prefix = "store-location?bh-sl-address=";
				var dest_url= dest_prefix + SearchQuery;
				console.log(dest_url);
				window.location.href = dest_url;
				
				}
			}
			
		} //oEventsMain

var oFuncsMain = {

			Init: function () {
				//oFuncsMain._MenuSetUp();
				//oMenuPromoLink.Init();
				google.maps.event.addDomListener(window, 'load', oFuncsMain._FindStoreAutocomplete);
				google.maps.event.addDomListener(window, 'load', oFuncsMain._FindStoreAutocomplete_Mobile);

			} //Init
			
			
			, _FindStoreAutocomplete: function () {
				var input = document.getElementById('FindStore');
						var options = {
						componentRestrictions: { country: 'au' }
					};
					var autocomplete = new google.maps.places.Autocomplete(input, options);
					google.maps.event.addListener(autocomplete, 'place_changed', function () {
						var SearchQuery = document.getElementById('FindStore').value;
						var dest_prefix = "store-location?bh-sl-address=";
						var dest_url= dest_prefix + SearchQuery;
						window.location.href = dest_url;
						
					});
				
			}
			
			, _FindStoreAutocomplete_Mobile: function () {
				var input = document.getElementById('Mobile_FindStore');
						var options = {
						componentRestrictions: { country: 'au' }
					};
					var autocomplete = new google.maps.places.Autocomplete(input, options);
					google.maps.event.addListener(autocomplete, 'place_changed', function () {
						var SearchQuery = document.getElementById('Mobile_FindStore').value;
						var dest_prefix = "store-location?bh-sl-address=";
						var dest_url= dest_prefix + SearchQuery;
						window.location.href = dest_url;
						
					});
				
			}
			
			, _MenuSetUp: function () {
				$("#pnl_Menu").fadeIn();
			} //n_MenuPromoTitle
  		, _ShowMobileUser: function () {
				oFuncsMain._ShowMenu('U');
			} //_ShowMobileUser

			, _ShowMobileMenu: function () {
				oFuncsMain._ShowMenu('M');
			} //_ShowMobileMenu

			, _ShowMenu: function (type) {

				if (!type) {
					type = ($("#headerMobile .menu_left_mobile").hasClass("active") ? "M" : "U");
				}

				var isMenuOpened = $("#menuMobileLeft").is(":visible");
				var isUserOpened = $("#menuMobileRight").is(":visible");
				var dm_OpenId = (type == 'M' ? '#menuMobileLeft' : "#menuMobileRight");
				var dm_CloseId = (type != 'M' ? '#menuMobileLeft' : "#menuMobileRight");
				var dm_ActiveId = (type == 'M' ? '#headerMobile .menu_left_mobile' : '#headerMobile .menu_right_mobile');

				if (!isMenuOpened && !isUserOpened) {
					$(dm_OpenId).slideDown();
					$(dm_ActiveId).addClass('active');
					$("#pnl_MobileMenuOverlay").show();
				}
				else if ((type == 'M' && isMenuOpened) || (type == 'U' && isUserOpened)) {
					$("#headerMobile .active").removeClass("active");
					$(dm_OpenId).slideUp(function () {
						$("#pnl_MobileMenuOverlay").hide();
					});
				}
				else {
					$("#headerMobile .active").removeClass("active");
					$("#pnl_MobileMenuOverlay").show();
					$(dm_ActiveId).addClass('active');
					$(dm_CloseId).slideUp(function () {
						$(dm_OpenId).slideDown();
					});
				}

			} //_ShowMenu
			
	} //oFuncsMain


	});
})(jQuery);