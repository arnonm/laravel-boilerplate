<div class="table-responsive">
    <x-frontend.edit-button href="/profile/emergency/edit"/>

    <table class="table table-striped table-hover table-bordered mb-0">

        <tr>
            <th>
                @lang('cruds.emergency_info.fields.id')
            </th>
            <th>
                @lang('cruds.emergency_info.fields.name')
            </th>
            <th>
                @lang('cruds.emergency_info.fields.relation')
            </th>
            <th>
                @lang('cruds.emergency_info.fields.national_id')
            </th>
            <th>
                @lang('cruds.emergency_info.fields.phone')
            </th>
        </tr>
        @foreach ($logged_in_user->contacts as $contact)

            <tr>
                <td>
                    {{ $contact->id }}
                </td>
                <td>
                    {{ $contact->name }}
                </td>
                <td>
                    {{ $contact->relation }}
                </td>
                <td>
                    {{ $contact->national_id }}
                </td>
                <td>
                    {{ $contact->phone }}
                </td>

            </tr>

        @endforeach

    </table>
</div>
<!--table-responsive-->
