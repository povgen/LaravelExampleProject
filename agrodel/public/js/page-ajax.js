 $(document).ready(function(){  
    $('.tovari').click(function(){  
        $.ajax({  
            url: "tovari.php",  
            cache: false,  
            success: function(php){  
                $(".content-pod").php(php);  
            }  
        });  
    });  
});  
//  function sendRequest (route, msg) {
//     $.get(route, function( data ) {
//         $('.result').html( data );
//         alert( 'Товар добавлен в корзину' );
//     });
// }