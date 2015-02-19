$(document).ready(function(e) {
	
	var $slide = $('body').find('.slide'),
		i = 0;	
	$('body').find('#slide1').addClass('active');
	$('.active').siblings().fadeOut(500);

	var slideInterval = setInterval(nextSlide, 5000);
	
	function nextSlide(){
		i++;
		if(i < 3){
		$('.active').fadeOut(500).removeClass('active').next().addClass('active').fadeIn(1000);
		} else {
			i = 0;
			$slide.removeClass('active').fadeOut(500).first().addClass('active').fadeIn(1000);
			
		}
		
	}
	
	var $nav = $('body').find('[role=navigation]'),
		$widgettitle = $('.widget h2, .widget h3');
	
	$('.widget ul, .widget ol').hide();
	$widgettitle.on('click', function(e){
		$(this).siblings('ul, ol').slideToggle();
		$(this).toggleClass('drop');
	});
	
	$('body').find('#commentform textarea').elastic();
});