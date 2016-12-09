@foreach($users as $user)
<div class="col-md-4">
    <div class="user-block">
        <div class="user-block__namesWrapper">
            <h3 class="user-block__title">
                <a href="{{ route('user_info', $user->name) }}">{{ $user->name }}</a>
            </h3>

            <p>{{ $user->firstName . " " .  $user->lastName }}</p>
        </div>

        <hr>
        <p class="user-block__publicationsCount">
            {{ $user->questions->count() }} questions &#8226
            {{ $user->answers->count() }} answers
        </p>
        <hr>
    </div>
</div>
@endforeach
{{ $users->links() }}