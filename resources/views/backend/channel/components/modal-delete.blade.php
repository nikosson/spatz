<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete question</h4>
            </div>
            <div class="modal-body">
                Do you really want to delete <b>{{ $channel->title }}</b> channel?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <form action="{{ url('admin/channel', $channel->slug) }}" method="POST" class="form-inlineBlock">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit"
                            class="btn btn-danger"
                            data-toggle="modal"
                            data-target="#myModal">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>