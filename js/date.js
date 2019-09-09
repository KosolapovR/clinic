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
		data: {date: $(this).val()}
        
	})
	.done(function(response) {
		console.log("Всё хорошо, сервер вернул ответ");
        showMsg(response);
	})
	.fail(function() {
		console.log("Что-то на сервере не так");
    
	});
})
}
    
);
