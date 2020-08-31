@props(['href' => '#', 'permission' => false])

@if (session()->has('lang-rtl'))
    <div class="text-left">
        @else
            <div class="text-right">
                @endif
                <x-utils.add-button
                    :href="$href"/>
            </div>
