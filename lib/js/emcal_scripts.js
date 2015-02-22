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

	var main = $(document).find('.emcal-range-converter');
	var subTotal = main.find('.emcal-sub-val');
    var total = main.find('.emcal-total-val');
    var subTd = main.find('.sub-divider').html();
    var percent = main.find('.emcal-percent').html();


    $('.emcal-money .nstSlider').nstSlider({
	    "left_grip_selector": ".leftGrip",
	    "value_bar_selector": ".bar",
	    "value_changed_callback": function(cause, leftValue, rightValue) {
		    var $container = $(this).parent();

		    $container.find('.leftLabel').text(leftValue);
		    if (main.hasClass('onload') == false) {
		    	computeMoneyTotal();
		    }

	    //$(this).find('.bar').css('background', 'rgb(' + [r, g, b].join(',') + ')');
	    }
    });



    $('.emcal-datetime .nstSlider').nstSlider({
	    "left_grip_selector": ".leftGrip",
	    "value_bar_selector": ".bar",
	    "value_changed_callback": function(cause, leftValue, rightValue) {
	    var $container = $(this).parent();
	    $container.find('.leftLabel').text(leftValue);
	    if (main.hasClass('onload') == false) {
	    	computeMoneyTotal();
	    }	    
	    //$(this).find('.bar').css('background', 'rgb(' + [r, g, b].join(',') + ')');
	    }
    });
	
	function computeMoneyTotal() {
		var moneyVal = main.find('.emcal-money .unit-val .leftLabel').html();
		var datetimeVal = main.find('.emcal-datetime .unit-val .leftLabel').html();
	    var totalVal = eval(moneyVal * datetimeVal);

		var unit = main.find('.emcal-datetime .unit').html();

	    switch(unit) {
	    	case 'year':
		    	var y = eval(moneyVal * 4);
		    	totalVal = eval(y  * valDate);
	    	break;
	    	case 'month':
	    		totalVal = eval(moneyVal * datetimeVal);
	    	break;
	    }

	    if(percent != undefined) {
	    	var pMV = eval(percent / 100 * totalVal);
	    	totalVal = eval(totalVal + pMV);
	    	var pSV = eval(percent / 100 * moneyVal);
	    	moneyVal = pSV + parseInt(moneyVal);
	    }

	    total.text(totalVal);
	    computeMoneySubTotal(moneyVal);
	    main.removeClass('onload');

	}

	computeMoneyTotal();

	function computeMoneySubTotal(valPassed){
		switch(subTd) {
		    case 'week':
		    	var subVal = eval(valPassed / 4);
		        break;
		    case 'month':
		    	var subVal = eval(valPassed / 12);
		        break;
		}		

		subTotal.text(subVal);
	}


});