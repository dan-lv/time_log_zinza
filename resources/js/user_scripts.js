$(document).ready(function() {
    $('#btn-check-in').on('click', function(e){
        $('#confirm').attr('data-form', 'form-check-in')
    });
    $('#btn-check-out').on('click', function(e){
        $('#confirm').attr('data-form', 'form-check-out')
    });
    $('#confirm').click(function(e) {
        const formSelector = this.data('form');
        $(formSelector).submit();
    });
});
