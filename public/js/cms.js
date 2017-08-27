var CMS = {
    formConfirm: function(event, form) {
        event.preventDefault();

        $('#modal-confirm').modal('toggle');

        $('.btn.bg-brown').click(function (e) {
            $('#modal-confirm').modal('hide');
            form.submit();
        });
    },

    showNotify: function(title, text, isError){
        new PNotify({
            title: title,
            text: text,
            addclass: isError ? 'bg-danger' : 'bg-success'
        });
    }
}