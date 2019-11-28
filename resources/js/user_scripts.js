$(document).ready(function() {
    $('#btn-check-in').on('click', function(e){
        $('#confirm').attr('data-form', 'form-check-in')
    });
    $('#btn-check-out').on('click', function(e){
        $('#confirm').attr('data-form', 'form-check-out')
    });
    $('#confirm').click(function(e) {
        const formSelector = $(this).data('form');
        $(formSelector).submit();
    });
});
//DateTime Picker
$(document).ready(function(){
    $('#timepicker1').timepicker({
        timeFormat: 'HH:mm',
        interval: 10,
        minTime: '09',
        maxTime: '17:30',
        defaultTime: '09',
        zindex: 9999,
        dynamic: true,
        dropdown: true,
        scrollbar: false
    });
    $('#timepicker2').timepicker({
        timeFormat: 'HH:mm',
        interval: 10,
        minTime: '09',
        maxTime: '17:30',
        defaultTime: '13:30',
        dynamic: true,
        zindex: 9999,
        dropdown: true,
        scrollbar: false
    });

    $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
    }).datepicker('update', new Date());
});
