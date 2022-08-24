
$(document).ready(function () {
    $('#add-zoom-btn').on('click', function () {
        $('#modal-add-zoom').modal('show');
    })

    $('#zoom-table').on('click', '#edit-zoom-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_title = $(this).attr('key_title');
        var key_meeting_number = $(this).attr('key_meeting_number');
        var key_passcode= $(this).attr('key_passcode');
        var key_sdk_key = $(this).attr('key_sdk_key');
        
        $('#modal-edit-zoom').find('#input-id').val(key_id);
        $('#modal-edit-zoom').find('#input-title').val(key_title);
        $('#modal-edit-zoom').find('#input-meeting-number').val(key_meeting_number);
        $('#modal-edit-zoom').find('#input-passcode').val(key_passcode);
        console.log(key_passcode);
        $('#modal-edit-zoom').find('#input-sdk-key').val(key_sdk_key);

        $('#modal-edit-zoom').modal('show');

    })

    $('#zoom-table').on('click', '#delete-zoom-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_title = $(this).attr('key_title');

        $('#modal-delete-zoom').find('#input-id').val(key_id);
        $('#modal-delete-zoom').find('#title-zoom').html(key_title);
        $('#modal-delete-zoom').modal('show');

    })

})