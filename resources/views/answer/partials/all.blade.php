@foreach($answers as $answer)
    <div class="panel panel-default">
        <div class="panel-body">
            {!! $answer->body !!}

            <hr>

            Answered by <a href="#">{{ $answer->user->name }} </a>
            {{ $answer->created_at->diffForHumans() }}
            <a href="#">
                <img src="/img/kappa.png_large" alt="" class="questionAvatar">
            </a>

            @can('manage-question', $answer->question)
                <p>
                    @if(!$answer->approved)
                        <a href="javascript:;"
                           data-href="{{ route('answer_mark', ['id' => $answer->id]) }}"
                           class="btn btn-markAnswer">
                            Mark as answer
                        </a>
                    @else
                        <a href="javascript:;"
                           data-href="{{ route('answer_mark', ['id' => $answer->id]) }}"
                           class="btn btn-markAnswer btn-markedAnswer">
                            Approved
                        </a>
                    @endif
                </p>
            @endcan

        </div>
    </div>
@endforeach