$(document).ready(function(){
    
    function popUpPreventDoubleNote(){
    $('.hidden_double_popUp').addClass('prevent_double_notes');
    $('.hidden_double_popUp').removeClass('hidden_double_popUp');
    }
    
    $('#close').on('click', function(){
    $('.prevent_double_notes').addClass('hidden_double_popUp');
    $('.prevent_double_notes').removeClass('prevent_double_notes');
    })
    
    function showMsg($msg){
        console.log($msg);
       
    }
    function preventDoubleNote($msg){
      
        if($msg == 'true'){
            popUpPreventDoubleNote();
        }
    }
    
    /*
    *   Отображение доступного времени записи 
    *   при выборе конкретной даты
    */
    
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
    
    /*
    *    подтверждение выбора времени
    */
    
    $('main').on('click', '.time', function(){
        time = $(this).html(),
        date = $('#start').val();
        
        // вставляем выбранную дату и время 
        // в popUp окно с подтверждением
        $('#date_span').html(date);
        $('#time_span').html(time);
        
        // popUp окнo появление
        $('.hidden_popUp').addClass('show_popUp');
        $('.hidden_popUp').removeClass('hidden_popUp');
  
        
        //подтверждение записи   
        //.off - очищает память клика
        $('#yes').off('click');
        $('#yes').on('click', function(event){
            event.preventDefault();

            var date = $('#start').val(),
                login = $('#login').html(),
                url = document.location.href;
            
                console.log('Выбрана дата:' + date); 
                console.log('Выбрано время:' + time); 
                console.log('Выбран url:' + url);
                console.log();
            // Отправляем запрос
            $.ajax({
                url: '/add_to_queue.php',
                type: 'POST',
                data: {
                    date: date,
                    url: url,
                    time: time,
                    session: document.cookie,
                    login: login 
                }
            })
            .done(function(response) {
                $(".time").remove();
                console.log("Всё хорошо, сервер вернул ответ");
                preventDoubleNote(response);
               // showMsg(response);
                
            })
            .fail(function() {
                console.log("Что-то на сервере не так");
            });
            // popUp окнo
                $('.show_popUp').addClass('hidden_popUp');
                $('.show_popUp').removeClass('show_popUp');
        })  
        
        //отмена выбора времени
        
        $('#no').off('click');
        $('#no').on('click', function(event){
            event.preventDefault();
            // popUp окнo
            $('.show_popUp').addClass('hidden_popUp');
            $('.show_popUp').removeClass('show_popUp');
        })
     })  
});
