@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('global.role.Create Role'))

@section('content')
    <x-forms.post :action="route('admin.auth.role.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('global.role.Create Role')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.role.index')"
                              :text="__('global.actions.Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : '{{ $model::TYPE_USER }}'}">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('global.user.Type')</label>

                        <div class="col-md-10">
                            <select name="type" class="form-control" required
                                    x-on:change="userType = $event.target.value">
                                <option value="{{ $model::TYPE_USER }}">@lang('global.user.User')</option>
                                <option value="{{ $model::TYPE_ADMIN }}">@lang('global.user.Administrator')</option>
                            </select>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('global.user.Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control"
                                   placeholder="{{ __('global.user.Name') }}" value="{{ old('name') }}" maxlength="100"
                                   required/>
                        </div>
                    </div>

                    @include('backend.auth.includes.permissions')
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right"
                        type="submit">@lang('global.role.Create Role')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
