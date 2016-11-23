@foreach($answers as $answer)
    <div class="panel panel-default">
        <div class="panel-body">
            {!! $answer->body !!}

            <hr>

            Answered by <a href="#">{{ $answer->user->name }} </a>
            {{ $answer->created_at->diffForHumans() }}
            <a href="#">
                <img src="/img/kappa.png_large" alt="" class="question-avatar">
            </a>

            @can('manage-question', $question)
                <p>
                    @if(!$answer->approved)
                        <a href="{{ route('answer_mark', ['id' => $answer->id]) }}"
                           class="btn btn-mark__answer"
                        >
                            Mark as answer
                        </a>
                    @else
                        <a href="{{ route('answer_mark', ['id' => $answer->id]) }}"
                           class="btn btn-mark__answer btn-marked__answer"
                        >
                            Approved
                        </a>
                    @endif
                </p>
            @endcan

        </div>
    </div>
@endforeach