@foreach($answers as $answer)
    <div class="panel panel-default">
        <div class="panel-body">
            {!! $answer->body !!}
            <hr>
            <p>
                Answered by <a href="#">{{ $answer->user->name }} </a>
                {{ $answer->created_at->diffForHumans() }}
                <a href="#">
                    <img src="/img/kappa.png_large" alt="" class="question-avatar">
                </a>

                <p>
                    @if(!$answer->approved)
                        <a href="{{ route('answer_mark', ['id' => $answer->id]) }}"
                           class="btn btn-primary"
                           id="btn-mark_question"
                        >
                            Mark as answer
                        </a>
                    @else
                        <a href="{{ route('answer_mark', ['id' => $answer->id]) }}"
                           class="btn btn-primary btn-answer-approved"
                           id="btn-mark_question"
                        >
                            Approved
                        </a>
                    @endif
                </p>

        </div>
    </div>
@endforeach