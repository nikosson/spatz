<aside class="col-md-2 mostInteresting-sidebar">
    <div class="mostInteresting-sidebar__header">
        <h1 class="tralala">Most intereseting for a week</h1>
    </div>

    @foreach($mostInterestingWeeklyQuestions as $question)
        <div class="mostInteresting-sidebar__item">
            <h4><a href="{{ url('question', $question->id) }}">
                    {{ $question->title }}
                </a></h4>
            <i class="fa fa-question-circle" aria-hidden="true">
                {{ $question->answers->count() }}
            </i>

            <i class="fa fa-eye" aria-hidden="true">
                {{ $question->views }}
            </i>

            <i class="fa fa-user" aria-hidden="true">
                {{ $question->subscriptions->count() }}
            </i>
        </div>
    @endforeach
</aside>