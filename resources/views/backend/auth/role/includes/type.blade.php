@inject('user', '\App\Domains\Auth\Models\User')

@if ($role->type === $user::TYPE_ADMIN)
    @lang('global.user.Administrator')
@elseif ($role->type === $user::TYPE_USER)
    @lang('global.user.User')
@else
    @lang('global.N/A')
@endif
