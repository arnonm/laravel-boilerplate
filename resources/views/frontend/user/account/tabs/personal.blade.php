<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mb-0">
        <tr>
            <th>@lang('cruds.user_details.fields.national_id')</th>
            <td>{{ $logged_in_user->details->national_id ?? trans('global.not_available') }}</td>
        </tr>

        <tr>
            <th> @lang('cruds.user_details.fields.gender')
            </th>
            <td> {{ $logged_in_user->gender }}
            </td>
        </tr>


        <tr>
            <th> @lang('cruds.user_details.fields.birth_date')
            </th>
            <td> {{ $logged_in_user->birth_date ?? __('global.not_available') }}
            </td>
        </tr>


        <tr>
            <th> @lang('cruds.user_details.fields.branch')
            </th>
            <td> {{ $logged_in_user->details->branch ?? __('global.not_available') }}
            </td>
        </tr>


        <tr>
            <th> @lang('cruds.user_details.fields.region')
            </th>
            <td> {{ $logged_in_user->details->region ?? __('global.not_available') }}
            </td>
        </tr>


        <tr>
            <th> @lang('cruds.user_details.fields.starting_date')
            </th>
            <td> {{ $logged_in_user->start_volunteering_date ?? __('global.not_available') }}
            </td>
        </tr>

    </table>
</div>
<!--table-responsive-->
