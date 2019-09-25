$(document).ready(function(){
    
    var category;
    function popUpPreventDoubleNote(){
    $('.hidden_double_popUp').addClass('prevent_double_notes');
    $('.hidden_double_popUp').removeClass('hidden_double_popUp');
    }
    $('#close').on('click', function(){
    $('.prevent_double_notes').addClass('hidden_double_popUp');
    $('.prevent_double_notes').removeClass('prevent_double_notes');
    })
    function preventDoubleNote($msg){
      
        if($msg == 'true'){
            popUpPreventDoubleNote();
        }
    }
    $('.categories li').on('click', function(){
       category = $(this).attr('id');
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $('.times').css('border', '1px solid #636e72');
        
    });
    
    /*
    * сохранение данных в формате CSV
    */
    $('.csv').on('click', function(){
        let data = [];
        let id = $('tr.rows').children('.id');
        for(let i = 0; i< $('.rows').length; i++){
           
            data.push(id[i].innerHTML);
            
        }
        //console.log(data);
        //data = JSON.stringify(data);
        //console.log(data);
    
       
        $.ajax({
                url: '/ajax/csv.php',
                type: 'POST',
                data: {
                    data: data,         
                }
            })
            .done(function(response) {
                console.log("Всё хорошо, сервер вернул ответ"); 
            console.log(response);
            })
            .fail(function() {
                console.log("Что-то на сервере не так");
            });
    });
    /*
    * фильтрация данных таблицы записей
    */
    $('.filter').on('change', function(){
        let category = ($('#category_select').val());
        let doctor = ($('#doctor_select').val());
        let user = ($('#user_select').val());
        let date = ($('#date_select').val());
        let time = ($('#time_select').val());
// Отправляем запрос
        $.ajax({
                url: '/ajax/get_data_queue.php',
                type: 'POST',
                data: {
                    date: date,
                    time: time,
                    login: user,
                    doctor: doctor,
                    category: category
                }
            })
            .done(function(response) {
               
                console.log("Всё хорошо, сервер вернул ответ");
                let notes = JSON.parse(response);
            $('.shedule .rows').remove();
                for(let key in notes){
                    notes[key]['id'];
                    $('.shedule').append('<tr class="rows"><td class="id">' + notes[key]['id'] + '</td><td>' + notes[key]['category'] + '</td><td>' + notes[key]['doctor'] + '</td><td>' + notes[key]['user'] + '</td><td>' + notes[key]['date'] + '</td><td>' + notes[key]['time'] + '</td><td><div class="delete delete_note"></div></td></tr>');
                }
               
            })
            .fail(function() {
                console.log("Что-то на сервере не так");
            });
    });          
    /*
    * Выбор даты
    */
 
    $('#start').on('change', function(event) {
	// Отправляем запрос
	$.ajax({
		url: '/ajax/ajax.php',
		type: 'POST', 
		data: {date: $(this).val(),
        url: document.location.href,
        category: category,
        login: $('select').val()}        
	})
	.done(function(response) {
        $(".time").remove();
		console.log("Всё хорошо, сервер вернул ответ");
        console.log((response));
        var array = JSON.parse(response);
        for(var i = 0; i < array.length; ++i){
            
            $(".times").append("<p class=\"time\">" + array[i] + "</p>");
        }        
	})
	.fail(function() {
		console.log("Что-то на сервере не так"); 
	});
        
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
                login = $('select').val(),
                url = document.location.href;
            
                console.log('Выбрана дата:' + date); 
                console.log('Выбрано время:' + time); 
                console.log('Выбран url:' + url);
                console.log('Выбран Login:' + login);
            // Отправляем запрос
            $.ajax({
                url: '/ajax/add_to_queue.php',
                type: 'POST',
                data: {
                    date: date,
                    url: url,
                    time: time,
                    session: document.cookie,
                    login: login,
                    category: category
                }
            })
            .done(function(response) {
                $(".time").remove();
                console.log("Всё хорошо, сервер вернул ответ");
                preventDoubleNote(response);
                console.log(response);
                
            })
            .fail(function() {
                console.log("Что-то на сервере не так");
            });
            // popUp окнo
                $('.show_popUp').addClass('hidden_popUp');
                $('.show_popUp').removeClass('show_popUp');
        })  
})
});
});