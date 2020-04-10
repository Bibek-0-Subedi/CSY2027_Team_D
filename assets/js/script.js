$(document).ready(function(){
    $(".attendBtn").on('click', function () {
        $.ajax({
            type: 'POST',
            url: $(this).parents('form:first').attr('action'),
            data: $(this).parents('form:first').serialize(),
            success: function () {
                // location.reload();
            }
        });
    });
});