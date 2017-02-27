(function () {
    var currentLink = $('a[href="' + window.location.href + '"]');
    currentLink.closest('.dashboard-active').addClass('active')
})();