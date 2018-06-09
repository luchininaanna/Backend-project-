window.onresize = DetermineBlockPosition;
window.onload = DetermineBlockPosition;

function DetermineBlockPosition() {
    var authorization_form = $("#authorization_form"),
        //ww = $(window).width(),
        wh = $(window).height();

    authorization_form.offset({
        'top'  : wh / 2 - authorization_form.height() / 2
        //'left' : ww /2 - authorization_form.width() / 2
    });
}