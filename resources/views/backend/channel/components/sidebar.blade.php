<ul class="nav nav-sidebar">
    <li>
        <a href="{{ url('admin/') }}">Overview</a>
    </li>

    <li>
        <a href="javascript:;" data-toggle="collapse" data-target="#toggleButtons-users">
            Users
            <i class="fa fa-chevron-down" aria-hidden="true"></i>

        </a>

        <ul class="nav nav-subbar collapse" id="toggleButtons-users">
            <li><a href="{{ url('admin/user/showAll') }}">Show all</a></li>
            <li><a href="{{ url('admin/user/create') }}">Create new</a></li>
            <li><a href="#">Ban list</a></li>
        </ul>
    </li>

    <li class="active">
        <a href="#" data-toggle="collapse" data-target="#toggleButtons-channels">
            Channels
            <i class="fa fa-chevron-down" aria-hidden="true"></i>

        </a>

        <ul class="nav nav-subbar collapse" id="toggleButtons-channels">
            <li><a href="{{ url('admin/channel/showAll') }}">Show all</a></li>
            <li><a href="{{ url('admin/channel/create') }}">Create new</a></li>
        </ul>
    </li>

    <li>
        <a href="#" data-toggle="collapse" data-target="#toggleButtons-questions">
            Questions
            <i class="fa fa-chevron-down" aria-hidden="true"></i>

        </a>

        <ul class="nav nav-subbar collapse" id="toggleButtons-questions">
            <li><a href="#">Show all</a></li>
        </ul>
    </li>

</ul>