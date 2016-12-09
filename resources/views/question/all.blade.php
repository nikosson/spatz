@foreach($questions as $question)
    <div class="panel panel-default">
        <div class="panel-body">
            <div>
                <div class="row">
                    <div class="col-md-10">

                        <a href="{{ url('question/channel', $question->channel->slug) }}"
                           class="label label-default"
                           style="background-color:{{ $question->channel->color }}"
                        >
                            {{ $question->channel->title }}
                        </a>

                        <a href="{{ url('question', $question->id) }}">
                            <h3 class="question-view-title">{{ $question->title }}</h3>
                        </a>

                        <small>
                            Asked {{ $question->updated_at->diffForHumans() }}
                            by <a href="{{ route('user_info', str_replace(' ', '-', $question->user->name)) }}">
                                {{ $question->user->name }}
                            </a>
                        </small>
                    </div>

                    <div class="col-md-2 answersCount-block mt-25">
                        <span>{{ $question->answers_count }} answers</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endforeach

{{ $questions->links() }}
