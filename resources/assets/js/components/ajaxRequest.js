function getAjaxRequest(callback) {
    return function () {
        $.ajax({
            url: $(this).data('href'),
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                callback(data);
            }
        });
    }
}