
$(document).ready(function () {
    $('#btn-add-user').on('click', function () {
        $('#modal-add-user').modal('show');
    })

    $('#user-table').on('click', '#edit-user-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_username = $(this).attr('key_username');
        var key_name = $(this).attr('key_name');
        var key_email = $(this).attr('key_email');
        var key_fungsi = $(this).attr('key_fungsi');
        var key_role = $(this).attr('key_role');
        
        key_role = key_role.replace('["','');
        key_role = key_role.replace('"]','');
        key_role = key_role.replace('[','');
        key_role = key_role.replace(']','');

        $('#modal-edit-user').find('#input-id').val(key_id);
        $('#modal-edit-user').find('#input-username').val(key_username);
        $('#modal-edit-user').find('#input-nama').val(key_name);
        $('#modal-edit-user').find('#input-email').val(key_email);
        $('#modal-edit-user').find('#input-fungsi').val(key_fungsi);
        $('#modal-edit-user').find('#input-role').val('').change();
        if (key_role.length>0) {
            $('#modal-edit-user').find('#input-role').val(key_role).change();
        }



        $('#modal-edit-user').modal('show');

    })
    $('#user-table').on('click', '#delete-user-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_name = $(this).attr('key_name');

        $('#modal-delete-user').find('#input-id').val(key_id);
        $('#modal-delete-user').find('#nama-user').html(key_name);
        $('#modal-delete-user').modal('show');

    })

    $('#user-table').on('click', '#edit-role-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_name = $(this).attr('key_name');
        var key_role = $(this).attr('key_role');
        
        key_role = key_role.replace('["','');
        key_role = key_role.replace('"]','');
        key_role = key_role.replace('[','');
        key_role = key_role.replace(']','');
        

        $('#modal-edit-role').find('#input-id').val(key_id);
        $('#modal-edit-role').find('#input-nama').val(key_name);
        $('#modal-edit-role').find('#input-role').val('').change();
        if (key_role.length>0) {
            $('#modal-edit-role').find('#input-role').val(key_role).change();
        }

        $('#modal-edit-role').modal('show');

    })

    $('#add-role-btn').on('click', function () {
        $('#modal-add-role').modal('show');
    })

    $('#role-table').on('click', '#edit-role-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_name = $(this).attr('key_name');

        $('#modal-edit-role').find('#input-id').val(key_id);
        $('#modal-edit-role').find('#input-name').val(key_name);
        $('#modal-edit-role').modal('show');

    })
    $('#role-table').on('click', '#delete-role-btn', function () {
        var key_id = $(this).attr('key_id');
        var key_name = $(this).attr('key_name');

        $('#modal-delete-role').find('#input-id').val(key_id);
        $('#modal-delete-role').find('#nama-role').html(key_name);
        $('#modal-delete-role').modal('show');

    })

})