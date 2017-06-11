@extends('cpAdmin.layouts.default')

@section('content')

    <a class="btn btn-primary cmodal getAllMail" data-url="{!! URL::route('get-send-mail', 0) !!}" data-toggle="modal" href="#all" data-id="0">
        <i class="fa fa-mail-reply-all"></i>
        @lang("cpAdmin/newsletters.view.index.Send_Email_to_All")
    </a>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-bell-o"></i>@lang("cpAdmin/newsletters.view.index.List")</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover" style="overflow: hidden;">
                            <thead>
                            <tr>
                                <th><i class="fa fa-user"></i></th>
                                <th><i class="fa fa-barcode"></i> @lang("cpAdmin/newsletters.view.index.Name")</th>
                                <th><i class="fa fa-google"></i> @lang("cpAdmin/newsletters.view.index.Email")</th>
                                <th><i class="fa fa-dropbox"></i></th>
                            </tr>
                            {!! Form::open(['route' => $locale.'cpAdmin.newsletters.index', 'method'=>'GET' , 'class'=>'searchClass']) !!}
                                <tr role="row" class="filter">
                                    <td>
                                        {!! Form::hidden('filtering',1) !!}
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm name" name="name" placeholder="@lang("cpAdmin/newsletters.view.index.Name")">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm email" name="email" placeholder="@lang("cpAdmin/newsletters.view.index.Email")">
                                    </td>
                                    <td>
                                        <div class="margin-bottom-5 search" data-url="">
                                            <button type="submit" class="btn btn-sm yellow filter-submit margin-bottom btn-search"><i class="fa fa-search"></i> Search</button>
                                            <span class="loading" style="background: url('{{ asset('/assets/img/loader.gif') }}') no-repeat;padding: 5px 20px 20px; display: none"></span>
                                        </div>
                                    </td>
                                </tr>
                            {!! Form::close() !!}
                            </thead>
                            <tbody id="result-data-table">
                                {!! $users !!}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-modal-lg tab-pane active fontawesome-demo" id="all" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" id="mail-form-newsletter"></div>
    </div>

    @if(session()->has('message'))
        <?php $message = session()->get('message'); ?>
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="alert alert-{!! ($message['valid'])?"success":"warning" !!}">
                    <button type="button" class="close" style="float: right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                    <p class="modal-title" id="myModalLabel" style="text-align: center;font-size: 15px;font-weight: bold;">
                        {!! $message['text'] !!}
                    </p>
                </div>
            </div>
        </div>
    @endif
    <button type="button" id="MailMessage" style="display: none;" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"></button>
@endsection

@section('scripts')
    <script src="{{ asset('/assets/js/cpAdmin/newsletter.js') }}" type="text/javascript"></script>
    @if(session()->has('message'))
        <script type="text/javascript">
            $('#MailMessage').click();
        </script>
    @endif
@endsection