@foreach($channels as $channel)
    <div class="col-md-4">
        <div class="channel-block">

            <h3 class="channel-block__title">
                <a href="{{ url('question/channel', $channel->slug) }}">{{ $channel->title }}</a>
            </h3>

            <hr>
            <p class="channel-block__questionsCount">
                {{ $channel->questions->count() }} questions
            </p>
            <hr>

            @if(!auth()->user()->subscribedForChannel($channel))
                <a href="javascript:;"
                   data-href="{{ url('subscribe/channel', $channel->slug) }}"
                   class="btn btn-toggleSubscription">
                    Subscribe
                </a>
            @else
                <a href="javascript:;"
                   data-href="{{ url('subscribe/channel', $channel->slug) }}"
                   class="btn btn-toggleSubscription btn-toggledSubscription">
                    UnSubscribe
                </a>
            @endif

        </div>
    </div>
@endforeach
{{ $channels->links() }}
