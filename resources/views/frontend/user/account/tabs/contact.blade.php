<div class="table-responsive">
    @if (session()->has('lang-rtl'))
        <div class="text-left">
            @else
                <div class="text-right">
                    @endif
                    <x-utils.edit-button
                        :href="'profile/contact/edit'"/>
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
        </div>
        <!--table-responsive-->
