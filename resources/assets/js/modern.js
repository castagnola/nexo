$(document).ready(function () {



    // Fullscreen
    function toggleFullScreen() {
        if ((document.fullScreenElement && document.fullScreenElement !== null) ||
            (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
        }
    }

    $('.toggle-fullscreen').click(function () {
        toggleFullScreen();
    });


    // Waves
    Waves.displayEffect();

    // tooltips
    $('[data-toggle~="tooltip"]').tooltip({
        container: 'body'
    });

    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function (html) {
        var switchery = new Switchery(html, {color: '#23B7E5'});
    });

    // Element Blocking
    function blockUI(item) {
        $(item).block({
            message: '<img src="assets/images/reload.gif" width="20px" alt="">',
            css: {
                border: 'none',
                padding: '0px',
                width: '20px',
                height: '20px',
                backgroundColor: 'transparent'
            },
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.9,
                cursor: 'wait'
            }
        });
    }

    function unblockUI(item) {
        $(item).unblock();
    }

    // Panel Control
    $('.panel-collapse').click(function () {
        $(this).closest(".panel").children('.panel-body').slideToggle('fast');
    });

    $('.panel-reload').click(function () {
        var el = $(this).closest(".panel").children('.panel-body');
        blockUI(el);
        window.setTimeout(function () {
            unblockUI(el);
        }, 1000);

    });

    $('.panel-remove').click(function () {
        $(this).closest(".panel").hide();
    });


});