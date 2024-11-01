(function( $ ) {
	'use strict';

    $(document).on('click', '.tree label', function(e) {
        $(this).next().next('ul').fadeToggle('fast',function(){
            $(this).parent('li').toggleClass('ding');
        });
        e.stopPropagation();
    });
    $(document).on('click', '.tree li', function(e) {
        /*console.log(e);*/
        $(this).children('ul').fadeToggle('fast',function(){
            $(this).parent('li').toggleClass('ding');
        });
        e.stopPropagation();
    });

    $(document).on('click', 'ul.tree li input', function(e) {
        e.stopPropagation();
    });

    $(document).on('change', '.tree input[type=checkbox]', function(e) {
        $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
        $(this).parentsUntil('.tree').children("input[type='checkbox']").prop('checked', this.checked);
        e.stopPropagation();
    });

    $(document).on('change', '.tree input[type=number]', function(e) {
        $(this).siblings('ul').find("input[type='number']").val($(this).val());
        e.stopPropagation();
	});

    $(document).on('click', 'button', function(e) {
        switch ($(this).attr('id')) {
            case 'Collepsed':
                $('.tree ul').fadeOut();
                break;
            case 'Expanded':
                $('.tree ul').fadeIn();
                break;
            case 'Checked_All':
                $(".tree input[type='checkbox']").prop('checked', true);
                break;
            case 'Unchek_All':
                $(".tree input[type='checkbox']").prop('checked', false);
                break;
            default:
        }
    });
    $( document ).ready(function() {
        $('.tree ul').fadeIn();
    });

})( jQuery );
