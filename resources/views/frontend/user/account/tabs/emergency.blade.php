<div class="table-responsive">
    <x-frontend.add-button href=" {{ route('frontend.user.profile.emergency.add') }} "/>

    <table class="table table-striped table-hover table-bordered mb-0">

        <tr>
            <th>
                @lang('cruds.user_emergency.fields.id')
            </th>
            <th>
                @lang('cruds.user_emergency.fields.name')
            </th>
            <th>
                @lang('cruds.user_emergency.fields.relation')
            </th>
            <th>
                @lang('cruds.user_emergency.fields.national_id')
            </th>
            <th>
                @lang('cruds.user_emergency.fields.phone')
            </th>
            <th>
                @lang('global.actions.Actions')
            </th>
        </tr>
        @forelse ($logged_in_user->contacts as $contact)

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
                <td>
                    <x-utils.edit-button href="{{ route('frontend.user.profile.emergency.edit', $contact->id) }}"/>
                    <x-utils.delete-button href=" {{route('frontend.user.profile.emergency.delete', [$contact->id])}}"/>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">@lang('cruds.user_emergency.no_contacts')</td>
            </tr>
        @endforelse

    </table>
</div>
<!--table-responsive-->
