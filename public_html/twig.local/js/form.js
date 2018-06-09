
$(document).ready(function() {
    $("#btn").click(
        function(){
            sendAjaxForm('result_form', 'ajax_form', 'authorizationFormProcessing.php');
            return false;
        }
    );

    $("#registration_submit").click(
        function(){
            sendAjaxForm('result_form', 'ajax_form', 'registrationFormProcessing.php');
            return false;
        }
    );
});

function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url: url, //url страницы (action_ajax_form.php)
        type: "POST", //метод отправки
        data: $("#ajax_form").serialize(),  // Сеарилизуем объект
        success: function(data) { //Данные отправлены успешно
            window.innerHTML(data);
            //console.log(data);
            //console.log("Спасибо за заявку!");
        },
        error: function() { // Данные не отправлены
            //alert("Ошибка!");
        }
    });
}