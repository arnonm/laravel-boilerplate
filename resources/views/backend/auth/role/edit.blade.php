@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('global.role.Update Role'))

@section('content')
    <x-forms.patch :action="route('admin.auth.role.update', $role)">
        <x-backend.card>
            <x-slot name="header">
                @lang('global.role.Update Role')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.role.index')"
                              :text="__('global.Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : '{{ $role->type }}'}">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                        <div class="col-md-10">
                            <select name="type" class="form-control" required
                                    x-on:change="userType = $event.target.value">
                                <option
                                    value="{{ $model::TYPE_USER }}" {{ $role->type === $model::TYPE_USER ? 'selected' : '' }}>@lang('global.user.User')</option>
                                <option
                                    value="{{ $model::TYPE_ADMIN }}" {{ $role->type === $model::TYPE_ADMIN ? 'selected' : '' }}>@lang('global.user.Administrator')</option>
                            </select>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('global.user.Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control"
                                   placeholder="{{ __('global.user.Name') }}" value="{{ old('name') ?? $role->name }}"
                                   maxlength="100" required/>
                        </div>
                    </div><!--form-group-->

                    @include('backend.auth.includes.permissions')
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right"
                        type="submit">@lang('global.role.Update Role')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
