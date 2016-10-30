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
                    <a href="{{ url('answer/mark', $answer->id) }}" class="btn btn-primary">Mark as answer</a>
                    <i class="fa fa-check fa-2x" aria-hidden="true"></i>
                </p>

        </div>
    </div>
@endforeach