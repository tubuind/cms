var CMS = {
    formConfirm: function(event, form) {
        event.preventDefault();

        $('#modal-confirm').modal('toggle');

        $('.btn.bg-brown').click(function (e) {
            $('#modal-confirm').modal('hide');
            form.submit();
        });
    },

    showNotify: function(type, message){
        new PNotify({
            animation: 'slide',
            delay: 3000,
            title: type == 'error' ? 'Warning' : 'Information',
            text: message,
            addclass: type == 'error' ? 'bg-danger' : 'bg-success'
        });
    }
}