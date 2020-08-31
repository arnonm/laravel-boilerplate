<div class="table-responsive">
    <x-frontend.add-button href=" {{ route('frontend.user.profile.vehicle.add') }} "/>
    <table class="table table-striped table-hover table-bordered mb-0">

        <tr>
            <th>
                @lang('cruds.user_vehicle.fields.id')
            </th>
            <th>
                @lang('cruds.user_vehicle.fields.license_plate')
            </th>
            <th>
                @lang('cruds.user_vehicle.fields.manufacturer')
            </th>
            <th>
                @lang('cruds.user_vehicle.fields.manufacturing_date')
            </th>
            <th>
                @lang('cruds.user_vehicle.fields.offroad')
            </th>
            <th>
                @lang('cruds.user_vehicle.fields.towing')
            </th>
            <th>
                @lang('global.actions.Actions')
            </th>
        </tr>
        @forelse ($logged_in_user->vehicles as $vehicle)

            <tr>
                <td>
                    {{ $vehicle->id }}
                </td>
                <td>
                    {{ $vehicle->license_plate }}
                </td>
                <td>
                    {{ $vehicle->manufacturer }}
                </td>
                <td>
                    {{ $vehicle->manufacturing_date }}
                </td>
                <td>
                    {{ $vehicle->offroad  ? trans('global.Yes') : trans('global.No') }}
                </td>
                <td>
                    {{ $vehicle->towing  ? trans('global.Yes') : trans('global.No') }}
                </td>
                <td>
                    <x-utils.edit-button href="{{ route('frontend.user.profile.vehicle.edit', $vehicle->id) }}"/>
                    <x-utils.delete-button href=" {{route('frontend.user.profile.vehicle.delete', [$vehicle->id])}}"/>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="6">@lang('cruds.user_vehicle.no_vehicle')</td>
            </tr>

        @endforelse

    </table>
</div>
<!--table-responsive-->
