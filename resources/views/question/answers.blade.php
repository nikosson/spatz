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
                    <a href="{{ route('answer_mark', ['id' => $answer->id]) }}" class="btn btn-primary btn-mark_answer">
                        @if(!$answer->approved)
                            Mark as answer
                        @else
                            Approved
                        @endif
                    </a>
                </p>

        </div>
    </div>
@endforeach