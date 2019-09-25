$(document).ready(function(){
    $('.delete_note').on('click', function(){
       var id = $(this).attr('data'); 
        // Отправляем запрос
        $.ajax({
            url: '/ajax/del_to_queue.php',
            type: 'POST',
            context: this,
            data: {
                id: id
            }
        })
        .done(function(response) {
            console.log("Всё хорошо, сервер вернул ответ");
            console.log(response);
            $(this).parent().remove();
                
        })
        .fail(function() {
            console.log("Что-то на сервере не так");
        });
    });
});