$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {
        var $active = $('.wizard .nav-tabs li.active');
        var $next = $active.next();
        var $function = jQuery(this).attr('data-function') || false;

        if($function){
            var callback = function(){
                $next.removeClass('disabled');
                nextTab($active);
            };

            eval($function);
        }else{
            $next.removeClass('disabled');
            nextTab($active);
        }
    });

    $(".prev-step").click(function (e) {
        var $active = $('.wizard .nav-tabs li.active');
        var $function = jQuery(this).attr('data-function') || false;

        if($function){
            var callback = function(){
                prevTab($active);
            };

            eval($function);
        }else{
            prevTab($active);
        }
    });

    $(".save-step").click(function (e) {
        var $function = jQuery(this).attr('function') || false;

        if($function){
            eval($function);
        }
    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}

function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
