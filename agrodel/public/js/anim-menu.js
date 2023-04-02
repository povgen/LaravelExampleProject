$(document).ready(function(){
	window.addEventListener("DOMContentLoaded", function() {
	function setCursorPosition(pos, elem) {
	    elem.focus();
	    if (elem.setSelectionRange) elem.setSelectionRange(pos, pos);
	    else if (elem.createTextRange) {
	        var range = elem.createTextRange();
	        range.collapse(true);
	        range.moveEnd("character", pos);
	        range.moveStart("character", pos);
	        range.select()
	    }
	}
	 
	function mask(event) {
	    var matrix = "+7 (___) ___ ____",
	        i = 0,
	        def = matrix.replace(/\D/g, ""),
	        val = this.value.replace(/\D/g, "");
	    if (def.length >= val.length) val = def;
	    this.value = matrix.replace(/./g, function(a) {
	        return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
	    });
	    if (event.type == "blur") {
	        if (this.value.length == 2) this.value = ""
	    } else setCursorPosition(this.value.length, this)
	};
	    var input = document.querySelector("#tel");
		if (input != null) {
		    input.addEventListener("input", mask, false);
		    input.addEventListener("focus", mask, false);
		    input.addEventListener("blur", mask, false);
		}
	});

	var touch = $('#java');
    var menu = $('.nav-ul');
 
    $(touch).on('click', function(e) {
        e.preventDefault();
        menu.slideToggle();
    });
    $(window).resize(function(){
        var wid = $(window).width();
        if(wid > 760 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
   
});

function updateTotalPrice() {
	var prices = document.querySelectorAll('.price');
	var countInput = document.querySelectorAll('.count-input');
	var totalPrice = 0;

	for (var i = 0; i < prices.length; i++) 
		totalPrice += prices[i].innerHTML * countInput[i].value;


	document.querySelector("#total-price").innerHTML = totalPrice;
	// console.log(route);
}	


function sendRequest (key, count) {
    $.get(route, 
    	{
    	key: key,
    	count: count 
    }, onAjaxSuccess);
}

function onAjaxSuccess(data)
{
  // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
        $('.result').html( data );
}

function reduce(key) {
	var input = document.querySelector("#count-input"+key);
		if (input.value > 1)
		    input.value--;

	updateTotalPrice();
    sendRequest(key, input.value);

}


function increase(key) {
	var input = document.querySelector("#count-input"+key);
    input.value++;
    sendRequest(key, input.value);
	updateTotalPrice();
}

