@extends('backend.layouts.app')

@section('title', __('global.View User'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('global.View User')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('global.Back')"/>
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('global.Type')</th>
                    <td>@include('backend.auth.user.includes.type')</td>
                </tr>

                <tr>
                    <th>@lang('global.Avatar')</th>
                    <td><img src="{{ $user->avatar }}" class="user-profile-image"/></td>
                </tr>

                <tr>
                    <th>@lang('global.Name')</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>@lang('global.E-mail Address')</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th>@lang('global.Status')</th>
                    <td>@include('backend.auth.user.includes.status', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('global.Verified')</th>
                    <td>@include('backend.auth.user.includes.verified', ['user' => $user])</td>
                </tr>

                <tr>
                    <th>@lang('global.Timezone')</th>
                    <td>{{ $user->timezone ?? __('N/A') }}</td>
                </tr>

                <tr>
                    <th>@lang('global.Last Login At')</th>
                    <td>
                        @if($user->last_login_at)
                            @displayDate($user->last_login_at)
                        @else
                            @lang('global.N/A')
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>@lang('global.Last Known IP Address')</th>
                    <td>{{ $user->last_login_ip ?? __('global.N/A') }}</td>
                </tr>

                @if ($user->isSocial())
                    <tr>
                        <th>@lang('global.Provider')</th>
                        <td>{{ $user->provider ?? __('global.N/A') }}</td>
                    </tr>

                    <tr>
                        <th>@lang('global.Provider ID')</th>
                        <td>{{ $user->provider_id ?? __('global.N/A') }}</td>
                    </tr>
                @endif

                <tr>
                    <th>@lang('global.Roles')</th>
                    <td>{!! $user->roles_label !!}</td>
                </tr>

                <tr>
                    <th>@lang('global.Additional Permissions')</th>
                    <td>{!! $user->permissions_label !!}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('global.account.Account Created'):</strong> @displayDate($user->created_at)
                ({{ $user->created_at->diffForHumans() }}),
                <strong>@lang('global.Last Updated'):</strong> @displayDate($user->updated_at)
                ({{ $user->updated_at->diffForHumans() }})

                @if($user->trashed())
                    <strong>@lang('global.account.Account Deleted'):</strong> @displayDate($user->deleted_at)
                    ({{ $user->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection
