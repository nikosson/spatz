function sendAjax(e) {
    e.preventDefault();
    var self = $(this);

    $.ajax({
        url: self.attr('href'),
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data.approved) {
                self.text('Approved');
            } else {
                self.text('Mark as answer');
            }
            self.toggleClass('btn-answer-approved');

        }
    });
}
$('#btn-mark_question').on('click', sendAjax)
