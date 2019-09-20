$(document).ready(function(){
    var redaction = false;
    var text = "",
        date = "",
        subject = "",
        img_path = "";
    //функция сохраняет в переменные введенные в поля input изменения
    $(document).on("input",function(ev){
        //разблорируем кнопку сохранить на текущей строке таблицы
        $(ev.target).parent().siblings('.save').css('color', '#333');
        $(ev.target).parent().siblings('.save').addClass('enable');
       switch(ev.target.className){
            case('input input_date'):{
              date = ($(ev.target).val());
                
              break;
            }
            case('input input_subject'):{
              subject = ($(ev.target).val());
              break;
            }
            case('input input_text'):{
              text = ($(ev.target).val());
              break;
            }
            case('input input_img'):{
              img_path = ($(ev.target).val());
              break;
            }
       }
       
});
    //меняем тэги div на input
    function trToUnput(){
        //проверяем факт редактирования, дабы избежать дублирования изменений
        if(!redaction){
            redaction = true;
           
            
        if($(this).hasClass('date')){
            $(this).children('div').replaceWith("<input class='input input_date' type='text' value=\"" + $(this).children('div').html() + "\">");
            date = $(this).children('div').html();
        } else if ($(this).hasClass('text')) {
            $(this).children('div').replaceWith("<textarea class='input input_text' rows='10' cols='45' name='text'>" + $(this).children('div').html() + "</textarea>");
            text = $(this).children('div').html();
        }   
        else if ($(this).hasClass('subject')) {         
             $(this).children('div').replaceWith("<input class='input input_subject' type='text' value=\"" + $(this).children('div').html() + "\">")
             subject = $(this).children('div').html();;  
        } else if ($(this).hasClass('img_path')) {         
             $(this).children('div').replaceWith("<input class='input input_img' type='text' value=\"" + $(this).children('div').html() + "\">");  
             img_path = $(this).children('div').html();
        } 
            
        }     
        
        redaction = false;
       // $(document).off('click');
        
            
        
    }
    function inputToTd(element, value){
        
        //проверяем факт редактирования, дабы избежать дублирования изменений
        
            //console.log($('.input_date').length);
        element.replaceWith("<div>" + value + "</div>");
      
    }        
    function save(){ 
        //проверяем нажата ли разблокированныя кнопка и отправляем запрос
        if($(this).hasClass('enable') === true){
           $.ajax({
                url: '/ajax/news_change.php',
                type: 'POST',
                context: this,
                data: {
                    date: date,
                    subject: subject,
                    text: text,
                    img_path: img_path,
                    id: $(this).siblings('.id').html()
                }        
            })
            .done(function(response) {
                text = "";
                date = "";
                subject = "";
                img_path = "";
                var obj = JSON.parse(response);
                //асинхронно обновляем значения таблицы
                $(this).parent().after("<tr><td class='id'>" + obj['id'] + "</td><td class='date redact'><div>" + obj['date'] + "</div></td><td class='subject redact'><div>" + obj['subject'] + "</div></td><td class='text redact' width='450'><div>" + obj['text'] + "</div></td><td class='img_path redact'><div>" + obj['img_path'] + "</div></td><td>" + obj['love'] + "</td><td>" + obj['views'] + "</td><td class='save'>Сохранить</td><td class='delete'>Удалить</td></tr>");
                //удаляем старые значения
                $(this).parent().remove();
            })
            .fail(function() {
                console.log("Что-то на сервере не так"); 
            })          
       }     
    }   
    function add_news(){
        var add_date = $("#add_date").val();
        var add_subject = $("#add_subject").val();
        var add_text = $("#add_text").val();
        var add_img = $("#add_img").val();
        $.ajax({
                url: '/ajax/news_add.php',
                type: 'POST',
                context: this,
                data: {
                    date: add_date,
                    subject: add_subject,
                    text: add_text,
                    img_path: add_img, 
                }        
            })
            .done(function(response) {
                console.log(response);
            })
            .fail(function() {
                console.log("Что-то на сервере не так"); 
            })          
    }
    function deleteNews(){
        console.log($(this).html);
    }
    
    //редактирование полей таблицы
    $(document).on('click', '.redact', trToUnput);

    // сохранение изменений в БД
    $(document).on('click', '.save', save);
    
    // удаление из БД
    $(document).on('click', '.delete', function (){
        console.log($(this).parent().remove());
        $.ajax({
                url: '/ajax/delete_news.php',
                type: 'POST',
                context: this,
                data: { 
                    id: $(this).siblings('.id').html()
                }        
            })
            .done(function(response) {
      
            })
            .fail(function() {
                console.log("Что-то на сервере не так"); 
            })          
    });
       
        text = "";
        date = "";
        subject = "";
        img_path = "";
    $("#add_btn").on('click', add_news);
});
    
