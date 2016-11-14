<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete question</h4>
            </div>
            <div class="modal-body">
                Do you really want to delete <b>{{ $question->title }}</b> question?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <form action="{{ url('question', $question->id) }}" method="POST" class="form-inline_block">
                    <button type="submit"
                            class="btn btn-danger"
                            data-toggle="modal"
                            data-target="#myModal">
                        Delete
                    </button>
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>