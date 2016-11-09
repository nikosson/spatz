<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Delete this question?
            </div>
            <div class="modal-body">
                Do you really want to delete <b>"{{ $question->title }}"</b> question ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>



{{--<!--Modal window script-->--}}
{{--<script>--}}
    {{--$('#confirm-delete').on('show.bs.modal', function(e) {--}}
        {{--$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));--}}
    {{--});--}}
{{--</script>--}}

<!--
<a href="#"
   data-href="{{ url('question/delete', $question->id) }}"
   data-toggle="modal"
   data-target="#confirm-delete"
   class="btn btn-danger">
    Delete
</a>
-->