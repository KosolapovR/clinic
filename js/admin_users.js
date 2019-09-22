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
                text = $('#text').val();
                date = $('#date').val();
                subject = $('#subject').val();
                img_path = $('#img_path').val();
            var id = $('.id').html();
        
           $.ajax({
                url: '/ajax/news_change.php',
                type: 'POST',
                context: this,
                data: {
                    date: date,
                    subject: subject,
                    text: text,
                    img_path: img_path,
                    id: id,
                }        
            })
            .done(function(response) {
                
                var obj = JSON.parse(response);
                console.log(obj);
               popUpClose();
                document.location.href = 'http://blog.loc/admin/news';
            })
            .fail(function() {
                console.log("Что-то на сервере не так"); 
            })          
            
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
            document.location.href = 'http://blog.loc/admin/news';
                console.log(response);
            })
            .fail(function() {
                console.log("Что-то на сервере не так"); 
            })          
    }
    function deleteNews(){
        console.log($(this).html);
    }
    function showNewsPopUp(id){
        $.ajax({
                url: '/ajax/news_show.php',
                type: 'POST',
                data: {
                    id: id
                }        
            })
            .done(function(response) {
                var obj = JSON.parse(response);
            console.log(obj);
//                //асинхронно обновляем значения таблицы
                $('#date').val(obj['date']);
                $('#subject').val(obj['subject']);
                $('#text').val(obj['text']);
                $('#img_path').val(obj['img_path']);
            })
            .fail(function() {
                console.log("Что-то на сервере не так"); 
            })          
    }
    function popUpShow(){
        var id = $(this).parent().siblings('.id').html();
        showNewsPopUp(id);
        $('.blank').addClass('show');
        $('.blank').removeClass('hidden');
    }
    function popUpClose(){
        $(".blank").addClass('hidden');
        $(".blank").removeClass('show');
    }
    
    //редактирование полей таблицы
    $(document).on('click', '.redact', trToUnput);

    // сохранение изменений в БД
    $('.save').on('click', save);
    
    // удаление из БД
    $(document).on('click', '.delete', function (){
        console.log($(this).parent().parent().remove());
        $.ajax({
                url: '/ajax/delete_news.php',
                type: 'POST',
                context: this,
                data: { 
                    id: $(this).parent().siblings('.id').html()
                }        
            })
            .done(function(response) {
      
            })
            .fail(function() {
                console.log("Что-то на сервере не так"); 
            })          
    });
       
    //добавление в БД
    $("#add_btn").on('click', add_news);
    
    //открытиыие popUp окна редактирования новости
    $(".edit").on('click', popUpShow);
    
    //закрытие popUp окна редактирования новости
    $(".close").on('click', popUpClose);
        
    text = "";
    date = "";
    subject = "";
    img_path = "";
});
    
