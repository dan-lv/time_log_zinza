$(document).ready(function() {
    $('#btn-check-in').on('click', function(e){
        $('#form').attr('action', '/check-ins')
    });
    $('#btn-check-out').on('click', function(e){
        $('#form').attr('action', '/check-outs')
    });
});
