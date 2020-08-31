@props(['href' => '#', 'permission' => false])

@if (session()->has('lang-rtl'))
    <div class="text-left">
        @else
            <div class="text-right">
                @endif
                <x-utils.edit-button
                    :href="$href"
                    class="btn btn-primary btn-sm"
                    icon="fas fa-pencil-alt"
                    :text="__('global.actions.Edit')" permission="{{ $permission }}"/>
            </div>
