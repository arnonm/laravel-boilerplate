@props(['href' => '#', 'text' => __('global.actions.Add'), 'permission' => false])

<x-utils.form-button
    :action="$href"
    method="GET"
    name="add-item"
    button-class="btn btn-success btn-sm"
    permission="{{ $permission }}"
>
    <i class="fas fa-plus"></i> {{ $text }}
</x-utils.form-button>
