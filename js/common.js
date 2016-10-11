var loaded = true;
var menuTimer = null;

function setupForm(formID){
	// console.log(formID);
	var allFields = $('#online_form fieldset');
	var mandatoryFields = $('#online_form fieldset.'+formID);

	allFields.hide();
	mandatoryFields.show();
}

function loadContent(id){
	var url = "bin/func_getContent.php?lang="+lang_code+"&id="+id.substr(1);

	loaded = false;
	// loader();
	// console.log(url);

	TweenMax.to($('.column.left'), .25, {autoAlpha: .5});
	TweenMax.to($('#ajax'), .25, {autoAlpha: 1, onComplete: function(){
		var request = $.ajax({
				url: url,
				type: "GET",
				dataType: "html"
		});
		request.done(function(msg) {
			loaded = true;
			// console.log(msg);
			if(msg == 'redirect'){
				window.location.hash = '_';
			} else {
				$('.send .button').unbind();
				TweenMax.to($('#ajax, .column.left'), .25, {autoAlpha: 0, onComplete: function(){
					$('html, body').stop().animate({
						'scrollTop': 0
					});
					TweenMax.to($('.column.left'), .25, {autoAlpha: 1, delay: .5, onComplete: function(){
						$('.column.left').empty().html(msg);
						if(hash == '#_'){
							$('body').addClass('fooldal');
						} else {
							// $('body').removeClass('fooldal');
							$('body').attr('class',id.substr(1));
						}
						$('.send .button').bind('click', sendMsg);
						$('.button[data-faq]').bind('click', prepareFAQ);

						$('.munkatarsak .v_card.half_width, .staff .v_card.half_width').bind('click', popupEmployee);

						if($('select[name=szolgaltatas]').length){
							setupForm($('select[name=szolgaltatas]').val());

							$('select[name=szolgaltatas]').change(function(){
								setupForm($(this).val());
							});
						}

						$('.button.add_realty').click(function(){
							var $this = $(this);
							var realtyNum = $this.attr('data-realty_num');

							if (realtyNum < 4){
								var lastRealty = $this.siblings('.ingatlan_adatok').last();
								var newRealty = lastRealty.clone();

				                realtyNum++;

								// console.log(lastRealty);
								// console.log(newRealty);

				                newRealty.insertAfter(lastRealty);

								// newRealty = $this.siblings('ingatlan_adatok').last();

				                newRealty.wrap('<form>').closest('form').get(0).reset();
				                newRealty.unwrap();

				                // var newRealtyTitle = realtyNum + newRealty.find('.realty_num span').html().slice(1);

				                // newRealty.find('.realty_num span').html(newRealtyTitle);
				                // newRealty.find('input[type=hidden]').html(realtyNum+'. ingatlan');

								if(lang_code == 'en'){
						                newRealty.find('.realty_num span').html('Property No. '+realtyNum);
				                } else { // "hu"
						                newRealty.find('.realty_num span').html(realtyNum+'. ingatlan');
				                }


				                // var inputs = newRealty.find('input[type=text]');
				                var inputs = newRealty.find('input');

				                inputs.each(function(i){
				                	var input = $(this);
				                	var name = input.attr('name');

				                	input.attr('name',name.replace(realtyNum-1,realtyNum));
				                });


								$this.attr('data-realty_num',realtyNum);
							}
						});

					}});
				}});



			}
		});
		request.fail(function(jqXHR, textStatus) {
			// console.log(jqXHR+'; '+textStatus);
		});
	}});

}

function popupEmployee(){
	TweenMax.set($('#overlay'), {autoAlpha: 0});

	var $this = $(this);
	var pos = $this.offset();
	var employee = $this.clone();

	employee.css('left', (pos.left-$(window).scrollLeft())+'px');
	employee.css('top', (pos.top-$(window).scrollTop())+'px');

	// console.log($this);
	$('#overlay').append(employee);

	$('#overlay *').bind('click', function(e){
		e.stopPropagation();
	});

	var target = {
		width: 448,
		height: 377
	}

	TweenMax.to($('#overlay'), .25, {display: 'block', autoAlpha: 1, onComplete: function(){
		TweenMax.to(employee, .25, {delay: .5, width: target.width+'px', height: target.height+'px', left: Math.round(($(window).innerWidth()-target.width)/2)+'px', top: Math.round(($(window).innerHeight()-target.height)/2)+'px'});
		TweenMax.to(employee.children('img'), .25, {delay: .5, width: '252px', height: '375px'});
		TweenMax.to(employee.children('img.thumb'), .25, {delay: .5, autoAlpha: 0});
		TweenMax.to(employee.children('span'), .25, {delay: .5, paddingLeft: '260px', onComplete: function(){
			TweenMax.to(employee.children('p'), .25, {delay: .5, height: '240px'});
			$('#overlay_close').addClass('visible');
		}});
	}});
}

function loader(){
	TweenMax.staggerTo($('#ajax .square'), 2, {left: "105%", ease:BezierCurve.loader}, .15, function(){
		TweenMax.set($('#ajax .square'), {left: "-5%"});
		if(!loaded) setTimeout(loader, 500);
	});
}

function prepareFAQ(){
		var name = $(this).siblings('.name').html();
		var email = $(this).attr('data-faq').replace('-NAKNEK-', '@').replace('-NALNEL-', '.');

		// console.log(name+': '+email);

		$('#recipient').val(email);
		$('#recipient_name').val(name);

		showFAQ();
}

function showFAQ(){
	$('.box_utils').css('height','128px');
	$('.faq_form_element').css('display','block').css('opacity','0').css('top','32px');
	$('.right_button.faq').addClass('active');
//	$('.box_utils').css('maxHeight','640px');
	var formHeight = $('#faq_form').height();

	TweenMax.to($('.box_utils'), .5, {height: "+="+formHeight, ease:Power1.easeOut, onComplete: function(){
	}});
	TweenMax.staggerTo($('.faq_form_element'), .1, {autoAlpha: 1, top: 0, /*rotationX: 0,*/ delay: .25, ease:Power1.easeOut}, .05, function(){
		$('#faq_form').find('.form_name input').focus();
	});
}

function hideFAQ(keepContent){
	keepContent = typeof keepContent !== 'undefined' ? keepContent : true;
	var formHeight = $('#faq_form').height();
	TweenMax.staggerTo($('.faq_form_element').get().reverse(), .1, {autoAlpha: 0, top: 32, /*rotationX: 0,*/ delay: .25, ease:Power1.easeOut}, .05, function(){
		TweenMax.to($('.box_utils'), .5, {height: "-="+formHeight, ease:Power1.easeOut, onComplete: function(){
			$('.box_utils').css('height','128px');
			$('.faq_form_element').css('opacity','0').css('top','32px').css('display','none');
			$('.right_button.faq').removeClass('active');
			// $('#faq_form').find('input[type=hidden]').val($(this).attr('data-default'));
			$('#faq_form').find('input[type=hidden]').each(function(){
				var $this = $(this);
				$this.val($this.attr('data-default'));
			});
			if(!keepContent) $('#faq_form').find('input[type=text], select, textarea').val('');
		}});
	});

//	$('.box_utils').css('maxHeight','640px');
}

function sendMsg(){
	// console.log($(this));

	// var $this = $(this);
	var $this = $(this).closest('form');
	var thisID = $this.attr('id');
	var postData = [];
	var formURL = $this.attr('action');

	if(thisID == 'online_form'){
		var selectedService = $('select[name=szolgaltatas]').val();
		var fields = $('#online_form fieldset.'+selectedService);

		// var tempData = [];

		fields.each(function(){
			var fieldArray = $(this).serializeArray();

			for(var i = 0;i < fieldArray.length; i++){
				postData.push(fieldArray[i]);
				console.log('name:',fieldArray[i].name,'value:',fieldArray[i].value)
			}
		});

		console.log(postData);

		// postData = $this.serializeArray();
	} else {
		postData = $this.serializeArray();
	}

	if(postData.length){

		$.ajax({
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				// alert(data);
				// var response;
				// window.console && console.log(data);

				// for (var property in data) {
				//     if (data.hasOwnProperty(property)) {
				//         response = property;
				//     }
				// }

				data = data.replace(/(?:\r\n|\r|\n)/g, '');

				window.console && console.log(data);

				if(data == 'mail_sent'){
					hideFAQ(thisID != 'faq_form');
					if(thisID != 'faq_form'){
						$this[0].reset();
						setupForm('fs_null');
					}
				}/* else {
				}*/
				window.console && console.log('\''+data+'\'');

				switch(data){
					case 'mail_sent':
						$('#feedback').html('Köszönjük üzenetét, hamarosan keresni fogjuk!');
						break;
					case 'invalid_email':
						$('#feedback').html('A megadott e-mail cím érvénytelen!');
						break;
					case 'form_not_filled':
						$('#feedback').html('Az űrlap kitöltése hiányos!');
						break;
					case 'captcha_invalid':
						$('#feedback').html('A megadott ellenörzőszöveg helytelen!');
						break;
					default:
						$('#feedback').html('Ismeretlen hiba, kérjük próbálkozzon újra később!');
						break;
				}

				$('#feedback').addClass('visible');

				setTimeout(function(){
					$('#feedback').removeClass('visible');
				}, 5000);

				// clearFAQ();
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert('Hiba történt! Kérjük próbálkozzon ismét később! ('+errorThrown+')');
			}
		});
	}
}



function scrollBg(){
	var scroll = $(window).scrollTop();

	if(!scroll) scroll = 0;

	$('body').css('backgroundPosition','center '+Math.round(scroll/2)+'px');
}

$(document).ready(function(){

	$('a').click(function(e){
		// e.preventDefault();
	})

	var autoplay = setInterval(function(){
		$('.pager_arrow.right').trigger('click');
	}, 10000);


	$('.pager_arrow.left').on('click',function(){
		var $parent = $(this).closest('#carousel').find('ul.carousel'),
			$pager = $(this).closest('#carousel').find('ul.pager_dots'),
			$items = $parent.find('li'),
			$last = $parent.find('li:last'),
			$offset = $parent.width(),
			$num_per_page = Math.round($offset / $items.outerWidth()),
			$item_qty = $items.length;

		if(!$parent.hasClass('animating')){

			$parent.addClass('animating').css('text-indent','-'+$offset+'px');

			for(i=1;i<=$num_per_page;i++){
				$parent.prepend($last);
				$last = $parent.find('li:last');
			}

			var $thisSlide = $parent.find('li').eq(1).children().get().reverse();
			var $prevSlide = $parent.find('li').eq(0).children().get().reverse();

			TweenMax.staggerTo($thisSlide, .5, {marginLeft: '100%', ease:Power3.easeOut}, .1);
			TweenMax.staggerTo($prevSlide, .5, {marginLeft: '100%', delay: .35, ease:Power3.easeOut}, .1, function() {
				TweenMax.set([$thisSlide, $prevSlide], {marginLeft: 0});
				$parent.css('text-indent','0px');
				$pager.find('li').removeClass('active');
				$pager.find('[data-th='+$parent.find('li:first').attr('data-th')+']').addClass('active');
				var animTimer = setTimeout(function(){
					$parent.removeClass('animating');
				}, 150);
			});

			// $parent.animate({
			// 	textIndent: '+='+$offset
			// 	}, 250, function() {
			// 		$parent.removeClass('animating').css('text-indent','0px');
			// 		$pager.find('li').removeClass('active');
			// 		$pager.find('[data-th='+$parent.find('li:first').attr('data-th')+']').addClass('active');
			// });
		}
	});

	$('.pager_arrow.right').on('click',function(){
		var $parent = $(this).closest('#carousel').find('ul.carousel'),
			$pager = $(this).closest('#carousel').find('ul.pager_dots'),
			$items = $parent.find('li'),
			$first = $parent.find('li:first'),
			$offset = $parent.width(),
			$num_per_page = Math.round($offset / $items.outerWidth()),
			$item_qty = $items.length;

		if(!$parent.hasClass('animating')){

			$parent.addClass('animating').css('text-indent','0px');

			var $thisSlide = $parent.find('li').eq(0).children();
			var $nextSlide = $parent.find('li').eq(1).children();

			TweenMax.staggerTo($thisSlide, .5, {marginLeft: '-100%', ease:Power3.easeOut}, .1);
			TweenMax.staggerTo($nextSlide, .5, {marginLeft: '-100%', delay: .35, ease:Power3.easeOut}, .1, function() {
				for(i=1;i<=$num_per_page;i++){
					$first.appendTo($parent);
					$first = $parent.find('li:first');
				}
				TweenMax.set([$thisSlide, $nextSlide], {marginLeft: 0});
				$parent.css('text-indent','0px');
				$pager.find('li').removeClass('active');
				$pager.find('[data-th='+$parent.find('li:first').attr('data-th')+']').addClass('active');
				var animTimer = setTimeout(function(){
					$parent.removeClass('animating');
				}, 150);
			});




			// $parent.animate({
			// 	textIndent: '-='+$offset
			// 	}, 250, function() {
			// 		for(i=1;i<=$num_per_page;i++){
			// 			$first.appendTo($parent);
			// 			$first = $parent.find('li:first');
			// 		}
			// 		$parent.removeClass('animating').css('text-indent','0px');
			// 		$pager.find('li').removeClass('active');
			// 		$pager.find('[data-th='+$parent.find('li:first').attr('data-th')+']').addClass('active');
			// });
		}
	});

	$('.pager_dots').on('click','li',function(){
		var $parent = $(this).closest('#carousel').find('ul.carousel'),
			$pager = $(this).closest('#carousel').find('ul.pager_dots'),
			$items = $parent.find('li'),
			$first = $parent.find('li:first'),
			$second = $first.next(),
			$clicked = $(this).attr('data-th'),
			// $offset = $parent.width(),
			$offset = $items.width(),
			$num_per_page = Math.round($offset / $items.outerWidth()),
			$item_qty = $items.length;


		if(!$(this).hasClass('active') && !$parent.hasClass('animating')){
			var $qty = $parent.find('[data-th='+$clicked+']').index(),
				$to_skip = $items.slice(0,$qty);

			console.log($qty+' '+$to_skip);

			$pager.find('li').removeClass('active');
			$(this).addClass('active');

			// $to_skip.appendTo($parent);
			$parent.addClass('animating').css('text-indent','0px');
			$parent.animate({
				textIndent: '-='+$qty*$offset
				}, $qty*250, function() {
					$to_skip.appendTo($parent);
					$parent.removeClass('animating').css('text-indent','0px');
					console.log('clicked: '+$clicked+'; shown: '+$parent.find('li:first').attr('data-th'));
			});
		}




		if(!$parent.hasClass('animating')){

			$parent.addClass('animating').css('text-indent','0px');

			$parent.animate({
				textIndent: '-='+$offset
				}, 300, function() {
					for(i=1;i<=$num_per_page;i++){
						$first.appendTo($parent);
						$first = $parent.find('li:first');
					}
					$parent.removeClass('animating').css('text-indent','0px');
					$pager.find('li').removeClass('active');
					$pager.find('[data-th='+$parent.find('li:first').attr('data-th')+']').addClass('active');
			});
		}
	});


/*	$('nav ul li.item').on('mouseenter',function(){

		var classStr = $(this).find('a').attr('href').substr(1);
		var submenu = $('.submenu.'+classStr);


		if(submenu.length){
			console.log(classStr+' '+submenu.length);
			clearTimeout(menuTimer);
			$('.submenu').removeClass('active');
			submenu.addClass('active');
		}

	}).on('mouseleave',function(){
		menuTimer = setTimeout(function(){
			$('.submenu').removeClass('active');
		}, 500);
	});

	$('.submenu').on('mouseenter',function(){
		clearTimeout(menuTimer);
	}).on('mouseleave',function(){
		menuTimer = setTimeout(function(){
			$('.submenu').removeClass('active');
		}, 500);
	});*/

	$('.links li').on('mouseenter',function(){
		var $this = $(this);
		var descriptions = $this.closest('.submenu').find('.descriptions');

		// console.log(descriptions);
		descriptions.attr('class','descriptions '+$this.find('a').attr('href').substr(1));
	});

	// $('a.faq_to').on('click','.column',function(e){
	// 	e.preventDefault();

	// 	var name = $(this).closest('.contact').siblings('.name').html();
	// 	var email = $(this).attr('data-faq').replace('-NAKNEK-', '@').replace('-NALNEL-', '.');

	// 	console.log(name+': '+email);

	// 	// $('#recipient').val(email);
	// 	// $('#recipient_name').val(name);

	// });

	$('.right_button.faq').on('click',function(){
		if($(this).hasClass('active')){
			hideFAQ();
		} else {
			showFAQ();
		}
	});

	// $('body').on('submit','form',(function(e){
	// $('.send .button').on('click','column',(function(e){
	// 	// e.preventDefault(); //STOP default action
	// 	console.log($(this));

	// 	// var $this = $(this);
	// 	var $this = $(this).closest('form');
	// 	var postData = $this.serializeArray();
	// 	var formURL = $this.attr('action');

	// 	$.ajax({
	// 		url : formURL,
	// 		type: "POST",
	// 		data : postData,
	// 		success:function(data, textStatus, jqXHR) 
	// 		{
	// 			// alert(data);
	// 			// var response;
	// 			// window.console && console.log(data);

	// 			// for (var property in data) {
	// 			//     if (data.hasOwnProperty(property)) {
	// 			//         response = property;
	// 			//     }
	// 			// }


	// 			if(data == 'mail_sent'){
	// 				hideFAQ($this.attr('id') != 'faq_form');
	// 			} else {
	// 				window.console && console.log(data);
	// 			}
	// 			// clearFAQ();
	// 		},
	// 		error: function(jqXHR, textStatus, errorThrown) 
	// 		{
	// 			alert('Hiba történt! Kérjük próbálkozzon ismét később! ('+errorThrown+')');
	// 		}
	// 	});
	// 	// e.unbind(); //unbind. to stop multiple form submit.
	// }));


	$('#overlay_close').on('click',function(){
		var $this = $(this);
		var overlay = $('#overlay');

		$this.removeClass('visible');
		TweenMax.to(overlay, .2, {autoAlpha: 0, onComplete: function(){
			overlay.html('');
		}});
	});


});

$(window).on('hashchange',function(){
	getHash();
	hideFAQ();
	loadContent(hash);
}).scroll(function(){
	scrollBg();
});