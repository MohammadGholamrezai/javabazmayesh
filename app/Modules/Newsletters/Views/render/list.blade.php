@foreach($users as $user)
    <tr class="row-item">
        <td>{!! Html::image('assets/theme/assets/admin/layout/img/avatar.png', 'avatar', ['width'=>'30']) !!}</td>
        <td>{!! $user->name  or 'No Name' !!}</td>
        <td>{!! $user->email !!}</td>
        <td>
            <a href="#all" title="@lang('cpAdmin/newsletters.view.index.Send_Email')" class="btn btn-icon-only blue cmodal getMail" data-url="{!! URL::route('get-send-mail', $user->id) !!}" data-toggle="modal">
                <i class="fa fa-mail-forward"></i>
            </a>
            <a data-url="{!! URL::route($locale.'cpAdmin.newsletters.update', $user->id) !!}" data-id="{!! $user->id !!}" title="@lang('cpAdmin/newsletters.view.index.Status')" class="btn btn-icon-only {!! ($user->status)?"green":"red" !!} publishedNewsletter">
                <i class="fa {!! ($user->status)?"fa-check-square-o":"fa-times" !!}"></i>
            </a>

            {!! Form::open(['route'=>[$locale.'cpAdmin.newsletters.destroy', $user->id], 'method'=>'DELETE']) !!}
                <button type="submit" style="position: absolute;margin: -34px;left: 120px;" class="btn btn-icon-only red" data-dismiss="modal"><i class="fa fa-trash"></i></button>
            {!! Form::close() !!}
        </td>
    </tr>
@endforeach

<tr class="paginate">
    <td colspan="8">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <div class="dataTables_info" id="infoData" role="status" aria-live="polite" style="vertical-align: middle">
                    {!! $users->appends(\Illuminate\Support\Facades\Input::all())->render() !!}
                    <span class="loading" style="background: url('{{ asset('/assets/img/loader.gif') }}') no-repeat;padding: 5px 20px 20px; display: none "></span>
                </div>
            </div>
        </div>
    </td>
</tr>

