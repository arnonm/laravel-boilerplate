@if ($logged_in_user->hasTwoFactorEnabled())
    <h4>@lang('global.2fe.Two Factor Authentication is Enabled')</h4>

    <a href="{{ route('frontend.auth.account.2fa.disable') }}"
       class="btn btn-danger btn-sm btn-block">@lang('global.2fe.Remove Two Factor Authentication')</a>
    <a href="{{ route('frontend.auth.account.2fa.show') }}"
       class="btn btn-primary btn-sm btn-block">@lang('global.2fe.View/Regenerate Recovery Codes')</a>
@else
    <h4>@lang('global.2fe.Two Factor Authentication is Disabled')</h4>

    <a href="{{ route('frontend.auth.account.2fa.create') }}"
       class="btn btn-success btn-sm btn-block">@lang('global.2fe.Enable Two Factor Authentication')</a>
@endif
