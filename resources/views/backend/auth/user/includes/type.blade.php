@if ($user->isAdmin())
    @lang('Administrator')
@elseif ($user->isUser())
    @lang('global.User')
@else
    @lang('global.N/A')
@endif
