{!! Form::open(['route'=>['post-send-mail', $id], 'method'=>'POST', 'id'=>'mailAll', 'class'=>'form-horizontal', 'role'=>'form', 'files'=>'true']) !!}
    <style>
        .fileinput-upload-button{display: none;}
        .btn-file{direction: rtl;}
    </style>
    <div class="modal-content btn-{!! ($id)?'primary':'warning' !!}">
        <div class="modal-body">
            <div class="form-group">
                <label for="name" class="col-sm-1 control-label">@lang('cpAdmin/newsletters.view.index.Subject')</label>
                <div class="col-sm-11">
                    {!! Form::text('subject', null, ['id' => 'subject', 'class'=>'form-control', 'style'=>'border-radius: 4px !important;', 'placeholder'=>trans('cpAdmin/newsletters.view.index.Subject')]) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-1 control-label">@lang('cpAdmin/newsletters.view.index.Attach')</label>
                <div class="col-sm-11" style="direction: ltr;">
                    {!! Form::file('attach', ['id'=>'input-attachMail', 'class'=>'file', 'data-show-preview'=>'false']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-1 control-label">@lang('cpAdmin/newsletters.view.index.Message')</label>
                <div class="col-sm-11">
                    {!! Form::textarea('message', null, ['id' => 'message', 'class'=>'form-control', 'style'=>'border-radius: 4px !important;', 'placeholder'=>trans('cpAdmin/newsletters.view.index.Message')]) !!}
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default default" data-dismiss="modal">@lang('cpAdmin/newsletters.view.index.Cancel')</button>
            <input type="submit" class="btn btn-success sendMail" value="@lang('cpAdmin/newsletters.view.index.Send')">
        </div>
        <script>$("#input-attachMail").fileinput();</script>
    </div>
{!! Form::close() !!}
