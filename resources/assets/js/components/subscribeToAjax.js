(function() {
    function subscribeToAjax(e) {
        e.preventDefault();
        console.log('1');

        var ajaxRequest = getAjaxRequest(function(data) {
            if(data.approved) {
                $(this).text('UnSubscribe');
            } else {
                $(this).text('Subscribe');
            }
            $(this).toggleClass('btn-toggledSubscription');
        }.bind(this));

        ajaxRequest.apply(this);
    }
    $('.btn-toggleSubscription').on('click', subscribeToAjax);
})();