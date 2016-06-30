$(document).ready(function(){

    $('#s-aside-toggle-close').click(function() {
        $('#s-aside-toggle').hide();
        $('#s-aside ul li > a.active').removeClass('active');
    });

    $('#s-aside ul li > a[data-target]').click(function(){
        if($(this).hasClass('active')) {
            $('#s-aside-toggle').hide();
            $('#s-aside ul li > a.active').removeClass('active');
        } else {
            $('#s-aside-toggle div[data=s-nav]').hide();
            $('#s-aside-toggle').css('display', 'table-cell');
            $('#s-aside ul li > a.active').removeClass('active');
            $(this).addClass('active');
            if ($(this).data('target')) {
                $('#s-aside-toggle #' + $(this).data('target')).show();
            }
        }
        return false;
    })

});