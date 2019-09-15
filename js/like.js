$(document).ready(function(){
    var login = $('#login').html();
    
    function updateLike(response){
           $(this).siblings('.number_of_like').html(response); 
           $(this).siblings('.number_of_like').css('color', '#D75A4A');
           $(this).css('background', 'url(../img/icons/like.svg)');
    }
    
    $('.like').on('click', function(){
       $.ajax({
            url: '/like.php',
            type: 'POST',
            context: this,
            data: {
                like: $(this).html(),
                login: login
            }        
        })
        .done(function(response) {
            console.log("Всё хорошо, сервер вернул ответ");
            console.log(response);
            updateLike.call(this, response);        
        })
        .fail(function() {
            console.log("Что-то на сервере не так"); 
        })
    })   
});