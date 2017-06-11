$(document).ready(function () {

    $('form#_newsletter').on('click', '._send', function (event) {
        event.preventDefault();
        var clicked = $(this);
        var params = [];
        params['url'] = clicked.parents('form').first().attr('action');
        params['input'] = clicked.parents('form').first().serialize();
        params['clicked'] = clicked;

        ajaxPostNewsletter(params);
    });

});

var waitingDialog = (function($){
    var $loadingHTML=' <div class="loading"> <div class="overlay2"></div>' +
        '<div class="load-wrapp">' +
        ' <div class="load-3">' +
        ' <p>درحال بارگذاری</p>' +
        ' <div class="line">Y</div>' +
        ' <div class="line">T</div>' +
        ' <div class="line">U</div>' +
        ' <div class="line">A</div>' +
        '<div class="line">E</div>' +
        '<div class="line">B</div>' +
        ' </div>' +
        '</div> </div>';


    return {
        show: function($element,$options){
            // $element.addClass('loading');
            if (!$element){
                $element = $('body');
            }
            $element.append($loadingHTML);

        },
        hide: function($element){
            if (!$element){
                $element = $('body');
            }
            // $element.removeClass('loading');
            $element.find('div.loading').remove();
        }
    }
})(jQuery);


function ajaxPostNewsletter(params) {
    waitingDialog.show();
    $.ajax({
        url: params['url'],
        type: 'POST',
        data: params['input'],
        success: function (data) {
            if (data) {
                var text = '';
                if (!data.action && data.err) {
                    $.each(data.err, function (i, errText) {
                        text += errText + '</br> ';
                    })
                }
                setAlertMessage(data.msg, text, data.color);
                waitingDialog.hide();
            }
        },
        error: function () {
            setAlertMessage('بروز خطا!', 'لطفا مجددا تلاش کنید.', 'orange');
            waitingDialog.hide();

        }
    });
}

var $dataResponse = null;
function ajaxFn(params) {

    var $type = 'POST';
    if (params['type']) {
        $type = params['type'];
    }
    var $element = $('body');
    if (params['clicked']){
        $element = params['clicked'];
    }

    waitingDialog.show($element,null);

    $.ajax({
        url: params['url'],
        type: $type,
        data: params['input'],
        success: function (data) {
            if (data) {
                var text = '';
                if (!data.action && data.err) {
                    $.each(data.err, function (i, errText) {
                        text += errText + '</br> ';
                    })
                }

                if(data.text){
                    text = data.text;
                }

                var $url = null;
                if (data.redirect_url) {
                    $url = data.redirect_url;
                }

                setAlertMessage(data.msg, text, data.color, $url);
                $dataResponse = data;
            }
            waitingDialog.hide($element,null);

        },
        error: function () {
            setAlertMessage('بروز خطا!', 'لطفا مجددا تلاش کنید.', 'orange', window.location.href);
            waitingDialog.hide($element,null);
        }
    });
}

function setAlertMessage(title, content, type, $url) {
    $.confirm({
        animation: 'rotateY',
        closeAnimation: 'rotateY',
        animationBounce: 1.5,
        title: title,
        content: content,
        type: type,
        rtl: true,
        closeIcon: true,
        typeAnimated: true,
        useBootstrap: true,
        buttons: {
            confirm: {
                text: 'تایید',
                btnClass: 'btn-warning',
                action: function () {

                    if ($url) {
                        window.location.href = $url;
                    }


                }
            }
        }
    });
}

