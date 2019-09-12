$(document).ready(function(){
    
    function showMsg($msg){
        console.log($msg);
    }
    $('#start').on('change', function(event) {
	console.log('Выбрана дата:' + $(this).val());
    
	// Отправляем запрос
	$.ajax({
		url: '/ajax.php',
		type: 'POST',
		data: {date: $(this).val(),
        url: document.location.href}
        
	})
	.done(function(response) {
        $(".time").remove();
		console.log("Всё хорошо, сервер вернул ответ");
        showMsg(JSON.parse(response));
        var array = JSON.parse(response);
        for(var i = 0; i < array.length; ++i){
            
            $(".times").append("<p class=\"time\">" + array[i] + "</p>");
        }
        
	})
	.fail(function() {
		console.log("Что-то на сервере не так");
    
	});
})
    // выбор времени
    $('main').on('click', '.time', function(){
   // popUp окно
    
       $('.hidden_popUp').addClass('show_popUp');
        $('.hidden_popUp').removeClass('hidden_popUp');

        
         })
}
);
