$(document).ready(function(){
    var sess_id = getJSessionId();
    console.log(sess_id);
    function getJSessionId(){
        var jsId = document.cookie.match(/PHPSESSID=[^;]+/);
        if(jsId != null) {
            if (jsId instanceof Array)
                jsId = jsId[0].substring(10);
            else
                jsId = jsId.substring(10);
        }
        return jsId;
    }
    var login = $('#login').text();

    function updateLike(response){
           $(this).siblings('.number_of_like').html(response); 
           $(this).siblings('.number_of_like').css('color', '#D75A4A');
           $(this).css('background', 'url(../img/icons/like.svg)');
    }
    
    $('.like').on('click', function(){
       // if(typeof(sess_id) != "undefined" && sess_id !== null){
            //получение всех даннх сессии
            $.ajax({
                url: '/getSessionData.php',
                type: 'GET',
                context: this,
                data: {   
                }        
            })
            .done(function(response) {
                console.log("Всё хорошо, сервер вернул ответ");
                console.log(JSON.parse(response));
                var sessions = JSON.parse(response);
                //если в полученных данных
                //находим session_id запускаем ajax по обновлению 
                //лайков
                var sess_id = String(getJSessionId());
                console.log(sessions[sess_id]);
                if(typeof(sessions[sess_id]) != "undefined" && sessions[sess_id] !== null){
                    $.ajax({
                url: '/ajax/like.php',
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
                }
            })
            .fail(function() {
                console.log("Что-то на сервере не так"); 
            })
            
            
            //} 
        })
             
});