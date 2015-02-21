jQuery(document).ready(function($){

	var adminMain = $('#emcal-admin');

	//For Tabs
	var tabBtns = adminMain.find('.tabs li a');

	tabBtns.on('click', function(e){
		e.preventDefault();
		var ind = $(this).closest('li').index();

		if ($(this).hasClass('active') == false) {
			tabBtns.removeClass('active');
			$(this).addClass('active');
			$('.tabs-wrap').hide();
			$('.tabs-wrap:eq('+ind+')').fadeIn();
		}

	});

	$('#emcal-font-awesome').on('change', function(){
		var dis = $(this);
		var className = dis.find('option:selected').attr('class');
		var fS = dis.next('#emcal-fontsample');
		fS.removeAttr('class');
		fS.addClass(className);
	});

});