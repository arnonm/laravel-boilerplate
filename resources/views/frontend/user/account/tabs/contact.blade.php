<div class="table-responsive">

    <x-frontend.edit-button :href="'profile/contact/edit'"/>
</div>
<table class="table table-striped table-hover table-bordered mb-0">


    <tr>
        <th>
            @lang('cruds.user_details.fields.cell_phone')
        </th>
        <td>
            {{ $logged_in_user->cell_phone }}

        </td>
    </tr>
    <tr>
        <th>
            @lang('cruds.user_details.fields.address')
        </th>
        <td>
            {{ $logged_in_user->formatted_address }}

        </td>
    </tr>

</table>
<!--table-responsive-->
