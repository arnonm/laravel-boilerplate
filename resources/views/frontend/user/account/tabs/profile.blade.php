<div class="table-responsive">
    <x-frontend.edit-button :href="route('frontend.user.profile.information.edit')"/>

    <table class="table table-striped table-hover table-bordered mb-0">
        <tr>
            <th>@lang('cruds.user.fields.type')</th>
            <td>@include('backend.auth.user.includes.type', ['user' => $logged_in_user])</td>
        </tr>

        <tr>
            <th>@lang('cruds.user.fields.avatar')</th>
            <td><img src="{{ $logged_in_user->avatar }}" class="user-profile-image"/></td>
        </tr>

        <tr>
            <th>@lang('cruds.user.fields.name')</th>
            <td>{{ $logged_in_user->name }}</td>
        </tr>

        <tr>
            <th>@lang('cruds.user.fields.email')</th>
            <td>{{ $logged_in_user->email }}</td>
        </tr>

        <tr>
            <th>@lang('cruds.user_details.fields.member_id')</th>
            <td>{{ $logged_in_user->member_id }}</td>
        </tr>

        @if ($logged_in_user->isSocial())
            <tr>
                <th>@lang('cruds.user.fields.social')</th>
                <td>{{ ucfirst($logged_in_user->provider) }}</td>
            </tr>
        @endif

        <tr>
            <th>@lang('cruds.user.fields.timezone')</th>
            <td>{{ $logged_in_user->timezone ? str_replace('_', ' ', $logged_in_user->timezone) : __('global.NA') }}</td>
        </tr>

        <tr>
            <th>@lang('cruds.user.fields.created_at')</th>
            <td>@displayDate($logged_in_user->created_at) ({{ $logged_in_user->created_at->diffForHumans() }})</td>
        </tr>

        <tr>
            <th>@lang('cruds.user.fields.updated_at')</th>
            <td>@displayDate($logged_in_user->updated_at) ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
        </tr>

    </table>
</div>
<!--table-responsive-->
