(function() {
    function subscribeToChannel(e) {
        e.preventDefault();

        var ajaxRequest = getAjaxRequest(function(data) {
            if(data.approved) {
                $(this).text('UnSubscribe');
            } else {
                $(this).text('Subscribe');
            }
            $(this).toggleClass('btn-primary');
        }.bind(this));

        ajaxRequest.apply(this);
    }
    $('.btn-toggleSubscription').on('click', subscribeToChannel);
})();