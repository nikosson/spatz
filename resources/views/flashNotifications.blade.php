@if (session()->has('flash_notification.message'))
    <div class="alert alert-{{ session('flash_notification.level') }}" id="flash-alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {!! session('flash_notification.message') !!}
    </div>
@endif