<div class="table-responsive">
    <x-frontend.edit-button href='/profile/uniform/edit'/>

    <table class="table table-striped table-hover table-bordered mb-0">
        <tr>
            <th>@lang('cruds.user_uniform.fields.shirt_size')</th>
            <td>{{ $logged_in_user->uniform->shirt_size ?? trans('global.not_available') }}</td>
        </tr>

        <tr>
            <th>@lang('cruds.user_uniform.fields.pant_size')</th>
            <td>{{ $logged_in_user->uniform->pant_size ?? trans('global.not_available') }}</td>
        </tr>

        <tr>
            <th>@lang('cruds.user_uniform.fields.belt_size')</th>
            <td>{{ $logged_in_user->uniform->belt_size ?? trans('global.not_available') }}</td>
        </tr>

        <tr>
            <th>@lang('cruds.user_uniform.fields.sweatshirt_size')</th>
            <td>{{ $logged_in_user->uniform->sweatshirt_size ?? trans('global.not_available') }}</td>
        </tr>

        <tr>
            <th>@lang('cruds.user_uniform.fields.coat_size')</th>
            <td>{{ $logged_in_user->uniform->coat_size ?? trans('global.not_available') }}</td>
        </tr>

    </table>
</div>
<!--table-responsive-->
