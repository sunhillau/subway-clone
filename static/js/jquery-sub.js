///<reference path="/scripts/jquery.js" />

		var isMobile = ($(window).width() < 700);


		$(function () {
			if (!isMobile) { $('meta[name=viewport]').attr('content', 'initial-scale=0.75, maximum-scale=1, user-scalable=yes'); }

			$("input[placeholder],textarea[placeholder]").placeholder();
			$("textarea[autogrow]").livequery(function () {
				$(this).autosize();
			});

			$("#headerMobile .menu_left_mobile").click(oEventsMain.menuMobileLeftClick);
			$("#headerMobile .menu_right_mobile").click(oEventsMain.menuMobileRightClick);
			$("#tbx_FindRestaurantMobile, #tbx_FindRestaurant").keypress(oEventsMain.tbx_FindRestaurant_keypress);
			$("#cmd_FindRestaurant").click(oEventsMain.cmd_FindRestaurant_Click);
			$(document).on("click", ".clickable", oEventsMain.clickable_Click);
			$(document).on("click", ".clickable a", oEventsMain.clickableA_Click);

			$("#menuSide").next().remove();
			$("#pnl_MobileMenuOverlay").click(oEventsMain.pnl_MobileMenuOverlay_Click);
			$(document).keypress(oEventsMain.document_KeyPress);
			$(window).scroll(oEventsMain.window_Scroll);

			$(document).on("click", "a[track]", oEventsMain.aTrack_Click);
			oFuncsMain.Init();
		});

		var oEventsMain = {
			 HeaderAnimating: false
			,HeaderShrinked: false
			,aTrack_Click: function () {
				var $a = $(this);

				var dm_url = $a.attr('href');
				var dm_text = $a.attr('title') || '';
				if (dm_text == '') dm_text = $a.html() || '';
				if (dm_text == '') dm_text = dm_url;

				dm_text = $.trim(dm_text);
				var dm_promo = $a.attr('track') || '';

				try {
					_gaq.push(['_trackEvent', 'LinkGeneral', 'Click', dm_text]);
					_gaq.push(['_trackEvent', 'Link' + dm_promo, 'Click', dm_text]);
				} catch (e) { }

				window.location.href = dm_url;
			} //aTrack_Click

			, menuMobileLeftClick: function () {
				oFuncsMain._ShowMobileMenu();
			} //menuMobileLeftClick

			, menuMobileRightClick: function () {
				oFuncsMain._ShowMobileUser();
			} //menuMobileRightClick

			, window_Scroll: function (a, b) {
				var dm_isMobile = ($(window).width() < 700);
				var dm_Top = $(window).scrollTop();

				if (!dm_isMobile && !oEventsMain.HeaderAnimating) {
					if (dm_Top > 100 && !oEventsMain.HeaderShrinked) {
						oEventsMain.HeaderShrinked = true;
						$("#header").animate({ 'padding-top': '2px', 'padding-bottom': '2px' }, 'fast', function () { oEventsMain.HeaderAnimating = false; });
						$(".pnl_Social").fadeOut('fast');
					}

					if (dm_Top <= 100 && oEventsMain.HeaderShrinked) {
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

			, document_KeyPress: function (e,node) {
				if (e.keyCode === 13 && e.target.type != 'textarea') {
					e.preventDefault();
					return false;
				}
			} //document_KeyPress

			, cmd_FindRestaurant_Click: function () {
				oFuncsMain._FindStore($("#tbx_FindRestaurant"));
			} //cmd_FindRestaurant_Click

			, tbx_FindRestaurant_keypress: function (e) {
				if (e.which == 13) {
					oFuncsMain._FindStore(this);
				}
			} //tbx_FindRestaurantMobile_keypress
			, pnl_MobileMenuOverlay_Click: function () {
				oFuncsMain._ShowMenu();
			} //pnl_MobileMenuOverlay_Click
		} //oEventsMain

		var oFuncsMain = {

			Init: function () {
				oFuncsMain._MenuSetUp();
				oMenuPromoLink.Init();

				$("input[disabled],textarea[disabled]").addClass("inputDisabled");
				google.maps.event.addDomListener(window, 'load', oFuncsMain._FindStoreAutocomplete);


				$("#pnl_Menu a").each(function (ix, obj) {
					var $obj = $(obj);
					var dm_url = $obj.attr('href') || '';

					dm_url = dm_url.toLowerCase()

					if (dm_url == '/current-offer' || dm_url == '/store-locator')
						$(obj).attr('track', 'MainMenu');

				});

				$("a[track]").each(function (ix, obj) {
					$(obj).attr("onclick", "return false;");
				});
			} //Init

			, _MenuSetUp: function () {
				var dm_MenuTitle = $("#hdn_MenuPromoTitle").val();
				var dm_MenuUrl = $("#hdn_MenuPromoUrl").val();
				$(".pnl_MenuSite").each(function (ix, obj) {
					$(this).find("a.menuItem:first").html(dm_MenuTitle)
													.attr('href', dm_MenuUrl)
													;
				});

				$("#pnl_Menu").fadeIn();
			} //hdn_MenuPromoTitle

			, _FbInit: function () {
				$(".fbCtrl").fadeIn();
			} //_FbInit

			, _FindStoreAutocomplete: function () {
				$(".tbx_FindRestaurantMain").each(function (ix, obj) {
					var dmId = $(obj).attr('id');

					var options = {
						componentRestrictions: { country: 'au' }
						, types: ['geocode']
					};
					var autocomplete = new google.maps.places.Autocomplete(document.getElementById(dmId), options);
					google.maps.event.addListener(autocomplete, 'place_changed', function () {
						var place = autocomplete.getPlace();
						var dm_url = "/Store-Locator";
						dm_url += "?q=" + $(obj).val();
						try {
							dm_url += "&lat=" + place.geometry.location.lat();
							dm_url += "&lng=" + place.geometry.location.lng();
						} catch (e) { }
						window.location.href = dm_url;

					});
				});
			} //_FindStoreAutocomplete

			, _FindStore: function (obj) {
				var dm_parm = $(obj).val();
				var dm_url = '/Store-Locator?q=' + dm_parm;
				window.location.href = dm_url;
			} //_FindStore
			, _ShowMobileUser: function () {
				oFuncsMain._ShowMenu('U');
			} //_ShowMobileUser

			, _ShowMobileMenu: function () {
				oFuncsMain._ShowMenu('M');
			} //_ShowMobileMenu

			, _ShowMenu: function (type) {
				$(window).scrollTop(0);

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

		var oMenuPromoLink = {
			data: [],
			Init: function() {
				oMenuPromoLink.LoadMenu();
			},
			LoadMenu: function() {
				var ar_MenuLinks = $("#hdn_MenuLinks").val().split('|');

				$.each(ar_MenuLinks, function(ix, obj) {

					var arItem = obj.split(';');

					if (arItem.length > 0) {
						var Title = arItem[0];
						var Url = arItem[1];

						if (Title !== '' && Url !== '') {
							var oItem = {
								title: Title,
								url: Url
							};
							oMenuPromoLink.data.push(oItem);
						}
					}
				});

				oMenuPromoLink.BuildPopUpMenu();

			},
			BuildPopUpMenu: function() {

				if (oMenuPromoLink.data.length === 0) return;

				
				var $subMenu = $("<div/>").addClass("subMenu").hide();

				$.each(oMenuPromoLink.data, function (ix, obj) {
					var $a = $("<a/>").attr('href', '/current-offer/' + obj.url)
									  .html(obj.title);

					var $item = $("<div/>").addClass("subMenuItem").append($a);

					$subMenu.append($item);

				});


				var $td = $("#pnl_Menu table table tr:first td:first");
				$td.append($subMenu);
				$td.mouseenter(function() {
					$subMenu.show();
				});
				$td.mouseleave(function () {
					$subMenu.hide();
				});

				var $li = $("#menuMobileLeftItems ul li:first");
				var $subMenuMobile = $subMenu.clone();
				$subMenuMobile.show();
				$li.append($subMenuMobile);

			}

		}
	
		function tbFacebookLogin() {
			//FB.getLoginStatus(function (response) {
			//	fbStatusChange(response);
			//});
			var scope = angular.element(document.getElementById("frmMainApp")).scope();

			scope.$apply(function () {
				scope.FacebookLogin();
			});
		}

		function tbFacebookLink(response) {
			console.log(response);
			alert(response);
		}

		function fbStatusChange(response) {
			var scope = angular.element(document.getElementById("frmMainApp")).scope();

			scope.$apply(function () {
				scope.FacebookLoginWatch(response);
			});
		}
