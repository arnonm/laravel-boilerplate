<div class="table-responsive">
    <x-frontend.edit-button href="/profile/license/edit"/>

    <table class="table table-striped table-hover table-bordered mb-0">
        <tr>
            <th>
                @lang('cruds.user_license.fields.number')
            </th>
            <td>
                {{ $logged_in_user->license->number }}

            </td>
        </tr>
        <tr>
            <th>
                @lang('cruds.user_license.fields.expiration_date')
            </th>
            <td>
                {{ $logged_in_user->license->expires }}

            </td>
        </tr>
        <tr>
            <th>
                @lang('cruds.user_license.fields.type')
            </th>
            <td>
                {{ $logged_in_user->license->license_type }}

            </td>
        </tr>
        <tr>
            <th>
                @lang('cruds.user_license.fields.year')
            </th>
            <td>
                {{ $logged_in_user->license->year }}

            </td>
        </tr>
    </table>
</div>
<!--table-responsive-->
