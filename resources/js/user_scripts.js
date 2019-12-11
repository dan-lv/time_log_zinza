$(document).ready(function() {
    $('#btn-check-in').on('click', function(e){
        e.preventDefault();
        $('#confirm').attr('data-form', '#form-check-in')
    });
    $('#btn-check-out').on('click', function(e){
        e.preventDefault();
        $('#confirm').attr('data-form', '#form-check-out')
    });
    $('#confirm').click(function(e) {
        const formSelector = $(this).data('form');
        $(formSelector).submit();
    });
});
//DateTime Picker
$(document).ready(function(){
    const FORMAT_TIME = 'HH:mm:ss';
    const FORMAT_DATE = 'YYYY-MM-DD';

    $('#time-absent-from').datetimepicker({
        format: FORMAT_TIME
    });
    $('#time-absent-to').datetimepicker({
        format: FORMAT_TIME
    });
    $('#day-absent').datetimepicker({
        format: FORMAT_DATE
    });
    $('#birthday').datetimepicker({
        format: FORMAT_DATE
    });
});
