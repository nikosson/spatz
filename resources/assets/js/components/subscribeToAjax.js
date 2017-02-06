(function() {
    function subscribeToAjax(e) {
        e.preventDefault();

        var ajaxRequest = getAjaxRequest(function(data) {
            if(data.approved) {
                $(this).text('UbSubscribe');
            } else {
                $(this).text('Subscribe');
            }
            $(this).toggleClass('btn-toggledSubscription');
        }.bind(this));

        ajaxRequest.apply(this);
    }
    $('.btn-toggleSubscription').on('click', subscribeToAjax);
})();