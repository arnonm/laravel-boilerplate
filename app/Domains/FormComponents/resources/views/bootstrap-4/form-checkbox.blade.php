<div class="form-check">
    <input {!! $attributes->merge(['class' => 'form-check-input ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
           type="checkbox"
           value="{{ $value }}"

           @if($isWired())
           wire:model="{{ $name }}"
           @else
           name="{{ $name }}"
           @endif


           @if($checked)
           checked="checked"
        @endif
    />

    <x-form-label :label="$label" :for="$name" class="form-check-label"/>

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name"/>
    @endif
</div>
