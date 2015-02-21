jQuery(document).ready(function($){

	var calc = $('.calc');
	var calcInput = calc.find('#emcal-input');
	//Init
	calcInput.each(function(){
		$(this).val('').focus();
	});

	$('.emcal-bc-typepad tr td a').on('click', function(e){

		var disVal = $(this).html();

		if (disVal == 'C') {
			calcInput.val('');
		} else {
			
			switch(disVal) {
			    case 'x':
			        disVal = '*';
			        if (calcInput.val().indexOf('*') < 0) {
			    		calcInput.val(calcInput.val() + disVal);
			    	}
			        break;
			    case '/':
			        if (calcInput.val().indexOf('*') < 0) {
			    		calcInput.val(calcInput.val() + disVal);
			    	}
			        break;
			    case '+':
			        if (calcInput.val().indexOf('+') < 0) {
			    		calcInput.val(calcInput.val() + disVal);
			    	}
			        break;
			    case '-':
			        if (calcInput.val().indexOf('-') < 0) {
			    		calcInput.val(calcInput.val() + disVal);
			    	}
			        break;			        			        			        
			    case '=':
			    	if (calcInput.val().indexOf('=') < 0) {
			    		calcInput.val(eval(calcInput.val()));	
			    	}
			        break;
			    default:
			    	calcInput.val(calcInput.val() + disVal);
			}	
		}
		e.preventDefault();
		//alert($(this).html());

	});	

	calcInput.on('keydown', function(evt){
		var theEvent = evt || window.event;
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode( key );
		var regex = /[0-9+]|\./;
		if( !regex.test(key) ) {
			theEvent.returnValue = false;
			if(theEvent.preventDefault) theEvent.preventDefault();
		}
	});

    $('.emcal-money .nstSlider').nstSlider({
	    "left_grip_selector": ".leftGrip",
	    "value_bar_selector": ".bar",
	    "value_changed_callback": function(cause, leftValue, rightValue) {
	    var $container = $(this).parent();
	    var main = $(this).closest('.emcal-range-converter');
	    var datetimeVal = main.find('.emcal-datetime .unit-val .leftLabel').html();
	    var subTotal = main.find('.emcal-sub-val');
	    var total = main.find('.emcal-total-val');
	    var totalVal = eval(leftValue * datetimeVal);

	    var percenTage = parseFloat(main.find('.emcal-percent').html()).toFixed(4);
	    console.log(percenTage);

	    if(main.find('.emcal-percent').html() != undefined) {
	    	totalVal = eval(parseInt(totalVal * percenTage));
	    	console.log(totalVal);
	    }

	    //subdivider
	    var subTd = main.find('.sub-divider').html();
		switch(subTd) {
		    case 'week':
		    	var subVal = eval(leftValue / 4);
		        subTotal.text(subVal);
		        break;
		    case 'month':
		    	var subVal = eval(leftValue / 12);
		        subTotal.text(subVal);
		        break;
		} 
	    //Init
	    total.text(totalVal);
	    $container.find('.leftLabel').text(leftValue);
	    //$(this).find('.bar').css('background', 'rgb(' + [r, g, b].join(',') + ')');
	    }
    });

    $('.emcal-datetime .nstSlider').nstSlider({
	    "left_grip_selector": ".leftGrip",
	    "value_bar_selector": ".bar",
	    "value_changed_callback": function(cause, leftValue, rightValue) {
	    var $container = $(this).parent();
	    var main = $(this).closest('.emcal-range-converter');
	    var moneyVal = main.find('.emcal-money .unit-val .leftLabel').html();
	    var subTotal = main.find('.emcal-sub-val');
	    var total = main.find('.emcal-total-val');
	    var totalVal = eval(leftValue * moneyVal);

	    //subdivider
	    var subTd = main.find('.sub-divider').html();
		switch(subTd) {
		    case 'week':
		    	var valueInWeeks = eval(totalVal / leftValue);
		    	console.log(totalVal);
		    	console.log(valueInWeeks);
		    	var subVal = eval(valueInWeeks / 4);
		        subTotal.text(subVal);
		        break;
		    case 'month':
		    	var valueInWeeks = eval(totalVal / leftValue);
		    	var subVal = eval(valueInWeeks / 12);
		        subTotal.text(subVal);
		        break;
		} 
	    //Init
	    total.text(totalVal);	    
	    $container.find('.leftLabel').text(leftValue);
	    //$(this).find('.bar').css('background', 'rgb(' + [r, g, b].join(',') + ')');
	    }
    });


});