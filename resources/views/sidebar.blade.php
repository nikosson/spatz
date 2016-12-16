<div class="col-md-2 profile-sidebar">
    @if(auth()->user())
        @include('sidebar.sidebarForUsers')
    @else
        @include('sidebar.sidebarForGuests')
    @endif
</div>
