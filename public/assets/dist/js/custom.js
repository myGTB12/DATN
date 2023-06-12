$(document).ready(function () {
    /**
     * Submit form search
     */
    $('body').on('click', '.create-submit', function () {
        $('#quickForm').submit();
    });

    $('body').on('click', '.edit-submit', function () {
        $('#quickForm').submit();
    });

    $('#create_form').on('click', function (e) {
        e.preventDefault();
        if($('#quickForm').valid()) {
            $('#createModel').modal('show')
        }
    });
    $('#save_form').on('click', function (e) {
        e.preventDefault();
        if($('#quickForm').valid()) {
            $('#saveModel').modal('show')
        }
    });
    $('#quickForm').submit(function(){
        $('.submit_create_booking_empty').prop('disabled', true);
        $('#submit_create').prop('disabled', true);
        $('#submit_edit').prop('disabled', true);
    });
    $('#edit_form').on('click', function (e) {
        e.preventDefault();
        if($('#quickForm').valid()) {
            $('#editModel').modal('show')
        }
    });

    $('#delete_form').on('click', function (e) {
        e.preventDefault();
        $('#deleteModel').modal('show');
    });
});

async function getLatitudeLongitudebyAddress(baseUrl, key, address) {
    return $.ajax({
        url: `${baseUrl}?address=${address}&key=${key}`,
        method: 'GET',
        dataType: 'JSON',
        success: function (response) {
            return response;
        },
        error: function (error) {
            return error;
        }
    });
}
