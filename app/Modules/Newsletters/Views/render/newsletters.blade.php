<div class="alert {!! ($data['valid'])?"alert-success":"alert-warning" !!}" id="newsletter-modal">
    <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h1 class="pull-right" style="font-weight: bolder;font-size: 15px;">@lang('newsletters.view.index.newsletter')</h1>
    <div class="panel newsletter-panel">
        @if(!$data['valid'] && is_array($data['bugs']))
            @foreach($data['bugs'] as $bug)
                <p class="newsletter-style">
                    <span>{!! $bug !!}</span>&nbsp;<i class="fa fa-bug"></i>
                </p>
            @endforeach
        @elseif($data['valid'] && $data['data'])
            <p>
                <img class="newsletter-img-animate" src="{!! asset('themes/default/asset/images/checkmark.gif') !!}">
                <div class="newsletter-success-message">
                    <p><span class="newsletter-success-message-span">{!! $data['data']['name'] !!}</span> عزیز!</p>
                    <p>@lang('newsletters.view.index.newsletterSuccess')</p>
                </div>
            </p>
        @endif
    </div>
</div>