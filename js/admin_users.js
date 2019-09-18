$(document).ready(function(){
    var text = "",
        date = "",
        subject = "",
        img_path = "";
    function updateRow(object){
         
    }
    function trToUnput(){
        if($(this).hasClass('date')){
            $(this).children('div').replaceWith("<input class='input input_date' type='text' value=\"" + $(this).children('div').html() + "\">");
        } else if ($(this).hasClass('text')) {
            $(this).children('div').replaceWith("<textarea class='input input_text' rows='10' cols='45' name='text'>" + $(this).children('div').html() + "</textarea>");  
        }   
        else if ($(this).hasClass('subject')) {         
             $(this).children('div').replaceWith("<input class='input input_subject' type='text' value=\"" + $(this).children('div').html() + "\">");  
        } else if ($(this).hasClass('img_path')) {         
             $(this).children('div').replaceWith("<input class='input input_img' type='text' value=\"" + $(this).children('div').html() + "\">");  
        }   
    }
    function save(){
        var el = $('.input');
       if(el.parent().length !== 0){
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
                console.log("Всё хорошо, сервер вернул ответ");
                console.log(JSON.parse(response)); 
                var obj = JSON.parse(response);
            $(this).parent().after("<tr><td class='id'>" + obj['id'] + "</td><td class='date redact'><div>" + obj['date'] + "</div></td><td class='subject redact'><div>" + obj['subject'] + "</div></td><td class='text redact' width='450'><div>" + obj['text'] + "</div></td><td class='img_path redact'><div>" + obj['img_path'] + "</div></td><td>" + obj['love'] + "</td><td>" + obj['views'] + "</td><td class='save'>Сохранить</td><td class='delete'>Удалить</td></tr>");
            console.log($(this).parent().html());
                $(this).parent().remove();
            updateRow(obj);
             //$('tr').on('click', 'td.redact', trToUnput);
            //$('.save').on('click', save);
            })
            .fail(function() {
                console.log("Что-то на сервере не так"); 
            })
       }
        
    }
    
    //редактирование полей таблицы
    $('main').on('click', '.redact', trToUnput);
    

   
    // сохранение изменений в БД
   $(document).on("input",function(ev){
       switch(ev.target.className){
            case('input_date'):{
              date = ($(ev.target).val());
              break;
            }
            case('input_subject'):{
              subject = ($(ev.target).val());
              break;
            }
            case('input_text'):{
              text = ($(ev.target).val());
              break;
            }
            case('input_img'):{
              img_path = ($(ev.target).val());
              break;
            }
       }
       
//       console.log(ev.target.className);
//       console.log(date);
//       console.log(subject);
//       console.log(text);
//       console.log(img_path);
});
    $('main').on('click', '.save', save);
    text = "";
        date = "";
        subject = "";
        img_path = "";
});
    
