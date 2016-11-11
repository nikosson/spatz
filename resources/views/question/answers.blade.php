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
                           class="btn btn-mark_answer"
                        >
                            Mark as answer
                        </a>
                    @else
                        <a href="{{ route('answer_mark', ['id' => $answer->id]) }}"
                           class="btn btn-mark_answer btn-marked_answer"
                        >
                            Approved
                        </a>
                    @endif
                </p>

        </div>
    </div>
@endforeach