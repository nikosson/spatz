<div class="col-md-2 profile-sidebar">
    <p class="profile-sidebar__name"  data-toggle="tooltip" data-placement="top" title="Go to profile">
        <a href="{{ route('user_info', auth()->user()->name) }}">{{ auth()->user()->name }}</a>
    </p>

    <ul class="vertical-list vertical-list--transparent">
        <li class="vertical-list__item">
            <a href="{{ url('/') }}" class="vertical-list__href">
                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                My feed
            </a>
        </li>

        <li class="vertical-list__item">
            <a href="{{ url('question/all') }}" class="vertical-list__href">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                All questions
            </a>
        </li>

        <li class="vertical-list__item">
            <a href="{{ url('channel/all') }}" class="vertical-list__href">
                <i class="fa fa-tags" aria-hidden="true"></i>
                All channels
            </a>
        </li>

        <li class="vertical-list__item vertical-list__item--bordered">
            <a href="{{ url('user/all') }}" class="vertical-list__href">
                <i class="fa fa-users" aria-hidden="true"></i>
                All users
            </a>
        </li>

        <li class="vertical-list__item">
            <a href="{{ url('settings/info') }}" class="vertical-list__href">
                <i class="fa fa-cog" aria-hidden="true"></i>
                Settings
            </a>
        </li>

        <li class="vertical-list__item">
            <a href="{{ url('/logout') }}"
               class="vertical-list__href vertical-list__href--last"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>

    </ul>
</div>
