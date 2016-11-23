(function() {
    function subscribeToChannel(e) {
        e.preventDefault();

        var ajaxRequest = getAjaxRequest(function(data) {
            if(data.approved) {
                $(this).text('Subscribe');
            } else {
                $(this).text('UnSubscribe');
            }
            $(this).toggleClass('btn-primary');
        }.bind(this));

        ajaxRequest.apply(this);
    }
    $('.btn-toggleSubscription').on('click', subscribeToChannel);
})();