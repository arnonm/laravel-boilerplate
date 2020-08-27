<div class="table-responsive">
    <x-frontend.edit-button href="/propile/vehicle/edit"/>
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
        </tr>
        @foreach ($logged_in_user->vehicles as $vehicle)

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
                    {{ $vehicle->offroad }}
                </td>
                <td>
                    {{ $vehicle->towing }}
                </td>

            </tr>

        @endforeach

    </table>
</div>
<!--table-responsive-->
